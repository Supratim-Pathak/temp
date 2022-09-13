<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisition_items', function (Blueprint $table) {
            $table->id();
            $table->string('req_id');
            $table->string('item');
            $table->string('specification');
            $table->string('qty');
            $table->string('uom');
            $table->date('delivered_within');
            $table->string('remarks');
            $table->timestamps();
         
            // $table->foreign('req_id')->references('requisition_id')->on('requisition_details')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requisition_items');
    }
}
