<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;

    /**
     * Methode for specifie that An Events belongs to a Association
     */
    public function association()
    {
        return $this->belongsTo(Association::class);
    }
}
