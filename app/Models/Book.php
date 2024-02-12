<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'sinopsis',
        'state',
        'observations',
        'photo',
        'editorial_id',
        'subject_id',
    ];

    public function editorial(){
        return $this->hasOne(Editorial::class,'id','editorial_id');
    }
    public function materia(){
        return $this->hasOne(Subject::class,'id','subject_id');
    }
    
    public function autor():BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'authors_books','author_id','book_id');
    }
}

