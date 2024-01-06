<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPassword extends Model
{
    use HasFactory;

    const RESET_LINK_SENT = 'RESET_LINK_SENT'; // You can assign any value you want

    protected $table = 'user_passwords'; // Use a more descriptive table name
    protected $fillable = [
        'user_id', // Assuming user_id is the foreign key to the users table
        'password', // Not sure if this should be stored here
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
