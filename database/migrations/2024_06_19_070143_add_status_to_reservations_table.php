<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // In database/migrations/xxxx_xx_xx_add_status_to_reservations_table.php
public function up()
{
    Schema::table('reservations', function (Blueprint $table) {
        $table->string('status')->default('pending'); // Status can be 'pending', 'accepted', 'rejected'
    });
}

public function down()
{
    Schema::table('reservations', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}

};
