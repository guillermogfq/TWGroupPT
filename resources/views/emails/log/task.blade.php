@component('mail::message')
# Hola {{$name}}

Te comentamos que la Tarea #{{$id_task}},
con descripción {{$description}}, ha tenido un cambio

@component('mail::panel')
Usuario: {{$name_user}}

Comentario: {{$comments}}

Fecha: {{$date}}
@endcomponent

Adios,<br>
{{ config('app.name') }}
@endcomponent
