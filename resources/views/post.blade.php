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
            {{$posts->created_at->diffForHumans()}}

            <form action="/edit/{{$posts->id}}" style="margin-bottom: 25px" method="post">
               {{csrf_field()}}

                <img src ="{{ Storage::url($posts->image)}}" width="100" height="100"/>
                <input type="text" name="title" class="form-control" value="{{$posts->title}}">
                <input type="text"  class="postp form-control" name="conten" value="{{$posts->content}}">
                <input type="submit" class="btn btn-success" value="Edit">
            </form>
            <form action="/delete/{{$posts->id}}" method="get">
                <input type="submit" class="btn btn-danger" value="Delete">
            </form>


            @foreach($posts->Comment as $mycomment)

                <form action="" style="margin-bottom: 25px" >

                    {{--                {{post->created_at->diffForHumans()}}--}}
                    <input type="text"  class="postp form-control" name="conten" value="{{$mycomment->content}}">

                </form>


            @endforeach

            <form class="Comment" action="/comment/{{$posts->id}}" method="post">
                {{csrf_field()}}
                <textarea name="comment" class="form-control" id="" cols="30" rows="10"></textarea>

                <i class="fa fa-comment"></i>
                <input type="submit" class="btn btn-primary" value="Comment">
            </form>

        </div>



@endsection