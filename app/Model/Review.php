<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    // Specifică tabelul asociat
    protected $table = 'reviews';

    // Atributele care pot fi umplute
    protected $fillable = [
        'product_id', 'user_id', 'rating', 'comentariu', 'data'
    ];

    // Relația cu produsul
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relația cu utilizatorul
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
