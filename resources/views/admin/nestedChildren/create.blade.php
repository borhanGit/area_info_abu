@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        অ্যাড করুন 
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.nested-children.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="children_id"> পিতা/মাতার নাম </label>
                <select class="form-control select2 {{ $errors->has('children') ? 'is-invalid' : '' }}" name="children_id" id="children_id" required>
                    @foreach($childrens as $id => $entry)
                        <option value="{{ $id }}" {{ old('children_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('children'))
                    <div class="invalid-feedback">
                        {{ $errors->first('children') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.nestedChild.fields.children_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">সন্তানের নাম </label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.nestedChild.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="age">বয়স</label>
                <input class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" type="number" name="age" id="age" value="{{ old('age', '') }}" step="1">
                @if($errors->has('age'))
                    <div class="invalid-feedback">
                        {{ $errors->first('age') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.nestedChild.fields.age_helper') }}</span>
            </div>
            <div class="form-group">
                <label>পড়াশুনা করে কি না </label>
                @foreach(App\Models\NestedChild::STUDY_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('study') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="study_{{ $key }}" name="study" value="{{ $key }}" {{ old('study', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="study_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('study'))
                    <div class="invalid-feedback">
                        {{ $errors->first('study') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.nestedChild.fields.study_helper') }}</span>
            </div>
            <div class="form-group show_div" style="display:none">
                <label for="study_stage">কি পড়াশুনা করছে </label>
                <input class="form-control {{ $errors->has('study_stage') ? 'is-invalid' : '' }}" type="text" name="study_stage" id="study_stage" value="{{ old('study_stage', '') }}">
                @if($errors->has('study_stage'))
                    <div class="invalid-feedback">
                        {{ $errors->first('study_stage') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.nestedChild.fields.study_stage_helper') }}</span>
            </div>
            <div class="form-group show_div" style="display:none">
                <label for="study_place">পড়াশুনার জায়গার নাম </label>
                <input class="form-control {{ $errors->has('study_place') ? 'is-invalid' : '' }}" type="text" name="study_place" id="study_place" value="{{ old('study_place', '') }}">
                @if($errors->has('study_place'))
                    <div class="invalid-feedback">
                        {{ $errors->first('study_place') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.nestedChild.fields.study_place_helper') }}</span>
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
@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        if(inputValue == 1){
            $(".show_div").show();
        }else{
            $(".show_div").hide();
        }
       
    });
});
</script>
@endsection