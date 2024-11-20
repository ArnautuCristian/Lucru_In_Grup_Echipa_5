<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'nume', 'descriere', 'pret', 'stoc', 'categorie_id', 'culoare', 'marime', 'colectie'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categorie_id');
    }
}
