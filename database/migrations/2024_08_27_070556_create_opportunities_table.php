<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('opportunities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lead_id')->constrained('leads','id')->cascadeOnDelete();
            $table->string('name');
            $table->enum('stage',['new','open','contact','qualified','won','lost'])->default('new');
            $table->date('close_date')->nullable();
            $table->decimal('excpected_revenue',8,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opportunities');
    }
};
