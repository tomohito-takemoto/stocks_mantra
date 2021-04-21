<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->unique(['email', 'deleted_at'], 'users_email_deleted_at_unique');
            $table->unique(['name', 'deleted_at'], 'users_name_deleted_at_unique');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropUnique('users_email_deleted_at_unique');
            $table->dropUnique('users_name_deleted_at_unique');
          });
    }
}
