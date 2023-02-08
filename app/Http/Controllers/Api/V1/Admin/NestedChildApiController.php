<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNestedChildRequest;
use App\Http\Requests\UpdateNestedChildRequest;
use App\Http\Resources\Admin\NestedChildResource;
use App\Models\NestedChild;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NestedChildApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('nested_child_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NestedChildResource(NestedChild::with(['children'])->get());
    }

    public function store(StoreNestedChildRequest $request)
    {
        $nestedChild = NestedChild::create($request->all());

        return (new NestedChildResource($nestedChild))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(NestedChild $nestedChild)
    {
        abort_if(Gate::denies('nested_child_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NestedChildResource($nestedChild->load(['children']));
    }

    public function update(UpdateNestedChildRequest $request, NestedChild $nestedChild)
    {
        $nestedChild->update($request->all());

        return (new NestedChildResource($nestedChild))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(NestedChild $nestedChild)
    {
        abort_if(Gate::denies('nested_child_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nestedChild->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
