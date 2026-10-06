<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectBrief extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'business_name',
        'brief_description',
        'reference_links',
        'assets_drive_link',
        'status',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
