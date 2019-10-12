<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('first_name', 30)->index();
            $table->string('last_name', 30)->index();
            $table->unsignedBigInteger('company_id');

            // The maximum length of a valid email address is 254 characters.
            // See https://www.rfc-editor.org/errata_search.php?rfc=3696&eid=1690
            // for further discussion.
            $table->string('email', 254)->nullable();

            // Excluding the international call prefix (which we denote with a
            // “+”), the maximum length of a valid phone number is fifteen
            // digits. See Section A.3 of E.164 for further discussion:
            // https://www.itu.int/rec/T-REC-E.164/en.
            $table->char('phone', 16)->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
