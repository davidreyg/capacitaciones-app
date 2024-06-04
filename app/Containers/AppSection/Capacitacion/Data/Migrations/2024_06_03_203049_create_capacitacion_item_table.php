<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('capacitacion_item', function (Blueprint $table) {
            $table->foreignId('capacitacion_id')->constrained()->cascadeOnDelete();
            $table->foreignId('item_id')->constrained();
            $table->foreignId('respuesta_id')->constrained();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('capacitacion_item');
    }
};
