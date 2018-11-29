<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{

    public function isSeen($datetime){
        if($this->created_at->gt(Carbon::parse($datetime))){
            $this->is_seen = false;
        } else {
            $this->is_seen = true;
        }

        return $this;
    }

}
