<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notifikasi extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'owner_id', 'kamar_id', 'pesan_user', 'pesan_owner', 'status', 'status_owner'];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function kamar(): BelongsTo
    {
        return $this->belongsTo(Kamar::class, 'kamar_id');
    }
}
