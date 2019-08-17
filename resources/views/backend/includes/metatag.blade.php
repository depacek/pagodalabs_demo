
    <div class="form-group">
        {{ Form::label('meta_title', null, ['class' => 'control-label']) }}<span class="text text-danger">*</span>
        {{ Form::text('meta_title', null, ['class' => 'form-control','placeholder'=>'Enter Meta Title']) }}
        @if($errors->has('meta_title'))
            <label class="text text-danger">{{$errors->first('meta_title')}}</label>
        @endif
    </div>
    <div class="form-group">
        {{ Form::label('meta_description', null, ['class' => 'control-label']) }}<span class="text text-danger">*</span>
        {{ Form::text('meta_description', null, ['class' => 'form-control','placeholder'=>'Enter Meta Description']) }}
        @if($errors->has('meta_description'))
            <label class="text text-danger">{{$errors->first('meta_description')}}</label>
        @endif
    </div>
    <div class="form-group">
        {{ Form::label('meta_keywords', null, ['class' => 'control-label']) }}<span class="text text-danger">*</span>
        {{ Form::textarea('meta_keywords', null, ['class' => 'form-control','placeholder'=>'Enter Meta Keywords']) }}
        @if($errors->has('meta_keywords'))
            <label class="text text-danger">{{$errors->first('meta_keywords')}}</label>
        @endif
    </div>

    <div class="form-group">
        {{ Form::label('Status', null, ['class' => 'control-label ']) }}
        {{ Form::radio('status', '1', ['class' => 'form-control iCheck-helper'])  }} Active
        {{ Form::radio('status', '0', true)  }} De Active
    </div>