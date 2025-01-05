<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('bimbingans', function (Blueprint $table) {
        $table->enum('status', ['pending', 'setuju', 'tolak'])->default('pending')->after('topik');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bimbingans', function (Blueprint $table) {
            //
        });
    }
};
