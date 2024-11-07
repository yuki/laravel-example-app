@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Posts</h1>

  <ul>
    {{--esto es un comentario: recorremos el listado de posts--}}
    @foreach ($posts as $post)
      {{-- visualizamos los atributos del objeto --}}
      <li>
        <a href="{{route('posts.show',$post)}}"> {{$post->titulo}}</a>.
        Escrito el {{$post->created_at}}
      </li>
    @endforeach
  </ul>
</div>
@endsection