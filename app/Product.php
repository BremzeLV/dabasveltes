<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    protected $table = 'products';

    public function getImages(){
        $files = array();

        $iconUrl = Icons::where('item', $this->getOriginal('type'))->first();

        foreach (Storage::files('public/users/'.$this->user->id.'/products/'.$this->id) as $key => $filename) {
            $files['names'][] = str_replace('public/users/'.$this->user->id.'/products/'.$this->id.'/', '',$filename);
            $files['links'][] = asset(str_replace('public', 'storage',$filename));
        }

        if( empty($files) ) {
            $files['links'][] = asset('images/no-image.png');
            $files['names'][] = asset('no-image.png');
        }

        if(file_exists(public_path('/').'images/products/'.$iconUrl['url']))
            $files['icon'] = asset('images/products/'.$iconUrl['url']);
        else
            $files['icon'] = asset('images/products/question.png');

        $this->images = $files;
        return $this;
    }

    public static function fromSelects($input){
        $searchable = ['type'];
        $query      = [];
        $products      = new Product();

        foreach($input as $searchKey => $searchItem){
            $currentSearch = $products;
            if( in_array($searchKey, $searchable) ){
                if( !in_array('all', $searchItem) ) {
                    $currentSearch = $currentSearch->whereIn($searchKey, $searchItem);
                } else {
                    $currentSearch = $products;
                }
            }
            $products = $currentSearch;
        }

        if( empty($query) )
            return $products->get();
        else
            return $products->get();

    }

    public function getSelectData(){

    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function getRipeTimeAttribute($value)
    {
        $date = new \DateTime($value);
        return $date->format('Y-m-d');
    }

    public function getRipeTypeAttribute($value)
    {

        if($value === 'predicted'){
            return __('product.time_type_predicted');
        } else if($value === 'actual') {
            return __('product.time_type_actual');
        }
    }

    public function getRipeType(){
        return $this->ripe_type;
    }

    public function setPriceAttribute($value){
        $value = round($value, 2);
        $this->attributes['price'] = $value * 100;
    }

    public function getPriceAttribute($value){
        return $value / 100;
    }

    public function getTypeAttribute($value){
        return __('iconsList.'.$value);
    }
}
