<?php

namespace App\Containers\AppSection\Epresence\Models;

use Apiato\Core\Abstracts\Models\Model;
use App\Containers\AppSection\User\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Epresence extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'id_users',
        'type',
        'is_approved',
        'waktu',
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Epresence';

    /**
     * Get the user that owns the phone.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'id_users');
    }

}
