@extends('backend.layouts.app')
@section('title','Create '.$panel)
@section('content')
    <div class="content-wrapper">
        @include('backend.includes.breadcrumb',['page'=>'create'])


        <section class="content">
            @include('backend.includes.errors')
            <div class="row">{!! Form::open(['route' => $base_route.'.store', 'method' => 'POST','files' => true]) !!}
                <div class="col-md-8">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Create a {{ucfirst($panel)}} </h3>
                        </div>
                        <div class="box-body">
                            @include($base_route.'.partials.mainform')
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-check icheck"></i>Save </button>
                            <button type="reset" class="btn btn-warning"><i class="fa fa-undo icheck"></i>cancel</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Additional Information</h3>

                        </div>
                        <div class="box-body">
                            @include($base_route.'.partials.slideform')
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection

@section('js')
    @include('backend.includes.slug',['id' => 'name'])
    {{--@include('backend.includes.ckeditor')--}}
@endsection
