<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    // Specifică tabelul asociat
    protected $table = 'wishlists';

    // Atributele care pot fi umplute
    protected $fillable = [
        'user_id', 'product_id'
    ];

    // Relația cu utilizatorul
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relația cu produsul
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
