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
        Schema::table('contacts', function (Blueprint $table) {
            // Thêm các cột first_name và last_name
            $table->string('first_name')->after('id');
            $table->string('last_name')->after('first_name');

            // Xóa cột name cũ
            $table->dropColumn('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            // Khôi phục lại cột name
            $table->string('name')->after('id');

            // Xóa các cột first_name và last_name
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
        });
    }
};