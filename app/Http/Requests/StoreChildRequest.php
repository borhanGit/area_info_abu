<?php

namespace App\Http\Requests;

use App\Models\Child;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreChildRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('child_create');
    }

    public function rules()
    {
        return [
            'house_id' => [
                'required',
                'integer',
            ],
            'children_name' => [
                'string',
                'required',
            ],
            'profession' => [
                'string',
                'nullable',
            ],
            'mobile_no' => [
                'string',
                'nullable',
            ],
            'spouse_name' => [
                'string',
                'nullable',
            ],
            'spouse_mobile_no' => [
                'string',
                'nullable',
            ],
            'spouse_profession' => [
                'string',
                'nullable',
            ],
            'blood_group' => [
                'string',
                'nullable',
            ],
            'children_number' => [
                'string',
                'nullable',
            ],
        ];
    }
}
