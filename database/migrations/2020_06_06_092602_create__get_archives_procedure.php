<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateGetArchivesProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('_get_archive_procedure', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });

        DB::unprepared('CREATE PROCEDURE GetArchives()
            BEGIN
            SELECT* FROM archive;
            END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('_get_archive_procedure');

        DB::unprepared('DROP PROCEDURE IF EXISTS GetArchives');
    }
}
