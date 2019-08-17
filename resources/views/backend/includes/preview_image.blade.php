@if(isset($data['row']))
    <div class="form-group">
        {!! Form::label('main_image', 'Existing image') !!}<br>
        @if($data['row']->image)
            <img src="{{asset('images/').'/'.$panel.'/'. $data['row']->image}}" alt="{{$data['row']->image}}" width="200" class="img-responsivess">
        @else
            <p>No Image</p>
        @endif

    </div>
@endif