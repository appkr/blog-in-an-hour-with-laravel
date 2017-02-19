@extends('layouts.app')

@section('content')
  <h1 class="page-header">
    <a href="{{ route('posts.create') }}" class="btn btn-primary pull-right">
      새 포스트 쓰기
    </a>
    블로그 포스트
  </h1>

  <ul>
    @foreach ($posts as $post)
      <li>
        <a href="{{ route('posts.show', $post->id) }}">
          {{ $post->title }}
        </a>

        <div style="margin:1em;">
          {{ $post->content }}
        </div>

        <small>
          by {{ $post->user->name }}
          •
          {{ $post->created_at->diffForHumans() }}
        </small>
      </li>
    @endforeach
  </ul>

  <div class="text-center">
    {!! $posts->links() !!}
  </div>
@endsection
