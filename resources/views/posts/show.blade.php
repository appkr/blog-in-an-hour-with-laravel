@extends('layouts.app')

@section('content')
  <h1 class="page-header">
    {{ $post->title }}
  </h1>

  <small>
    by {{ $post->user->name }}
    •
    {{ $post->created_at->diffForHumans() }}
  </small>

  <article>
    {{ $post->content }}
  </article>

  <div class="text-center">
    <a href="{{ route('posts.index') }}" class="btn btn-default">목록보기</a>
    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">
      수정하기
    </a>
    <button type="submit" class="btn btn-danger"
            onclick="event.preventDefault();document.getElementById('delete-form').submit();">
      삭제하기

      <form id="delete-form" action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: none;">
        {!! csrf_field() !!}
        {!! method_field('delete') !!}
      </form>
    </button>
  </div>

  <h2>댓글</h2>

  @if (auth()->check())
    <form method="post" action="{{ route('posts.comments.store', $post->id) }}">
      {!! csrf_field() !!}

      <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">
        <textarea name="body" class="form-control" placeholder="의견을 남겨 주세요."></textarea>
        @if ($errors->has('body'))
          <span class="help-block">
              <strong>{{ $errors->first('body') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group text-right">
        <button type="submit" class="btn btn-primary btn-sm">
          의견 남기기
        </button>
      </div>
    </form>
  @endif

  @if ($comments->count())
    <ul>
      @foreach ($comments as $comment)
        <li id="comment-{{ $comment->id }}">
          {{ $comment->body }}
          <br/>
          <small>
            by {{ $comment->user->name }}
            •
        {{ $comment->created_at->diffForHumans() }}
    </ul>
    </small>
    </li>
    @endforeach
    </ul>
  @endif
@endsection
