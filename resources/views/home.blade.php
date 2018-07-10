@extends('layouts/layout_base')
@section('title', "Home - Tasklist")

@section('content')
<div class="container">

    @if (session('Msg'))
    <div id="notificacao" class="notification {{ session('notification_status') }} displayNone">
        <span class="title">{{ session('notification_status') }} </span> {{ session('Msg') }}         
    </div>       
    @endif

    <hr>
    <h1>Tasklist</h1>
    <hr>

    <div>
        <h3 class="left">Listagem de tasks</h3>
        <button type="button" class="btn btn-info right">
            <a href="{{ url('home_add') }}">Novo</a> 
        </button>
    </div>

    <div class="table-responsive-sm">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Titulo</th>
                    <th class="col-2"  scope="col">Criado em</th>
                    <th class="col-1"  scope="col">Editar</th>
                    <th class="col-1"  scope="col">Deletar</th>
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
                    <td>{{ $Task->titulo }}</td>
                    <td>{{ date('d/m/Y H:i:s', strtotime($Task->created_at)) }}</td>
                    <td><button type="button" class="btn btn-info">
                            <a href="{{ route('edit_task', ['id' => $Task->id]) }}">Editar</a> 
                        </button>
                    </td>
                    <td><button type="button" class="btn btn-info">
                            <a href="{{ route('del_task', ['id' => $Task->id]) }}">Deletar</a>
                        </button>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>   
    </div>
</div>
@stop