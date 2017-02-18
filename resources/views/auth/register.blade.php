@extends('layouts.app')

@section('title')
  Sign Up
@endsection

@section('content')

    @if(session('status'))
        {{ session('status') }} <br>
    @endif

    <form role="form" method="POST" action="{{ url('/register') }}">
      {!! csrf_field() !!}

        <input type="text" name="name" placeholder="Name" value="{{ old('name') }}">
        @if($errors->has('name'))
          {{ $errors->first('name') }}
        @endif
<br>
        <input type="text" name="email" placeholder="Email Address" value="{{ old('email') }}">
        @if($errors->has('email'))
          {{ $errors->first('email') }}
        @endif
<br>
        <input type="password" name="password" placeholder="Password">
        @if($errors->has('password'))
          {{ $errors->first('password') }}
        @endif
<br>
        <input type="password" name="password_confirmation" placeholder="Password Confirmation">
        @if($errors->has('password_confirmation'))
          {{ $errors->first('password_confirmation') }}
        @endif
<br>
        <button type="submit">Submit</button>

    </form>
@endsection
