<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Subscription extends Model
{
    protected $table = 'subscriptions';

    public static function check($id){
        $sub = self::where([
            'user_id' => Auth::id(),
            'product_id' => $id
        ]);

        $product = Product::findOrFail($id);

        if($sub->exists()) {
            return true;
        } else {
            return false;
        }
    }
}
