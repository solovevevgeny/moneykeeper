<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpertaionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->enum("type",['add','sup','move'])->default('sup')->fillable();
            $table->unsignedBigInteger("account_from_id")->nullable();
            $table->unsignedBigInteger("account_to_id")->nullable();
            $table->double("amount")->fillable();
            $table->string("comment")->nullable();
            $table->timestamps();

            $table->foreign('account_from_id')->references('id')->on('accounts');
            $table->foreign('account_to_id')->references('id')->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operations');
    }
}
