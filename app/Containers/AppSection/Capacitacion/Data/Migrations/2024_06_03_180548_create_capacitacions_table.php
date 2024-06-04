<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('capacitacions', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 20);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('nombre', 225);
            $table->text('perfil')->nullable();
            $table->text('objetivo_aprendizaje');
            $table->text('objetivo_desempeño');
            $table->tinyInteger('creditos');
            $table->smallInteger('numero_horas');
            $table->text('problema');
            // RELACIONES
            $table->foreignId('tipo_capacitacion_id')->constrained();
            $table->foreignId('eje_tematico_id')->constrained();
            $table->foreignId('modalidad_id')->constrained();
            $table->foreignId('oportunidad_id')->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('capacitacions');
    }
};
