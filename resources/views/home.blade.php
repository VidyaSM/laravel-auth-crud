@extends('layouts.app')

@section('title')
  Home
@endsection

@section('content')

  @if(session('status'))
      {{ session('status') }}
      {{ Session::forget('status') }} <br>
  @endif

  @if(Auth::check())
    {{ Auth::user()->name }}
  @endif

  <h3> POST </h3>
  @foreach($posts as $p)
    {{ $p->title }} <br>
  @endforeach

  <br>

  <h3> USER </h3>
  @foreach($users as $u)
    {{ $u->name }} <br>
  @endforeach

@endsection
