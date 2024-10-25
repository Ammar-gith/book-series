<?php

namespace Modules\Book\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Book\Database\factories\AuthorFactory;

class Author extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    // protected static function newFactory(): AuthorFactory
    // {
    //     //return AuthorFactory::new();
    // }
}