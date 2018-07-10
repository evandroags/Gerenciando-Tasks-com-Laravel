<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use DB;

class TaskController extends Controller {

    //Mostrar registros
    public function index() {
        $Tasks = DB::table('tasks')->where('status', '<>' ,'3')->orderBy('id', 'desc')->get();
        return view('home', ['Tasks' => $Tasks]);
    }

    //Adicionar registros
    public function add_task(Request $request) {
        try {
            $Tasks = new Task();
            $Tasks->create($request->except("_token"));
            return redirect('home')->with('Msg', "Task adicionada com êxito")->with('notification_status', "Sucesso");
        } catch (\Exception $e) {
            return redirect('home')->with('Msg', "Erro ao adicionar Task")->with('notification_status', "Erro");
        }
    }

    //Form Editar registros
    public function edit_task(Request $request) {
        $Tasks = DB::table('tasks')->where('id', $request['id'])->first();
        return view('home_edit', ['Tasks' => $Tasks]);
    }

    //Editar registros
    public function home_edit_task(Request $request) {
        $Tasks = Task::findOrFail($request['id']);
        try {
            $Tasks->update($request->except("_token"));
            return redirect('home')->with('Msg', "Alteração realizada com êxito")->with('notification_status', "Sucesso");
        } catch (\Exception $e) {
            return redirect('home')->with('Msg', "Erro ao editar")->with('notification_status', "Erro");
        }
    }

    //Deletar registros
    public function del_task(Request $request) {
        $Tasks = Task::findOrFail($request['id']);
        $request['status'] = '3';
        try {
            //$Tasks->delete();
            $Tasks->update($request->except("_token"));
            return redirect('home')->with('Msg', "Exclusão lógica realizada com sucesso")->with('notification_status', "Sucesso");
        } catch (\Exception $e) {
            return redirect('home')->with('Msg', "Erro ao deletar")->with('notification_status', "Erro");
        }

        return redirect('admin/paginas')->with('Msg', "Registro(s) deletado(s) com êxito")->with('notification_status', "Sucesso");
    }

}
