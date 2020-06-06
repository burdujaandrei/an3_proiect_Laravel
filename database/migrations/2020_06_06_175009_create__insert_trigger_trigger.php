<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateInsertTriggerTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("CREATE TRIGGER InsertTriggerTrigger AFTER INSERT ON `archive` FOR EACH ROW
            BEGIN
            INSERT INTO `archive_updated` (`title`,`content`,`status`) VALUES (NEW.title,NEW.content,'INSERTED');
            END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS InsertTriggerTrigger');
    }
}
