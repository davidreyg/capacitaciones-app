<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('capacitacion_costo', function (Blueprint $table) {
            $table->foreignId('capacitacion_id')->constrained()->cascadeOnDelete();
            $table->foreignId('costo_id')->constrained();
            $table->integer('valor')->unsigned();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('capacitacion_costo');
    }
};
