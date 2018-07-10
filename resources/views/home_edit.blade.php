@extends('layouts/layout_base')
@section('title', "Editar - Tasklist")

@section('content')
<div class="container">
    <hr>
    <h1>Tasklist</h1>
    <hr>

    <div>
        <h3 class="left">Editar task</h3>
    </div>
    
    <div class="clear"></div>
    
    <form method="post" action="{{ route('home_edit_task') }}">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $Tasks->id }}" />
        
        <div class="form-group">
            <label for="titulo">Título da task</label>
            <input type="text" name="titulo" class="form-control" id="titulo" required value="{{ $Tasks->titulo }}" placeholder="Informe o título">
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" name="descricao" id="descricao" rows="3" placeholder="Informe a descrição da task">{{ $Tasks->descricao }}</textarea>
        </div>

        <div class="form-group">
            <div class="form-check">
                @if($Tasks->status == 1)
                <input class="form-check-input" name="status" type="checkbox" value="1" id="status">
                @else
                <input class="form-check-input" name="status" type="checkbox" checked value="2" id="status">
                @endif
                <label class="form-check-label" id="status" for="status">
                    Marcar como concluída.
                </label>
            </div>
        </div>

        <button type="submit" class="btn btn-success">
            Salvar
        </button>

        <button type="button" class="btn btn-danger">
            <a href="{{ url('home') }}">Cancelar</a> 
        </button>

    </form>

</div>
</div>
@stop