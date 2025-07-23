<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  // inside the new migration file
public function up(): void {
    Schema::table('projects', function (Blueprint $table) {
        $table->dropColumn('name');
    });
}

public function down(): void {
    Schema::table('projects', function (Blueprint $table) {
        $table->string('name')->nullable();
    });
}

};
