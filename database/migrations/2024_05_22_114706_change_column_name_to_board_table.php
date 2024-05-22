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
        Schema::table('board', function (Blueprint $table) {
            $table->dropColumn('content, 255');
            $table->string('message', 255);
            $table->tinyInteger('delete_flag')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('board', function (Blueprint $table) {
            $table->string('content, 255');
            $table->dropColumn('message', 255);
            $table->dropColumn('delete_flag');
        });
    }
};
