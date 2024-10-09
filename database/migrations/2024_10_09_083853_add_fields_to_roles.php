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
        Schema::table('roles', function (Blueprint $table) {
//            $table->unsignedBigInteger('created_by')->nullable()->after('name');
//            $table->foreign('created_by')->references('id')->on('users');
            $table->foreignId('created_by')->nullable()->after('name');
            $table->string('description')->nullable();
            $table->string('access')->after('description');
            $table->string('visible')->after('access');
        });
    }

};
