<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterStudentAddGaurdianCnic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('Student', function(Blueprint $table) {
            $table->string('guardianCNIC',15)->after('localGuardianCell');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('Student', function($table) {
            $table->dropColumn('guardianCNIC');
        });
    }
}



