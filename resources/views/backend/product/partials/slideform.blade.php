
<div class="form-group">
    {{ Form::label('photo', 'Image', ['class' => 'control-label ']) }}<br>
    {{ Form::file('photo', ['class' => 'form-control'])  }}
        @include('backend.includes.form_fields_validation',['fieldname' => 'photo'])

</div>

<div class="form-group">
    {{ Form::label('Status', null, ['class' => 'control-label ']) }}<br>
    {{ Form::radio('status', '1')  }} Active
    {{ Form::radio('status', '0', true)  }} De Active
    @include('backend.includes.form_fields_validation',['fieldname' => 'status'])

</div>
