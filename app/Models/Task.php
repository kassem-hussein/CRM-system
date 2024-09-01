<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = "tasks";
    protected $fillable = [
        "name",
        "description",
        "start_date",
        "end_date",
        "status"
    ];

    public function getStartDate(){
        return str_replace('T'," ",$this->start_date);
    }
    public function getEndDate(){
        return str_replace('T'," ",$this->end_date);
    }
}
