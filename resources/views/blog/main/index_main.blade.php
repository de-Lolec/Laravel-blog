@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">



                <div class="card">
                    <div class="card-body">




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
                </div>
            </div>
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
