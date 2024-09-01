<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lead extends Model
{
    use HasFactory;
    protected $table = "leads";
    protected $fillable= [
        "customer_id",
        "lead_source",
        "lead_status"
    ];

    public function customer():BelongsTo{
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
}
