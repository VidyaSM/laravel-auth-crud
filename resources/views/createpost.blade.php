@extends('layouts.app')

@section('title')
  Create
@endsection

@section('content')
  <form class="" action="{{ url('createpost') }}" method="post">
    <input type="text" name="title" placeholder="title"> </input> <br>
    <input type="text" name="information" placeholder="information"> </input> <br>
    <input type="text" name="price" placeholder="price"> </input> <br>
    <input type="text" name="email" value="{{ $user->email }}"> </input> <br>
    <input type="text" name="nohp" placeholder="phone"> </input> <br>
    <input type="text" name="pin" placeholder="pin BB"> </input> <br>
    <input type="text" name="line" placeholder="id LINE"> </input> <br>
    <button type="submit"> Create </button>
    <input type="hidden" value="{{ Session::token() }}" name="_token">
  </form>
@endsection
