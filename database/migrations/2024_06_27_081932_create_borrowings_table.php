<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('copy_id')->constrained()->onDelete('cascade');
            $table->date('borrowed_at');
            $table->date('expected_return_at');
            $table->date('returned_at')->nullable();
            $table->unsignedBigInteger('return_status_id')->nullable();
            $table->foreign('return_status_id')->references('id')->on('statuses')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('borrowings');
    }
};
