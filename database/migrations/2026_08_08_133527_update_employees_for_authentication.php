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
        Schema::table('employees', function (Blueprint $table) {
            $table->string('phone')->after('email');
            $table->string('password')->after('phone');
            $table->rememberToken()->after('password');
            $table->dropColumn(['department', 'salary']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->string('department')->after('email');
            $table->integer('salary')->after('department');
            $table->dropColumn(['phone', 'password', 'remember_token']);
        });
    }
};

