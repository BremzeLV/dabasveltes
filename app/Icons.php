<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icons extends Model
{
    protected $table = 'icons';

    public function groups(){
        return $this->select('group')->distinct()->get();
    }

    public function items(){
        return $this->select('item')->get();
    }

    public static function forSelect($excludeAll = false){
        $data       = self::all();
        $returnData = [];

        if(!$excludeAll)
            $returnData['all'] = __('iconsList.all');
        foreach($data as $rows){
            $returnData[ucfirst($rows['group'])][$rows->getOriginal('item')] = ucfirst($rows['item']);
        }

        return $returnData;
    }

    public function getItemAttribute($value){
        return __('iconsList.'.$value);
    }

    public function getGroupAttribute($value) {
        return __('iconsList.'.$value);
    }
}
