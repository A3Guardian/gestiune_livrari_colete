<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('cities', function (Blueprint $table) {
        $table->id();
        $table->string('name');      // Numele orașului (ex: București)
        $table->string('county', 2); // Codul județului (ex: B, IS, CJ)
        
        // Folosim 'decimal' pentru coordonate pentru precizie maximă
        // 10 cifre în total, dintre care 8 după virgulă
        $table->decimal('lat', 10, 5); 
        $table->decimal('lon', 11, 5); 
        
        $table->timestamps(); // Adaugă coloanele created_at și updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
