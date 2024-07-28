<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('authorName');
            $table->string('author_id');
            $table->string('ticketTitle');
            $table->text('description');
            $table->string('attachment')->nullable();
            $table->enum('severity', ['Low', 'Medium', 'High']);
            $table->enum('status', ['Open', 'Closed']);
            $table->string('closedBy')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
