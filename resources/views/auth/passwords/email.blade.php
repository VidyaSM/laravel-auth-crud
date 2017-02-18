@extends('layouts.app')

@section('title')
  Password Reset
@endsection

@section('content')

@if(session('status'))
    {{ session('status') }}
@endif

  <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">

      {!! csrf_field() !!}

      <input type="email" class="form-control" name="email" value="{{ old('email') }}">

      @if ($errors->has('email'))
          {{ $errors->first('email') }}
      @endif

      <button type="submit" class="btn btn-primary"> Send </button>

  </form>
@endsection
