<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNestedChildRequest;
use App\Http\Requests\StoreNestedChildRequest;
use App\Http\Requests\UpdateNestedChildRequest;
use App\Models\Child;
use App\Models\NestedChild;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NestedChildController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('nested_child_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nestedChildren = NestedChild::with(['children'])->get();

        return view('admin.nestedChildren.index', compact('nestedChildren'));
    }

    public function create()
    {
        abort_if(Gate::denies('nested_child_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $childrens = Child::pluck('children_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.nestedChildren.create', compact('childrens'));
    }

    public function store(StoreNestedChildRequest $request)
    {
        $nestedChild = NestedChild::create($request->all());

        return redirect()->route('admin.nested-children.index');
    }

    public function edit(NestedChild $nestedChild)
    {
        abort_if(Gate::denies('nested_child_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $childrens = Child::pluck('children_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nestedChild->load('children');

        return view('admin.nestedChildren.edit', compact('childrens', 'nestedChild'));
    }

    public function update(UpdateNestedChildRequest $request, NestedChild $nestedChild)
    {
        $nestedChild->update($request->all());

        return redirect()->route('admin.nested-children.index');
    }

    public function show(NestedChild $nestedChild)
    {
        abort_if(Gate::denies('nested_child_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nestedChild->load('children');

        return view('admin.nestedChildren.show', compact('nestedChild'));
    }

    public function destroy(NestedChild $nestedChild)
    {
        abort_if(Gate::denies('nested_child_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nestedChild->delete();

        return back();
    }

    public function massDestroy(MassDestroyNestedChildRequest $request)
    {
        NestedChild::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
