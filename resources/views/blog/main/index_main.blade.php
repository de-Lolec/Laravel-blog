@extends('layouts.app')

@section('content')
    <main class="container">
        <div class="p-4 p-md-1 mb-4 rounded text-bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
                <p class="lead my-2">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>

            </div>
        </div>



        <div class="row g-5">
            <div class="col-md-8">
                <h3 class="pb-4 mb-4 fst-italic border-bottom">
                    From the Firehose
                </h3>

                <article class="blog-post">


                            @foreach($paginator as $post)
                                @php /** @var \App\Models\BlogPost $item */ @endphp

                                <h2 class="blog-post-title"> <a href="{{ route('blog.main', $post->id) }}">
                                        {{ $post->title }}
                                    </a></h2>

                                <p class="blog-post-meta">  {{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d.M H:i') : ''}} by <a href="#">{{ $post->user->name }}</a></p>
                                <p> {{ $post->excerpt }} </p>
                                <hr>


                            @endforeach


                    </div>


        @if($paginator->total() > $paginator->count())
            <br>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{ $paginator->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
