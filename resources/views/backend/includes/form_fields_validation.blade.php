@if($errors->has($fieldname))
    <label class="text text-danger">{{$errors->first($fieldname)}}</label>
    {{--<p class="text-red">{!! $errors->first($fieldname) !!}</p>--}}
@endif