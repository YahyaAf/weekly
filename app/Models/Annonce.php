<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Annonce;
use App\Models\Category;

class Annonce extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'annonces'; 

    protected $fillable = [
        'titre',
        'description',
        'prix',
        'image',
        'user_id',
        'categorie_id',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categorie_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
