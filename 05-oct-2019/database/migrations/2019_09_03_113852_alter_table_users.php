<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function(Blueprint $table) {
            $table->string("fname")->nullable();
            $table->string("lname")->nullable();
            $table->text('user_type')->nullable();
            $table->text("description")->nullable();
            $table->string("address")->nullable();
            $table->string("city")->nullable();
            $table->string("state")->nullable();
            $table->string("country")->nullable();
            $table->string("postal_code")->nullable();
            $table->string("phone")->nullable();
            $table->enum('gender',['male', 'female'])->nullable();
            $table->enum('status',['new', 'active', 'disabled'])->default('active');
            $table->string("company")->nullable();
        });
    }

    /**
     * run php artisan migrate
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn("fname");
            $table->dropColumn("lname");
            $table->dropColumn("role");
            $table->dropColumn('description');
            $table->dropColumn('address');
            $table->dropColumn("city");
            $table->dropColumn("state");
            $table->dropColumn("country");
            $table->dropColumn("postal_code");
            $table->dropColumn('phone');
            $table->dropColumn('gender');
            $table->dropColumn('status');
            $table->dropColumn("company");
        });

    }
}
