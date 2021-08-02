<?php

namespace App\Mail;

use App\Models\Logs;
use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LogTask extends Mailable
{
    use Queueable, SerializesModels;

    private Logs $log;
    private Task $task;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($log)
    {
        $this->log = $log;
        $this->task = $this->log->task;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.log.task',[
            'name' => $this->task->userCreator->name,
            'name_user' => $this->task->userAssign->name,
            'comments' => $this->log->comments,
            'date' => $this->log->created_at,
            'id_task' => $this->task->id,
            'description' => $this->task->description
        ]);
    }
}
