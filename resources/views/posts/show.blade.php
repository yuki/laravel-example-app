@extends('layouts.app')

@section('content')
<div class="container">
  <h1>{{$post->titulo}}</h1>
  <p>Creado el {{$post->created_at}}</p>
  <p>{{$post->texto}}</p>
  <div>
    <h4>Comentarios</h4>
      @foreach ($post->comentarios as $comentario)
        {{-- visualizamos los atributos del objeto --}}
        <li class="pt-1">
            {{$comentario->texto}}.

            Escrito el {{$post->created_at}}

          </div>
        </li>
      @endforeach
  </div>
</div>

@endsection