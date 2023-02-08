<?php

namespace App\Http\Requests;

use App\Models\House;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHouseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('house_create');
    }

    public function rules()
    {
        return [
            'house_name' => [
                'string',
                'required',
            ],
        ];
    }
}
