@extends('layouts.app')

@section('content')
  <h1 class="page-header">
    새 포스트 쓰기
  </h1>

  <form method="post" action="{{ route('posts.store') }}">
    {!! csrf_field() !!}

    @include('posts.partial.form')

    <div class="form-group text-center">
      <button type="submit" class="btn btn-primary">저장하기</button>
    </div>
  </form>
@endsection