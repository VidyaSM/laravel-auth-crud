@extends('layouts.app')

@section('title')
  Sign In
@endsection

@section('content')

    <form role="form" method="POST" action="{{ url('/login') }}">
      {!! csrf_field() !!}

        <input type="email" name="email" placeholder="E-mail address" value="{{ old('email') }}">
        @if($errors->has('email'))
          {{ $errors->first('email') }}
        @endif
<br>
        <input type="password" name="password" placeholder="Password">
        @if($errors->has('password'))
          {{ $errors->first('password') }}
        @endif
<br>
        <button type="submit">Submit</button>

    </form>

@endsection
