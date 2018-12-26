<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('updates', function ($user) {
    return auth()->check();
});
Broadcast::channel('comments', function ($user) {
    return $user->toArray();
});
    /*
Broadcast::channel('comments.{id_update}', function ($user, $id_update) {
    return $user->id === $id_update;
});
*/ 
Broadcast::channel('online', function ($user) {
    if (auth()->check()) {
        return $user->toArray();
    }
});

