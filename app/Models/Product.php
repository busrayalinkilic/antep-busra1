<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['pName', 'price', 'photo',  'description', 'status', 'created_by','category_id'];

    //ilişkili olduğu alanlar
    public function user()
    {
        return $this->hasMany('App\Models\User', 'id', 'created_by');
    }
    public function get_category()
    {
        return $this->hasOne('App\Models\Categories','id','category_id');
    }
}

