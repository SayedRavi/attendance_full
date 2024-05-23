<?php

namespace App\Listeners;

use App\Mail\TeacherCreatedEmail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class WhenTeacherCreatedListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */

    public function handle(object $event)
    {
        Mail::to($event->email)->send(new TeacherCreatedEmail($event->name, $event->email, $event->password));
        return redirect()->to(route('teacher.index'))->with([
            'message' => 'Teacher Created Successfully',
            'classes' => 'green rounded'
        ]);
    }
}
