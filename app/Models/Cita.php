<?php

namespace App\Models;

use Dotenv\Repository\Adapter\GuardedWriter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Filament\Panel;
class Cita extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'hora' => 'date:hh:mm'
    ];

    public function fisio(): BelongsTo
    {
        return $this->belongsTo(Fisio::class);
    }

    public function paciente(): BelongsTo
    {
        return $this->belongsTo(Paciente::class);
    }
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->hasVerifiedEmail();
    }
}
