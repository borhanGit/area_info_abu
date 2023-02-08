<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHouseRequest;
use App\Http\Requests\StoreHouseRequest;
use App\Http\Requests\UpdateHouseRequest;
use App\Models\Child;
use App\Models\House;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HouseController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('house_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $houses = House::all();

        return view('admin.houses.index', compact('houses'));
    }

    public function create()
    {
        abort_if(Gate::denies('house_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.houses.create');
    }

    public function store(StoreHouseRequest $request)
    {
        $house = House::create($request->all());

        return redirect()->route('admin.houses.index');
    }

    public function edit(House $house)
    {
        abort_if(Gate::denies('house_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.houses.edit', compact('house'));
    }

    public function update(UpdateHouseRequest $request, House $house)
    {
        $house->update($request->all());

        return redirect()->route('admin.houses.index');
    }

    public function show(House $house)
    {
        abort_if(Gate::denies('house_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $childrens = Child::where('house_id',$house->id)->get();

        return view('admin.houses.show', compact('house','childrens'));
    }

    public function destroy(House $house)
    {
        abort_if(Gate::denies('house_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $house->delete();

        return back();
    }

    public function massDestroy(MassDestroyHouseRequest $request)
    {
        House::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
