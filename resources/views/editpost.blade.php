<form class="" action="{{ url('/editpost/'.$id) }}" method="post">
  <input type="text" name="title" value="{{ $post->title }}">
  <button type="submit"> Create </button>
  <input type="hidden" value="{{ Session::token() }}" name="_token">
</form>
