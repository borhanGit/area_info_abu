<?php

namespace App\Http\Requests;

use App\Models\NestedChild;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyNestedChildRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('nested_child_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:nested_children,id',
        ];
    }
}
