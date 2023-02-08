@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} বাড়ি
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.houses.update", [$house->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="house_name">বাড়ির নাম</label>
                <input class="form-control {{ $errors->has('house_name') ? 'is-invalid' : '' }}" type="text" name="house_name" id="house_name" value="{{ old('house_name', $house->house_name) }}" required>
                @if($errors->has('house_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('house_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.house.fields.house_name_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection