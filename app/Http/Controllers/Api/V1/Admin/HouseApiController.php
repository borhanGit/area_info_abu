<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHouseRequest;
use App\Http\Requests\UpdateHouseRequest;
use App\Http\Resources\Admin\HouseResource;
use App\Models\House;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HouseApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('house_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HouseResource(House::all());
    }

    public function store(StoreHouseRequest $request)
    {
        $house = House::create($request->all());

        return (new HouseResource($house))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(House $house)
    {
        abort_if(Gate::denies('house_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HouseResource($house);
    }

    public function update(UpdateHouseRequest $request, House $house)
    {
        $house->update($request->all());

        return (new HouseResource($house))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(House $house)
    {
        abort_if(Gate::denies('house_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $house->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
