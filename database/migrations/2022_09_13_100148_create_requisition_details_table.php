<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisition_details', function (Blueprint $table) {
            $table->id();
            $table->string('requisition_id');
            $table->enum('type',['RFI','RFP','RFQ']);
            $table->string('requisition_no');
            $table->date('date');
            $table->string('title');
            $table->longText('subject');
            $table->longText('description');
            $table->enum('requisition_for',['C','F']);
            $table->enum('solicitation_type',['M','P','S']);
            $table->string('initiated_by');
            $table->string('requesting_department');
            $table->string('requester');
            $table->string('project_for');
            $table->enum('bid_type',['M','P','S']);
            $table->string('suporting_document');
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
        Schema::dropIfExists('requisition_details');
    }
}
