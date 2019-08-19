<div class="form-group">
    {{ Form::label('name', null, ['class' => 'control-label']) }}<span class="text text-danger">*</span>
    {{ Form::text('name', null, ['class' => 'form-control','placeholder'=>'Enter name']) }}
    @include('backend.includes.form_fields_validation',['fieldname' => 'name'])
</div>
{{--<div class="form-group">--}}
{{--    {{ Form::label('slug', null, ['class' => 'control-label']) }}<span class="text text-danger">*</span>--}}
{{--    {{ Form::text('slug', null, ['class' => 'form-control','placeholder'=>'Enter slug']) }}--}}
{{--    @include('backend.includes.form_fields_validation',['fieldname' => 'slug'])--}}
{{--</div>--}}
<div class="form-group">
    {{ Form::label('price', null, ['class' => 'control-label']) }}<span class="text text-danger">*</span>
    <div class="input-group">
        <div class="input-group-addon">Rs.</div>
        {{ Form::number('price', null, ['class' => 'form-control','placeholder'=>'Enter price']) }}
        <div class="input-group-addon">.00</div>
    </div>
    @include('backend.includes.form_fields_validation',['fieldname' => 'price'])
</div>
<div class="form-group">
    {{ Form::label('quantity', null, ['class' => 'control-label']) }}<span class="text text-danger">*</span>
    {{ Form::number('quantity', null, ['class' => 'form-control','placeholder'=>'Enter quantity']) }}
    @include('backend.includes.form_fields_validation',['fieldname' => 'quantity'])
</div>
<div class="form-group">
    {{ Form::label('description', null, ['class' => 'control-label']) }}<span class="text text-danger">*</span>
    {{ Form::textarea('description', null, ['class' => 'form-control ckeditor','placeholder'=>'Enter description']) }}
    @include('backend.includes.form_fields_validation',['fieldname' => 'description'])
</div>
