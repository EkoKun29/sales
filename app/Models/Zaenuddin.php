<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zaenuddin extends Model
{
    use HasFactory;
    protected $table = 'zaenuddins';
    protected $fillable = [
        'tanggal_penawaran', // Add this line to allow mass assignment for this column
        'sales',
        'customer',
        'produk',
        'tanggal_do',
        'qty',
        'msk',
        'checklist_do',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
