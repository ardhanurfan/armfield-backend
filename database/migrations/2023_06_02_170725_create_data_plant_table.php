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
        Schema::create('data_plant', function (Blueprint $table) {
            $table->id();
            $table->double('tank_a')->nullable();
            $table->double('feed_flow_f1')->nullable();
            $table->double('holding_t1')->nullable();
            $table->double('heater_t2')->nullable();
            $table->double('heated_feed_t4')->nullable();
            $table->double('power_heater')->nullable();
            $table->double('pump_n1')->nullable();
            $table->double('pump_n2')->nullable();
            $table->double('set_point_t1')->nullable();
            $table->double('set_point_t2')->nullable();
            $table->double('valve_tank_a')->nullable();
            $table->double('timestamp')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_plant');
    }
};
