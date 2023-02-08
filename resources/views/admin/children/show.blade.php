@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} 
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.children.index') }}">
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
                            {{ $child->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            বাড়ি
                        </th>
                        <td>
                            {{ $child->house->house_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            সন্তানের নাম 
                        </th>
                        <td>
                            {{ $child->children_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            পেশা 
                        </th>
                        <td>
                            {{ $child->profession }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            মোবাইল 
                        </th>
                        <td>
                            {{ $child->mobile_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            স্বামী/ স্ত্রী নাম 
                        </th>
                        <td>
                            {{ $child->spouse_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            স্বামী/ স্ত্রী মোবাইল 
                        </th>
                        <td>
                            {{ $child->spouse_mobile_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            স্বামী/ স্ত্রী পেশা
                        </th>
                        <td>
                            {{ $child->spouse_profession }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            রক্তের গরূপ
                        </th>
                        <td>
                            {{ $child->blood_group }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            সন্তানের সংখ্যা 
                        </th>
                        <td>
                            {{ $child->children_number }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div>
                                            <h3 style="border:10px;">তার সন্তানের তথ্য </h3>
                                            <hr>
                                        </div>
                                        <div>
                                            <table class="table table-bordered table-striped">
                                                <thead style="background-color: #605CA8; color: white;">
                                                    <tr>
                                                        <th scope="col">সিরিয়াল নম্বর </th>
                                                        <th scope="col">সন্তানের নাম</th>
                                                        <th scope="col">বয়স</th>
                                                        <th scope="col">পড়াশুনা করে কি না</th>
                                                        <th scope="col">কি পড়াশুনা করছে</th>
                                                        <th scope="col">পড়াশুনার জায়গার নাম</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($nested_childrens as $key=> $nested_children)
                                                    <tr>
                                                        <th scope="row">{{ $key+1}}</th>
                                                        <td>{{ $nested_children->name ?? ''}}</td>
                                                        <td>{{ $nested_children->age ?? ''}}  </td>
                                                        <td>{{ $nested_children->study == 1 ? 'হ্যা' : 'না'}}</td>
                                                        @if ( $nested_children->study == 1)
                                                        <td>{{ $nested_children->study_stage ?? ''}}</td>
                                                        <td>{{ $nested_children->study_place ?? ''}}</td>                                                            
                                                        @endif
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.children.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection