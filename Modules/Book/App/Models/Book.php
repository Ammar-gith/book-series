<?php

namespace Modules\Book\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Book\Database\factories\BookFactory;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;


class Book extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public const Active = 1;
    public const Purchase = 2;
    public const Sell = 3;
    public const Buy = 4;
    public const Inactive = 5;

    public const STATUSES = [
        1 => 'Available',
        2 => 'Purchase',
        3 => 'Sell',
        4 => 'Buy',
        5 => 'Unavailable'
    ];

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'books';

    protected $fillable = [
        'title',
        'description',
        'publisher',
        'language',
        'orderNo',
        'status',
        'price',
        'online_amount',
        'ship_amount',
        'author_id',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }
}