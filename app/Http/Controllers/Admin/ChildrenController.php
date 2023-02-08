<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyChildRequest;
use App\Http\Requests\StoreChildRequest;
use App\Http\Requests\UpdateChildRequest;
use App\Models\Child;
use App\Models\House;
use App\Models\NestedChild;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChildrenController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('child_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $children = Child::with(['house'])->get();

        return view('admin.children.index', compact('children'));
    }

    public function create()
    {
        abort_if(Gate::denies('child_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $houses = House::pluck('house_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.children.create', compact('houses'));
    }

    public function store(StoreChildRequest $request)
    {
        $child = Child::create($request->all());

        return redirect()->route('admin.children.index');
    }

    public function edit(Child $child)
    {
        abort_if(Gate::denies('child_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $houses = House::pluck('house_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $child->load('house');

        return view('admin.children.edit', compact('child', 'houses'));
    }

    public function update(UpdateChildRequest $request, Child $child)
    {
        $child->update($request->all());

        return redirect()->route('admin.children.index');
    }

    public function show(Child $child)
    {
        abort_if(Gate::denies('child_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $child->load('house');
        $nested_childrens = NestedChild::where('children_id',$child->id)->get();

        return view('admin.children.show', compact('child','nested_childrens'));
    }

    public function destroy(Child $child)
    {
        abort_if(Gate::denies('child_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $child->delete();

        return back();
    }

    public function massDestroy(MassDestroyChildRequest $request)
    {
        Child::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
