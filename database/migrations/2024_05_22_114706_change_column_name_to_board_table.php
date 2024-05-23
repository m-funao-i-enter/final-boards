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
            $table->dropColumn('message', 255);
            $table->dropColumn('delete_flag');
            
            // 外部キー制約
            $table->foreign('user_number')->references('id')->on('users');
            
        });
    }
};
