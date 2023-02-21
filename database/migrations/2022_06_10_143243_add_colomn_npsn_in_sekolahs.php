<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColomnNpsnInSekolahs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sekolahs', function (Blueprint $table) {
            $table->string('npsn')->nullable()->after('nsm');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sekolahs', function (Blueprint $table) {
            $table->dropColumn('npsn');
        });
    }
}
