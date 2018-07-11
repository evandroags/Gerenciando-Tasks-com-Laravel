@extends('layouts/layout_base')
@section('title', "Home - Tasklist")

@section('content')
<div>
    <h3 class="left"><i class="fa fa-list-alt"></i> Listagem de tasks</h3>
    <button type="button" class="btn btn-success btn-sm right newBut">
        <i class="fa fa-plus"></i>
        <a href="{{ url('home_add') }}"> Novo</a> 
    </button>
</div>

<div class="table-responsive-sm">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col" title="Marcar/Desmarcar conclusão da task.">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" checked disabled id="customCheckHead">
                        <label class="custom-control-label" for="customCheckHead"></label>
                    </div>
                </th>
                <th class="col-2" scope="colgroup">Titulo</th>
                <th class="col-1" scope="col">Status</th>
                <th class="col-1" scope="col">Criação</th>
                <th class="col-1" scope="col">Alteração</th>
                <th class="col-1" scope="col">Conclusão</th>
                <th class="col-1" scope="col">Editar</th>
                <th class="col-1" scope="col">Deletar</th>
            </tr>
        </thead>
        <tbody>
            @if (count($Tasks) <= 0)
            <tr>
                <td>Nenhuma task cadastrada</td>
                <td></td>
                <td></td>
            </tr>
            @else
            @foreach($Tasks as $Task)
            <tr>
                <td>
                    <div class="custom-control custom-checkbox" title="Marcar/Desmarcar conclusão da task.">
                        <input type="checkbox" class="custom-control-input checkTask" id="{{ $Task->id }}" {{ ($Task->status == 2) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="{{ $Task->id }}"></label>
                    </div>
                </td>
                <td>{{ $Task->titulo }}</td>
                <td>
                    @if($Task->status == 1)
                    <span>Aberto</span>
                    @else
                    <span>Concluído</span>
                    @endif
                </td>
                <td>{{ date('d/m/Y', strtotime($Task->created_at)) }}</td>
                <td>{{ date('d/m/Y', strtotime($Task->updated_at)) }}</td>
                <td>
                    @if($Task->status == 2)
                    <span>{{ date('d/m/Y', strtotime($Task->updated_at)) }}</span>
                    @else
                    -
                    @endif
                </td>
                <td>
                    <button type="button" class="btn btn-info btn-sm">
                        <i class="fa fa-pencil-alt"></i>
                        <a href="{{ route('edit_task', ['id' => $Task->id]) }}"> Editar</a> 
                    </button>
                </td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i>
                        <a class="verificaDelete" id="{{ route('del_task', ['id' => $Task->id]) }}"> Deletar</a>
                    </button>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>   
</div>
@stop