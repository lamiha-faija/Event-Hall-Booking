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
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();

        $table->foreignId('user_id')->constrained('users');
        $table->foreignId('hall_id')->constrained('halls');

        $table->date('event_date');
        $table->string('booking_type');
        $table->time('start_time')->nullable();
        $table->time('end_time')->nullable();

        $table->string('event_type');
        $table->integer('guests');
        $table->string('status')->default('pending');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
