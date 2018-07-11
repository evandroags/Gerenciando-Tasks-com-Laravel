@extends('layouts/layout_base')
@section('title', "Edição - Tasklist")

@section('content')
<div>
    <h3 class="left"><i class="fa fa-pen-square"></i> Edição de tasks:</h3>
</div>

<div class="clear"></div>

<form method="post" action="{{ route('home_edit_task') }}">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $Tasks->id }}" />

    <div class="form-group">
        <label for="titulo">Título da task:</label>
        <input type="text" name="titulo" class="form-control" id="titulo" required value="{{ $Tasks->titulo }}" placeholder="Informe o título">
    </div>

    <div class="form-group">
        <label for="descricao">Descrição:</label>
        <textarea class="form-control" name="descricao" id="descricao" rows="3" placeholder="Informe a descrição da task">{{ $Tasks->descricao }}</textarea>
    </div>

    <button type="submit" class="btn btn-success">
        Salvar
    </button>

    <button type="button" class="btn btn-danger">
        <a href="{{ url('home') }}">Cancelar</a> 
    </button>

</form>
</div>
@stop