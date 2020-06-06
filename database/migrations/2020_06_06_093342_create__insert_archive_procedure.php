<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateInsertArchiveProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::unprepared("CREATE PROCEDURE InsertArchive
            (IN
            var_title varchar(255),
            IN
            var_content varchar(255),
            IN
            var_image varchar(50))   
       BEGIN
       INSERT INTO archive(title, content, image)
       VALUES(var_title, var_content, var_image);
       END;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS InsertArchive');
    }
}
