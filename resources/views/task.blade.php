<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if(session('status_danger'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin-bottom: 30px;">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Tenemos un problema!</strong> {{ session('status_danger') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif
        @if(session('status_warning'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin-bottom: 30px;">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Información!</strong> {{ session('status_warning') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif
        @if(session('status_success'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin-bottom: 30px;">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Todo bien!</strong> {{ session('status_success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin-bottom: 30px;">
            @if (App\Http\Controllers\WebController::LIST == $view_num)
                <a href="{{route('form')}}" class="btn btn-primary">Crear Tarea</a>
            @endif
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <div class="card-header">
                    {{$title}}
                </div>
                <div class="card-body">
                    @if(App\Http\Controllers\WebController::LIST == $view_num)
                        @include('task.list', ['tasks' => $tasks] )
                    @endif
                    @if(App\Http\Controllers\WebController::CREATE == $view_num)
                        @include('task.form', ['users' =>  $users] )
                    @endif
                    @if(App\Http\Controllers\WebController::CREATE_LOG == $view_num)
                        @include('task.form-log', ['task' =>  $task] )
                    @endif
                    @if(App\Http\Controllers\WebController::SHOW == $view_num)
                        @include('task.show', ['task' => $task] )
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
