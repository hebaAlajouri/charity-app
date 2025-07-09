<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('orphans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('guardian_phone')->nullable();
            $table->text('address')->nullable();
            $table->integer('age')->nullable();
            $table->enum('status', ['available', 'sponsored'])->default('available');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('orphans');
    }
};
