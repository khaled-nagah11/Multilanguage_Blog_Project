<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model implements TranslatableContract
{
    use HasFactory ,Translatable,SoftDeletes ;
    public $translatedAttributes = ['title', 'content', 'smallDesc', 'tags'];
    protected $fillable = ['id', 'image', 'category_id', 'deleted_at', 'created_at', 'updated_at' , 'user_id'];

    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
}
