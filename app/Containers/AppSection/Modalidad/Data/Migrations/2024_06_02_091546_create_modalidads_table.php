<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('modalidads', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50)->unique();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('modalidads');
    }
};
