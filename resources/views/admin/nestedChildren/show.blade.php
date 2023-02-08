@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} 
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.nested-children.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            সিরিয়াল নম্বর 
                        </th>
                        <td>
                            {{ $nestedChild->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            পিতা/মাতার নাম 
                        </th>
                        <td>
                            {{ $nestedChild->children->children_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            সন্তানের নাম
                        </th>
                        <td>
                            {{ $nestedChild->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            বয়স 
                        </th>
                        <td>
                            {{ $nestedChild->age }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            পড়াশুনা করে কি না 
                        </th>
                        <td>
                            {{ App\Models\NestedChild::STUDY_RADIO[$nestedChild->study] ?? '' }}
                        </td>
                    </tr>
                    @if ($nestedChild->study==1)
                    <tr>
                        <th>
                            কি পড়াশুনা করছে
                        </th>
                        <td>
                            {{ $nestedChild->study_stage }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            পড়াশুনার জায়গার নাম 
                        </th>
                        <td>
                            {{ $nestedChild->study_place }}
                        </td>
                    </tr> 
                    @endif
                    
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.nested-children.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection