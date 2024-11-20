<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Specifică tabelul asociat
    protected $table = 'orders';

    // Atributele care pot fi umplute
    protected $fillable = [
        'user_id', 'status', 'data_comenzii'
    ];

    // Relația cu utilizatorul
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
