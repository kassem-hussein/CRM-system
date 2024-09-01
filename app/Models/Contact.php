<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use HasFactory;
    protected $table = "contacts";
    protected $fillable = [
        "name",
        "customer_id",
        "phone",
        "email",
        "job_title"
    ];
    public function customer():BelongsTo{
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
}
