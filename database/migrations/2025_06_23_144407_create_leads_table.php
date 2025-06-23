<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone', 10);
            $table->string('enquiry_for');
            $table->string('address');
            $table->enum('lead_type', ['Hot', 'Warm', 'Cold']);
            $table->enum('status', ['In Progress', 'Not Interested', 'Converted', 'Done', 'Not Done']);
            $table->date('lead_given_date');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
