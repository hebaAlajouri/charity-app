<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('sponsorships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sponsor_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('orphan_id')->constrained('orphans')->onDelete('cascade');
            $table->string('sponsorship_type')->nullable();
            $table->date('start_date')->nullable();
            $table->string('sponsored_for')->nullable();
            $table->integer('number_of_orphans')->default(1);
            $table->enum('status', ['active', 'ended'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('sponsorships');
    }
};
