<section class="content-header">
    <h1>
        {{ucfirst($panel)}} Management
        @if(isset($panel))
            <a href="{{route($base_route.'.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>  Create  {{ucfirst($panel)}}</a> &nbsp;
            <a href="{{route($base_route.'.index' )}}" class="btn btn-primary"><i class="fa fa-list"></i>  List  {{ucfirst($panel)}}</a>
        @endif
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        @if(isset($panel))<li><a href="{{route($base_route.'.index' )}}">{{ucfirst($panel)}}</a></li>@endif
        <li class="active">{{$page}}</li>
    </ol>
</section>


@include('backend.includes.message')
