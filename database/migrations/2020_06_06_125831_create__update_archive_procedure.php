<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUpdateArchiveProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         DB::unprepared("CREATE PROCEDURE UpdateArchive
            (IN
            var_id int,
            IN
            var_title varchar(255),
            IN
            var_content varchar(255),
            IN
            var_image varchar(50))   
       BEGIN
       UPDATE archive SET title=var_title, content = var_content, image=var_image WHERE id=var_id;
       END;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       DB::unprepared('DROP PROCEDURE IF EXISTS UpdateArchive');
    }
}
