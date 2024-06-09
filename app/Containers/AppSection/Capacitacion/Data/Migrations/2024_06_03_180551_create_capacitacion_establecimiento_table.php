<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('capacitacion_establecimiento', function (Blueprint $table) {
            $table->foreignId('capacitacion_id')->constrained()->cascadeOnDelete();
            $table->foreignId('establecimiento_id')->constrained();
            $table->string('estado', 10);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('capacitacion_establecimiento');
    }
};
