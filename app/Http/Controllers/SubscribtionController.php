<?php

namespace App\Http\Controllers;

use App\Notifications;
use App\Product;
use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class SubscribtionController extends Controller
{
    public function subscribe($id){
        $product = Product::findOrFail($id);

        if(!(Subscription::where([
            'user_id' => Auth::id(),
            'product_id' => $id
        ])->exists())) {
            $subscription = new Subscription();
            $subscription->product_id = $id;
            $subscription->user_id    = Auth::id();
            $saved = $subscription->save();

            return Redirect::back()->with('success', __('product.subscribed'));
        } else {
            $delete = Subscription::where([
                'user_id' => Auth::id(),
                'product_id' => $id
            ])->delete();

            return Redirect::back()->with('success', __('product.unsubscribed'));
        }
    }

    public function notify($id){

        $subscription = Subscription::select('subscriptions.*', 'products.user_id as product_user_id')
            ->join('products', 'subscriptions.product_id', '=', 'products.id')
            ->where('subscriptions.product_id', $id)
            ->get();
        $first = $subscription->first();

        if( $first && $first->product_user_id === Auth::id() ) {
            $notifications = [];
            foreach($subscription as $subscribe){
                $notifications[] = [
                    'user_id' => $subscribe['user_id'],
                    'text'    => 'Ripe time! Contact this grower for product.',
                    'link'    => 'product/'.$subscribe['product_id'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }

            Notifications::insert($notifications);
        }

        return Redirect::back();

    }
}
