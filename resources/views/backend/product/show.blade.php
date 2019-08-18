@extends('backend.layouts.app')
@section('title','View '.$panel)
@section('css')
    <link rel="stylesheet"
          href="{{ asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/css/alert.css')}}">
@endsection
@section('content')
    <div class="content-wrapper" style="min-height: 916px;">
    @include('backend.includes.breadcrumb',['page'=>'Details'])


    @include('backend.includes.message')
    <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Details of {{ $panel }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                                               aria-describedby="example1_info">
                                            @if($data['row']->count() == 0 )
                                                <tr>
                                                    <td class="bg bg-danger" colspan="2">Invalid Data</td>

                                                </tr>
                                            @else
                                                <tr>
                                                    <th width="25%">code </th>
                                                    <td>{{$data['row']->code }}</td>
                                                </tr>
                                                <tr>
                                                    <th width="25%">Name</th>
                                                    <td>{{$data['row']->name}}</td>
                                                </tr>
                                                <tr>
                                                    <th width="25%">Price </th>
                                                    <td>{{$data['row']->price }}</td>
                                                </tr>

                                                <tr>
                                                <tr>
                                                    <th width="25%">Quantity</th>
                                                    <td>{!! $data['row']->quantity!!}</td>
                                                </tr>

                                                <tr>
                                                    <th width="25%">Description</th>
                                                    <td>{!! $data['row']->description!!}</td>
                                                </tr>
                                                <tr>
                                                    <th width="25%">image </th>
                                                    <td><img src="{{asset('images/product').'/'. $data['row']->image}}" height="100" alt="{{$data['row']->image}}"/></td>
                                                </tr>
                                                <tr>
                                                    <th width="25%">QR code </th>
                                                    <td>
                                                        {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(250)->generate('ItSolutionStuff.com'); !!}
                                                        <br/><a href="{{asset('images/product').'/'. $data['row']->qr_code}}" class="btn btn-info" download=""> download</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th width="25%">Status</th>
                                                    <td>@if ($data['row']->status==0)
                                                            <span class="label label-warning">Deactive</span>
                                                        @else <span class="label label-success">Active</span>
                                                        @endif</td>
                                                </tr>
                                                <tr>
                                                    <th>Created At</th>
                                                    <td>{{ date('D, j M Y', strtotime($data['row']->created_at)) }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Updated At</th>
                                                    <td>{{ date('D, j M Y', strtotime($data['row']->updated_at)) }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Created By</th>
                                                    <td>{{Auth::user($data['row']->created_by)->name}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Updated By</th>
                                                    <td>{{Auth::user($data['row']->updated_by)->name}}</td>
                                                </tr>
                                                <tr>

                                                    <td><a class="cust_btm btn btn-block btn-warning"
                                                           href="{{ route($base_route.'.edit', ['id' => $data['row']->id]) }}"><i
                                                                class="glyphicon glyphicon-edit"></i>Edit</a></td>

                                                    <td> <button href="" class=" btn btn-danger" data-toggle="modal" data-target="#myModal">
                                                            <i class="fa fa-trash"></i>Delete</button>

                                                    </td>
                                                    <div class="modal fade" id="myModal" role="dialog">
                                                        <div class="modal-dialog">
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header  bg bg-primary">
                                                                    <h3 class="modal-title"> Delete Conformation</h3>
                                                                    <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
                                                                </div>
                                                                {!! Form::open(['route' => [$base_route.'.destroy', $data['row']->id],'method'=>'POST']) !!}
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


                                                </tr>

                                            @endif

                                        </table>
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

