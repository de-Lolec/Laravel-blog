@extends('layouts.app')

@section('content')
    <main class="container">




        <div class="row g-5">
            <div class="col-md-8">


                <article class="blog-post">
                    <h2 class="blog-post-title">
                            {{ $item->title }}
                        </a></h2>

                    <p class="blog-post-meta">  {{ $item->published_at ? \Carbon\Carbon::parse($item->published_at)->format('d.M H:i') : ''}} by <a href="#">{{ $item->user->name }}</a></p>
                    <p> {{ $item->content_raw }} </p>
                    <hr>
                    <h4>Display Comments</h4>

                    @include('blog.main.commentsDisplay', ['comments' => $item->comments, 'post_id' => $item->id])

                    <hr />

                    <h4>Add comment</h4>
                    <form method="post" action="{{ route('comments.store') }}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="body"></textarea>
                            <input type="hidden" name="post_id" value="{{ $item->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Add Comment" />
                        </div>
                    </form>
@endsection
