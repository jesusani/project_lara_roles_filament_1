<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fisio extends Model
{
    use HasFactory;
    protected $guarded = [];
     public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function citas(): HasMany
    {
        return $this->hasMany(Cita::class);
    }
    public function telefonos(): HasMany
    {
        return $this->hasMany(Telefono::class);
    }
}
