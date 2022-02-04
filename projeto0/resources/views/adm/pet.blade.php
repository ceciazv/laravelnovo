@extends('adm.layout')

@section('content')
<a href="{{url('pet/create')}}" class="button">Adicionar</a>
<table>
  <thead>
    <tr>
      <th>Nome</th>
      <th>Nascimento</th>
      <th>Imagem</th>
      <th>Dono</th>
      <th>Editar</th>
      <th>Remover</th>
    </tr>
  </thead>
  <tbody>
    @foreach($pets as $pwt)
    <tr>
      <td>{{$pet->nome}}</td>
      <td>{{$pet->nascimento}}</td>
      <td><img src="{{$pet->imagem}}" /></td>
      <td>
        @if($pet->dono)
        {{$pet->dono->user->name}}
        @endif
      </td>
      <td>
        <a href="{{route('pet.edit',$pet->id)}}" class="button">
          Editar
        </a>
      </td>
      <td>
        <form method="POST" action="{{route('pet.destroy',$pet->id)}}" onsubmit="return confirm('você está certo disso?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="button">
            Remover
          </button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection