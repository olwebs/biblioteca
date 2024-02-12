<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'state',
        'birthdate',
        'gender',
    ];
    
    public function libro():BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'authors_books','book_id','author_id');
    }
}
