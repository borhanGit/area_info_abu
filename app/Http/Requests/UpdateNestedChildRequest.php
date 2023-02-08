<?php

namespace App\Http\Requests;

use App\Models\NestedChild;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNestedChildRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('nested_child_edit');
    }

    public function rules()
    {
        return [
            'children_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'string',
                'nullable',
            ],
            'age' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'study_stage' => [
                'string',
                'nullable',
            ],
            'study_place' => [
                'string',
                'nullable',
            ],
        ];
    }
}
