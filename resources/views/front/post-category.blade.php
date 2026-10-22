@extends('layouts.front')
@section('content')
        <!-- Page header with logo and tagline-->
        <div class="border-bottom mb-4">
        </div>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">

                        @foreach($posts as $post)
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="{{$post->image}}" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">{{$post->created_at}}</div>
                                    <h2 class="card-title h4">{{$post->title}}</h2>
                                    <p class="card-text">{{$post->content}}</p>
                                    <a class="btn btn-primary" href="{{ route('blog.item', $post->id) }}">Read more →</a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    {{$posts->links()}}
                </div>
                
@endsection
