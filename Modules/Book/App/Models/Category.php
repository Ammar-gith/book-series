<?php

namespace Modules\Book\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Book\Database\Factories\CategoryFactory;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    // protected $fillable = ['name', 'description'];

    // public function books()
    // {
    //     return $this->hasMany(Book::class);
    // }

    // protected static function newFactory(): CategoryFactory
    // {
    //     return CategoryFactory::new();
    // }
}