@extends('backend.layouts.app')
@section('title','Create '.ucfirst($panel))
@section('content')
    <div class="content-wrapper">
        @include('backend.includes.breadcrumb',['page'=>'Edit'])


        <section class="content">
            @include('backend.includes.errors')
            <div class="row">
                {!! Form::model($data['row'],['route' => [$base_route.'.update', $data['row']->id], 'method' => 'POST','files' => true]) !!}
                {{ Form::hidden('_method', 'PUT') }}
                {{ Form::hidden('id', $data['row']->id) }}

                <div class="col-md-8">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update  {{ucfirst($panel)}} </h3>
                        </div>
                        <div class="box-body">
                            @include($base_route.'.partials.mainform')
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-check icheck"></i> Update </button>
                            <button type="reset" class="btn btn-warning"><i class="fa fa-undo icheck"></i> Cancel</button>
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
{{--    @include('backend.includes.ckeditor')--}}
@endsection
