<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Category extends Model implements TranslatableContract
{
    use HasFactory ,translatable;

    public $translatedAttributes = ['title', 'content'];
    protected $fillable = ['id', 'image', 'parent', 'deleted_at', 'created_at', 'updated_at'];


}
