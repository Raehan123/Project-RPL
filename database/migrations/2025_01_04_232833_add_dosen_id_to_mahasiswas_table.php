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
    Schema::table('mahasiswas', function (Blueprint $table) {
        $table->unsignedBigInteger('dosen_id')->nullable()->after('id');
        $table->foreign('dosen_id')->references('id')->on('dosens')->onDelete('set null');
    });
}

public function down()
{
    Schema::table('mahasiswas', function (Blueprint $table) {
        $table->dropForeign(['dosen_id']);
        $table->dropColumn('dosen_id');
    });
}

};
