@extends('layout.master')

@section('Content')

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Social Media</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/listposts">ListsPosts</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>



        <div class="post form-control">

            @if(isset($err))
                <div class=" alert alert_danger ">{{$err}}</div>
            @endif
            <form enctype="multipart/form-data" class="Comment" action="/addpost" method="post">
                {{csrf_field()}}
                <input type="text" placeholder="title" class="form-control" name="title">
                <textarea name="postcontent" placeholder="conent"  class="form-control" id="" cols="30" rows="10"></textarea>
                <input type="file" name="photo">
                <i class="fa fa-comment"></i>
                <input type="submit" class="btn btn-primary" value="post">
            </form>

        </div>



@endsection