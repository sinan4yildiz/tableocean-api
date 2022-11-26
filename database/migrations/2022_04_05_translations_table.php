<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    static string $table = 'translations';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(static::$table, function (Blueprint $table) {
            $table->id();
            $table->string('translatable_type');
            $table->unsignedInteger('translatable_id')->index();
            $table->char('language', 2)->index();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->longText('content')->nullable();
            $table->json('extra')->nullable();
            $table->timestamps();
            $table->unique(['translatable_type', 'translatable_id', 'language']);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(static::$table);
    }
};
