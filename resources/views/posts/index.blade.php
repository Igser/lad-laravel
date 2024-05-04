@extends('layouts.site', ['title' => 'Все посты блога'])

@section('content')
    <h1 class="mb-3">Все посты блога</h1>
    @foreach ($posts as $post)
        <div class="card mb-4">
            <div class="card-header">
                <h2>{{ $post->name }}</h2>
            </div>
            <div class="card-body">
                <img src="https://via.placeholder.com/1000x300" alt="" class="img-fluid">
                <p class="mt-3 mb-0">{{ $post->excerpt }}</p>
            </div>
            <div class="card-footer">
                <div class="clearfix">
            <span class="float-left">
                Автор:
                <a href="">
                    {{ $post->user->name }}
                </a>
                <br>
                Дата: {{ $post->created_at }}
            </span>
                    <span class="float-right">
                <a href=""
                   class="btn btn-dark">Читать дальше</a>
            </span>
                </div>
            </div>
            @if ($post->tags->count())
                <div class="card-footer">
                    Теги:
                    @foreach($post->tags as $tag)
                        @php $comma = $loop->last ? '' : ' • ' @endphp
                        <a href="{{ route('blog.tag', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a>
                        {{ $comma }}
                    @endforeach
                </div>
            @endif
        </div>
    @endforeach
    {{ $posts->links() }}
@endsection
