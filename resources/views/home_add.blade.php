@extends('layouts/layout_base')
@section('title', "Cadastro - Tasklist")

@section('content')
<div>
    <h3 class="left"><i class="fa fa-plus-square"></i> Cadastro de tasks:</h3>
</div>

<div class="clear"></div>

<form method="post" action="{{ route('add_task') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="titulo">Título da task:</label>
        <input type="text" name="titulo" class="form-control" id="titulo" required placeholder="Informe o título">
    </div>

    <div class="form-group">
        <label for="descricao">Descrição:</label>
        <textarea class="form-control" name="descricao" id="descricao" rows="3"  placeholder="Informe a descrição da task"></textarea>
    </div>

    <button type="submit" class="btn btn-success">
        Salvar
    </button>

    <button type="button" class="btn btn-danger">
        <a href="{{ url('home') }}">Cancelar</a> 
    </button>

</form>
<script src="{{ asset('js/main.js') }}"></script>
</div>
@stop