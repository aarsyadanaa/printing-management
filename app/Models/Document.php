<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';
    protected $fillable = ['idOrder', 'idUser','file', 'paymentStatus', 'amount']; 

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }
}
