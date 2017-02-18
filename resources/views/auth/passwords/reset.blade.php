@extends('layouts.app')

@section('title')
  Password Reset
@endsection

@section('content')

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">

      {!! csrf_field() !!}

      <input type="hidden" name="token" value="{{ $token }}">

      <input type="email" class="form-control" name="email" value="{{ $email or old('email') }}">
      @if ($errors->has('email'))
        {{ $errors->first('email') }}
      @endif
<br>
      <input type="password" class="form-control" name="password">
      @if ($errors->has('password'))
        {{ $errors->first('password') }}
      @endif
<br>
      <input type="password" class="form-control" name="password_confirmation">
      @if ($errors->has('password_confirmation'))
        {{ $errors->first('password_confirmation') }}
      @endif
<br>
      <button type="submit" class="btn btn-primary">Reset Password</button>

    </form>

@endsection
