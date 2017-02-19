@extends('layouts.app')

@section('content')
  <h1 class="page-header">
    {{ $post->title }}
  </h1>

  <form method="post" action="{{ route('posts.update', $post->id) }}">
    {!! csrf_field() !!}
    {!! method_field('put') !!}

    @include('posts.partial.form')

    <div class="form-group text-center">
      <button type="submit" class="btn btn-primary">수정하기</button>
    </div>
  </form>
@endsection