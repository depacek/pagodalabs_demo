@extends('backend.layouts.app')
@section('title','List of '.$panel)
@section('content')
    <div class="content-wrapper">
    @include('backend.includes.breadcrumb',['page'=>'list'])


    <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">List of  {{$panel}}</h3>
                </div>
                <div class="box-body table table-responsive">
                    <table id="example1" class="table table-bordered">
                        <thead>
                        <tr role="row">
                            <th>S.N</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th width="17%">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @php($i=1)
                        @if($data['rows'] == $data['rows']->count() > 0 )
                            @foreach($data['rows'] as $row)
                                <tr role="row" class="odd">
                                    <td>{{ $i++}}</td>
                                    <td>{{$row->name}}
                                    </td>
                                    <td>{{$row->price}}</td>
                                    <td>{{$row->quantity}}</td>
                                    <td>
                                        @if($row->status==1)
                                            <span class="label label-success">Active</span>
                                        @else
                                            <span class="label label-danger">De Active</span>
                                        @endif
                                    </td>
                                    <td>{{ date('j M Y', strtotime($row->created_at)) }} </td>
                                    <td>

                                        <a href="{{route($base_route.'.show',$row->id)}}" class="btn btn-info" title="View Details"><i class="fa fa-eye"></i></a>
                                        <a href="{{route($base_route.'.edit',$row->id)}}" class="btn btn-warning" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="" class="btn btn-danger" data-toggle="modal" data-target="#myModal" title="Delete"><i class="fa fa-trash"></i></a>

                                        <div class="modal fade" id="myModal" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header  bg bg-primary">
                                                        <h3 class="modal-title"> Delete Conformation</h3>
                                                        <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
                                                    </div>
                                                    {!! Form::open(['route' => [$base_route.'.destroy', $row->id],'method'=>'POST']) !!}
                                                    {{ Form::hidden('_method', 'DELETE') }}

                                                    <div class="modal-body">
                                                        <h3>Are You Sure want to delete this record?</h3>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger" name="btnCreate"> <i class="fa fa-trash"></i> Delete ! </button>
                                                        {{--{!! Form::submit("Delete !",['class'=> 'btn btn-danger']) !!}--}}
                                                        {!! Form::close() !!}
                                                        <button type="button" class="btn btn-warning" data-dismiss="modal"> <span class="glyphicon glyphicon-remove"></span> Cancel ! </button>
                                                    </div>
                                                </div>
                                            </div>




                                    </td>
                                </tr>
                            @endforeach
                        @else

                            <tr>
                                <td colspan="7">Data Not Found</td>
                            </tr>

                        @endif

                        </tbody>

                        <tfoot>
                        <tr>
                            <th>S.N</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th width="17%">Action</th>
                        </tr>
                        </tfoot>

                    </table>
                </div>

            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>

@endsection

@section('js')
    @include('backend.includes.datatable')
@endsection
