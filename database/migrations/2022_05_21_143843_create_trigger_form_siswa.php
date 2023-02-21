<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTriggerFormSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::unprepared('CREATE TRIGGER triger_form_siwa AFTER INSERT ON users FOR EACH ROW
                BEGIN
                    DECLARE id_siswa,maxx INT;
                    SET id_siswa = NEW.id;
                    SET maxx = (SELECT COUNT(id) FROM users WHERE role = 1);

                    if(NEW.role = 1) then
                        SET @nomor_registrasi = CONCAT("PPDB",YEAR(NOW()),id_siswa,LPAD(maxx,3,"0"));
                        INSERT INTO siswas (`users_id`,`no_pendaftaran`,`nisn`,`created_at`) VALUES (NEW.id,@nomor_registrasi,NEW.username,now());
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
        Schema::dropIfExists('triger_form_siwa');
    }
}
