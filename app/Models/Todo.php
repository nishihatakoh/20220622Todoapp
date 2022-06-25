<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;


class Todo extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public static $rules = array(
        'category_id' =>'required',
        'content' => 'required'
    );

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
