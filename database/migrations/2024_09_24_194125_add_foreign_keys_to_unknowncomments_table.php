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
        Schema::table('unknowncomments', function (Blueprint $table) {
            $table->foreign(['unkid'], 'FK_unknowncomments')->references(['unkid'])->on('unknowns')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('unknowncomments', function (Blueprint $table) {
            $table->dropForeign('FK_unknowncomments');
        });
    }
};
