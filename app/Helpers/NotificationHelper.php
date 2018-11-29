<?php
namespace App\Helpers;

use App\Notifications;
use App\User;
use Illuminate\Support\Facades\Auth;

class NotificationHelper
{
    public static function countUnreadNotifications(){
        $notifications = Notifications::where('user_id', Auth::id())->get();
        $user = User::findOrFail(Auth::id())->notifications_seen;

        $counter = 0;
        foreach($notifications as $notification){
            $notification->isSeen($user);
            if(!$notification->is_seen) $counter++;
        }

        return $counter;
    }
}