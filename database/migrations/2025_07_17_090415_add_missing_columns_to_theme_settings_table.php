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
    Schema::table('theme_settings', function (Blueprint $table) {
        if (!Schema::hasColumn('theme_settings', 'key')) {
            $table->string('key')->unique()->after('id');
        }
        if (!Schema::hasColumn('theme_settings', 'value')) {
            $table->string('value')->after('key');
        }
        if (!Schema::hasColumn('theme_settings', 'type')) {
            $table->string('type')->default('color')->after('value');
        }
        if (!Schema::hasColumn('theme_settings', 'category')) {
            $table->string('category')->default('general')->after('type');
        }
        if (!Schema::hasColumn('theme_settings', 'label')) {
            $table->string('label')->after('category');
        }
        if (!Schema::hasColumn('theme_settings', 'description')) {
            $table->text('description')->nullable()->after('label');
        }
    });
}

public function down()
{
    Schema::table('theme_settings', function (Blueprint $table) {
        if (Schema::hasColumn('theme_settings', 'key')) {
            $table->dropColumn('key');
        }
        if (Schema::hasColumn('theme_settings', 'value')) {
            $table->dropColumn('value');
        }
        if (Schema::hasColumn('theme_settings', 'type')) {
            $table->dropColumn('type');
        }
        if (Schema::hasColumn('theme_settings', 'category')) {
            $table->dropColumn('category');
        }
        if (Schema::hasColumn('theme_settings', 'label')) {
            $table->dropColumn('label');
        }
        if (Schema::hasColumn('theme_settings', 'description')) {
            $table->dropColumn('description');
        }
    });
}

};
