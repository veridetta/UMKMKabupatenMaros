<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTriggerFromSekolah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER triger_form_sekolah AFTER INSERT ON users FOR EACH ROW
                BEGIN
                    DECLARE id_sekolah INT;
                    DECLARE nama_sekolah VARCHAR(255);
                    DECLARE jenjang_sekolah VARCHAR(255);
                    SET id_sekolah = NEW.id;
                    SET nama_sekolah = NEW.username;
                    SET jenjang_sekolah = "MA/SMA/SMK";
    
                    if(NEW.role = 2) then
                        INSERT INTO sekolahs (`users_id`,`nama_sekolah`,`jenjang_sekolah`) VALUES (NEW.id,NEW.username,jenjang_sekolah);
                    end if;
                END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trigger_from_sekolah');
    }
}
