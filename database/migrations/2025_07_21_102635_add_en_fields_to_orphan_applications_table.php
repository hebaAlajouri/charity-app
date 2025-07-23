<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEnFieldsToOrphanApplicationsTable extends Migration
{
    public function up()
    {
        Schema::table('orphan_applications', function (Blueprint $table) {
            $table->string('orphan_city_en')->nullable()->after('orphan_city');
            $table->string('housing_type_en')->nullable()->after('housing_type');
            $table->string('education_level_en')->nullable()->after('education_level');
        });
    }

    public function down()
    {
        Schema::table('orphan_applications', function (Blueprint $table) {
            $table->dropColumn([
                'orphan_city_en',
                'housing_type_en',
                'education_level_en',
            ]);
        });
    }
}
