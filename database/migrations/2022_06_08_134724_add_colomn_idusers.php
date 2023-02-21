<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColomnIdusers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sekolahs', function (Blueprint $table) {

            $table->unsignedBigInteger('users_id')->nullable()->after('id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('sekolahs', function (Blueprint $table) {

            $table->dropForeign(['users_id']);

        });
    }
}
