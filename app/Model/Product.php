<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Specifică tabelul asociat
    protected $table = 'products';

    // Atributele care pot fi umplute (pentru protecția împotriva "Mass Assignment")
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

    // De asemenea, poți adăuga funcționalități pentru calculul prețului, reduceri etc.
}
