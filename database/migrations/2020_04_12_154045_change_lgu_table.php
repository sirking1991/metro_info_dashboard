<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeLguTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('local_govt_units', function (Blueprint $table) {
            $table->string('logo_url')->after('slug');
            $table->mediumText('about')->nullable()->after('logo_url');
            $table->dropTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('local_govt_units', function (Blueprint $table) {
            $table->dropColumn('logo_url');
            $table->dropColumn('about');
            $table->timestamps();
        });
    }
}
