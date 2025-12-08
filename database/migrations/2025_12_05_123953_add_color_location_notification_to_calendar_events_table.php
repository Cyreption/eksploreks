<?php

// Author: Hafizhan Yusra Sulistyo (5026231060) & // Author: Aulia Salma Anjani (5026231063)

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
        Schema::table('calendar_events', function (Blueprint $table) {
            $table->string('color')->nullable()->default('Purple')->after('all_day');
            $table->string('location')->nullable()->after('color');
            $table->boolean('notification')->nullable()->default(false)->after('location');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('calendar_events', function (Blueprint $table) {
            $table->dropColumn(['color', 'location', 'notification']);
        });
    }
};
