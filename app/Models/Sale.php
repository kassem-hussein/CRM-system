<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    use HasFactory;
    protected $table = "sales";
    protected $fillable = [
        "opportunity_id",
        "product_id",
        "amount",
        "quantity"
    ];
    public function opportunity():BelongsTo{
        return $this->belongsTo(Opportunity::class,'opportunity_id','id');
    }
    public function proudct():BelongsTo{
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
