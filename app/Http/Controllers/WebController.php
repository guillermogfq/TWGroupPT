<?php

namespace App\Http\Controllers;

use App\Http\Requests\LogsRequest;
use App\Http\Requests\TaskRequest;
use App\Mail\LogTask;
use App\Models\Logs;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class WebController extends Controller
{
    public const LIST = 1;
    public const CREATE = 2;
    public const CREATE_LOG = 3;
    public const SHOW = 4;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function listTasks()
    {
        $tasks = Task::all();
        $data = array('title' => 'Lista de Tareas', 'view_num' => WebController::LIST, 'tasks' => $tasks);
        return view('task', $data);
    }

    public function showForm()
    {
        $users = User::all();
        $data = array('title' => 'Crear Tarea', 'view_num' => WebController::CREATE, 'users' => $users);
        return view('task', $data);
    }

    public function showFormLog(Task $task)
    {
        $data = array('title' => 'Crear Registro', 'view_num' => WebController::CREATE_LOG, 'task' => $task);
        return view('task', $data);
    }

    public function createTask(TaskRequest $request)
    {
        $validated = $request->validated();
        $task = new Task();
        $task->description = $validated['description'];
        $task->max_date_execution = $validated['max_date_execution'];
        $task->user_assign_id = $validated['user_assign_id'];
        $task->user_creator_id = Auth::user()->id;
        $task->save();

        $message = 'Tarea creada exitosamente.';
        $route = 'tasks';
        return redirect()->route($route)->with('status_success', $message);
    }

    public function createTaskLog(LogsRequest $request, Task $task)
    {
        $validated = $request->validated();
        $log = new Logs();
        $log->comments = $validated['comments'];
        $log->task_id = $task->id;
        $log->save();

        Mail::to($task->userCreator->email)->send(new LogTask($log));

        $message = 'Registro creado exitosamente.';
        $route = 'show';
        return redirect()->route($route, ['task' => $task->id])->with('status_success', $message);
    }

    public function showTask(Task $task)
    {
        if($task->userAssign->id == Auth::user()->id){
            $data = array('title' => 'Mostrar Tarea', 'view_num' => WebController::SHOW, 'task' => $task);
            return view('task', $data);
        }
        $message = 'Sólo el usuario asignado puede visualizar esta tarea';
        $route = 'tasks';
        return redirect()->route($route)->with('status_warning', $message);
    }
}
