@extends('backend.layouts.app')
@section('title','Dasnboard')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Dasboard
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>


        <section class="content">
            @include('backend.includes.errors')
            <div class="row">
                {!! Form::open(['route' => 'backend.product.find', 'method' => 'POST','files' => true]) !!}
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">This is dashboard </h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                {{ Form::label('csv', 'File', ['class' => 'control-label ']) }}<br>
                                {{ Form::file('csv', ['class' => 'form-control'])  }}
                                @include('backend.includes.form_fields_validation',['fieldname' => 'csv'])

                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-check icheck"></i>Submit </button>
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
