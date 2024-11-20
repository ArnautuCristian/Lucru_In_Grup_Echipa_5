<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // Specifică tabelul asociat
    protected $table = 'users';

    // Atributele care pot fi umplute (pentru protecția împotriva "Mass Assignment")
    protected $fillable = [
        'nume', 'prenume', 'email', 'parola'
    ];

    // Definirea relațiilor, de exemplu, un utilizator poate avea multe comenzi
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
