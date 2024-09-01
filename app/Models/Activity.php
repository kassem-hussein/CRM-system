<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Activity extends Model
{
    use HasFactory;
    protected $table = "activities";
    protected $fillable = [
        "opportunity_id",
        "type",
        "date",
        "description"
    ];

    public function opportunity():BelongsTo{
        return $this->belongsTo(Opportunity::class,'opportunity_id','id');
    }
}
