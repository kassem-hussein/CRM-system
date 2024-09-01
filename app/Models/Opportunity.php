<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Opportunity extends Model
{
    use HasFactory;
    protected $table  = "opportunities";
    protected $fillable = [
        "name",
        "lead_id",
        "stage",
        "close_date",
        "excpected_revenue",
        "product_id",
        "quantity"
    ];

    public function lead():BelongsTo{
        return $this->belongsTo(Lead::class,'lead_id','id');
    }
    public function product():BelongsTo{
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
