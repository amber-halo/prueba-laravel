@extends('master')

@section('content')
    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Title -->
            <h1 class="mt-4">{{$post->title}}</h1>

            <!-- Author -->
            <p class="lead">
                by
                <a href="#">{{$post->user->name}}</a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p>Posted on {{$post->created_at->format('M d, Y')}}</p>

            <hr>

            <!-- Preview Image -->
            <img class="img-fluid rounded" src="/storage/{{$post->featured_image}}" alt="">

            <hr>

            <!-- Post Content -->
            {!! $post->content !!}
            <hr>

            <!-- Comments -->


        </div>


        @include('widgets.sidebar')

    </div>
@endsection