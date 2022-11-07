@extends('layouts.app')

@section('content')

    @include('blog.admin.posts.includes.result_messages')

        @if($item->exists)
            <form method="POST" action="{{ route('blog.admin.posts.update', $item->id) }}">
        @method('PATCH')
        @else
            <form method="POST" action="{{ route('blog.admin.posts.store', $item->id) }}">
        @endif
        @csrf
        <div class="container">
            @if($errors->any())
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first() }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif

            @if(session('success'))
                    <div class="row justify-content-center">
                        <div class="col-md-11">
                            <div class="alert alert-success" role="alert">
                                {{ session()->get('success') }}
                                <button type="button" class="close" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('blog.admin.posts.includes.post_edit_main_col')
            </div>
            <div class="col-md-3">
                @include('blog.admin.posts.includes.post_edit_add_col')
            </div>

        </div>
    </form>

    @if($item->exists)
    <br>
    <form method="POST" action="{{ route('blog.admin.posts.destroy', $item->id) }}">
    @method('DELETE')
    @csrf
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-block">
                <div class="card-body ml-auto">
                    <button type="submit" class="btn btn-link">Удалить</button>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
            </form>
        @endif
    </div>
                        </div>
@endsection
