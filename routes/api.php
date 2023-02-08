<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // House
    Route::apiResource('houses', 'HouseApiController');

    // Children
    Route::apiResource('children', 'ChildrenApiController');

    // Nested Child
    Route::apiResource('nested-children', 'NestedChildApiController');
});
