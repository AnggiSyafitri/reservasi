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
        Schema::create('book_information', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('telephone');
            $table->string('guest_amount');
            $table->foreignId('sitting_area')->constrained('sitting_areas');
            $table->timestamp('reservation_date');
            $table->timestamp('reservation_time');
            $table->text('allergy_note')->nullable();
            $table->text('request_note')->nullable();
            $table->enum('status', [
                'unverified',
                'verified',
                'completed',
                'rejected'
            ]);
            $table->enum('type', [
                'order_now',
                'order_later'
            ]);
            $table->string('proof');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_information');
    }
};
