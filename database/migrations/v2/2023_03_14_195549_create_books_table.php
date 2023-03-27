<?php

use App\Libs\Database\V2Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends V2Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id')->index();
            $table->string('title', 255)->index();
            $table->year('year')->index();
            $table->timestamps();
/*
            $table->foreign('author_id','fk_author_id')
                ->references('id')
                ->on('authors')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE')
            ;
*/
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
