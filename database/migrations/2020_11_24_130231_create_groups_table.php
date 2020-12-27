<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("description")->nullable();
            $table->boolean('is_class')->default(false);
            $table->integer("parent_group")->nullable();
            $table->integer('rank')->comment('0 = Etudiant, 1 = Délégué, 2 = Comité, 3 = Staff, 4 = Administrateur')->default(0);
            $table->string('auto_expire')->comment('Set this if the user should loose this rank after a defined time. example: "1 month". Set to S to expire when the year\'s over ')->default('S');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
