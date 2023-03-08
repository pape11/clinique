<?php

namespace App\Models;

use App\Models\consultation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class patients extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function consultations(): HasMany
    {
        return $this->hasMany(consultation::class);
    }
}
