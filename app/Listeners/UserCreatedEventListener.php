<?php

namespace App\Listeners;

use Str;
use App\Models\User;
use App\Events\UserCreatedEvent;

class UserCreatedEventListener
{
    /**
     * Handle the event.
     *
     * @param  UserCreatedEvent  $event
     * @return void
     */
    public function handle(UserCreatedEvent $event)
    {
        /** @var User */
        $user = $event->user;

        // If user has no password send a random password through email
        if ($user->hasNoPassword()) {
            $password = Str::random(12);

            $user->update([
                'password' => bcrypt($password)
            ]);

            // Send email
        }
    }
}
