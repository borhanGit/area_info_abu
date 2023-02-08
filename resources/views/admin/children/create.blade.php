@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        সন্তান অ্যাড করুন 
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.children.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="house_id">বাড়ি</label>
                <select class="form-control select2 {{ $errors->has('house') ? 'is-invalid' : '' }}" name="house_id" id="house_id" required>
                    @foreach($houses as $id => $entry)
                        <option value="{{ $id }}" {{ old('house_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('house'))
                    <div class="invalid-feedback">
                        {{ $errors->first('house') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.child.fields.house_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="children_name">সন্তানের নাম </label>
                <input class="form-control {{ $errors->has('children_name') ? 'is-invalid' : '' }}" type="text" name="children_name" id="children_name" value="{{ old('children_name', '') }}" required>
                @if($errors->has('children_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('children_name') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label for="profession">পেশা</label>
                <input class="form-control {{ $errors->has('profession') ? 'is-invalid' : '' }}" type="text" name="profession" id="profession" value="{{ old('profession', '') }}">
                @if($errors->has('profession'))
                    <div class="invalid-feedback">
                        {{ $errors->first('profession') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.child.fields.profession_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mobile_no">মোবাইল</label>
                <input class="form-control {{ $errors->has('mobile_no') ? 'is-invalid' : '' }}" type="text" name="mobile_no" id="mobile_no" value="{{ old('mobile_no', '') }}">
                @if($errors->has('mobile_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.child.fields.mobile_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="spouse_name">স্বামী/ স্ত্রী নাম </label>
                <input class="form-control {{ $errors->has('spouse_name') ? 'is-invalid' : '' }}" type="text" name="spouse_name" id="spouse_name" value="{{ old('spouse_name', '') }}">
                @if($errors->has('spouse_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('spouse_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.child.fields.spouse_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="spouse_mobile_no">স্বামী/ স্ত্রী মোবাইল </label>
                <input class="form-control {{ $errors->has('spouse_mobile_no') ? 'is-invalid' : '' }}" type="text" name="spouse_mobile_no" id="spouse_mobile_no" value="{{ old('spouse_mobile_no', '') }}">
                @if($errors->has('spouse_mobile_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('spouse_mobile_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.child.fields.spouse_mobile_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="spouse_profession">স্বামী/ স্ত্রী পেশা</label>
                <input class="form-control {{ $errors->has('spouse_profession') ? 'is-invalid' : '' }}" type="text" name="spouse_profession" id="spouse_profession" value="{{ old('spouse_profession', '') }}">
                @if($errors->has('spouse_profession'))
                    <div class="invalid-feedback">
                        {{ $errors->first('spouse_profession') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.child.fields.spouse_profession_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="blood_group">রক্তের গরূপ</label>
                <input class="form-control {{ $errors->has('blood_group') ? 'is-invalid' : '' }}" type="text" name="blood_group" id="blood_group" value="{{ old('blood_group', '') }}">
                @if($errors->has('blood_group'))
                    <div class="invalid-feedback">
                        {{ $errors->first('blood_group') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.child.fields.blood_group_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="children_number">তার সন্তানের সংখ্যা </label>
                <input class="form-control {{ $errors->has('children_number') ? 'is-invalid' : '' }}" type="text" name="children_number" id="children_number" value="{{ old('children_number', '') }}">
                @if($errors->has('children_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('children_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.child.fields.children_number_helper') }}</span>
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