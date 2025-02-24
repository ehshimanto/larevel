<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;
    protected $primarykey='income_id';

    public function editInfo(){
        return $this->belongsTo('App\Models\User','income_creator','id');
    }
    public function creatorInfo(){
        return $this->belongsTo('App\Models\User','income_creator','id');
    }

    // public function categoryInfo(){
    //     return $this->belongsTo('App\Models\IncomeCategory','income_category','incate_id');
    // }
    public function categoryInfo() {
        return $this->belongsTo(Category::class, 'category_id', 'id'); // বা আপনার রিলেশন অনুসারে
    }
    
}
