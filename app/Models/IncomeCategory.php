<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeCategory extends Model
{
    use HasFactory;
    protected $primarykey='incate_id';
   // protected $table = 'income_categories';
    public function creatorInfo(){
        return $this->belongsTo('App\Models\User','incate_creator','id');
    }
    public function editInfo(){
        return $this->belongsTo('App\Models\User','incate_creator','id');
    }
}
