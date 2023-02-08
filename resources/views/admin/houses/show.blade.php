@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} বাড়ি
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.houses.index') }}">
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
                            {{ $house->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            বাড়ির নাম
                        </th>
                        <td>
                            {{ $house->house_name }}
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
                                            <h3 style="border:10px;">এই বাড়ির সন্তানের তথ্য</h3>
                                            <hr>
                                        </div>
                                        <div>
                                            <table class="table table-bordered table-striped">
                                                <thead style="background-color: #605CA8; color: white;">
                                                    <tr>
                                                        <th scope="col">সিরিয়াল নম্বর </th>
                                                        <th scope="col">সন্তানের নাম</th>
                                                        <th scope="col">পেশা</th>
                                                        <th scope="col">মোবাইল</th>
                                                        <th scope="col">স্বামী/ স্ত্রী নাম </th>
                                                        <th scope="col">স্বামী/ স্ত্রী মোবাইল </th>
                                                        <th scope="col">স্বামী/ স্ত্রী পেশা </th>
                                                        <th scope="col">রক্তের গরূপ </th>
                                                        <th scope="col">তার সন্তানের সংখ্যা </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($childrens as $key=> $children)
                                                    <tr>
                                                        <th scope="row">{{ $key+1}}</th>
                                                        <td>{{ $children->children_name ?? ''}}</td>
                                                        <td>{{ $children->profession ?? ''}}  </td>
                                                        <td>{{ $children->mobile_no ?? ''}}  </td>
                                                        <td>{{ $children->spouse_name ?? ''}}  </td>
                                                        <td>{{ $children->spouse_mobile_no ?? ''}}  </td>
                                                        <td>{{ $children->spouse_profession ?? ''}}  </td>
                                                        <td>{{ $children->blood_group ?? ''}}  </td>
                                                        <td>{{ $children->children_number ?? ''}}  </td>
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
                <a class="btn btn-default" href="{{ route('admin.houses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection