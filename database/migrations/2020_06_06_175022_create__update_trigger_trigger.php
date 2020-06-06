<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUpdateTriggerTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER UpdateTriggerTrigger AFTER UPDATE ON archive FOR EACH ROW
            BEGIN
            INSERT INTO archive_updated(title, content, status) VALUES(NEW.title, NEW.content, "UPDATED");
            END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS UpdateTriggerTrigger');
    }
}
