<?php

use App\Enum\PriceRangesEnum;
use App\Models\Cuisine;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    static string $table = 'restaurants';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(static::$table, function (Blueprint $table) {
            $table->id();
            $table->char('name', 90);
            $table->char('legal_name', 130)->nullable();
            $table->string('email')->unique();
            $table->char('website', 60)->nullable();
            $table->char('dial_number', 5);
            $table->char('phone_number', 25);
            $table->string('vat_number')->nullable();
            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('postcode')->nullable();
            $table->string('city')->nullable();
            $table->char('country_code', 2)->nullable();
            $table->string('language_culture')->nullable();
            $table->enum('price_range', collect(PriceRangesEnum::cases())->pluck('value')->toArray())->nullable();
            $table->string('time_zone')->nullable();
            $table->string('time_format')->nullable();
            $table->string('date_format')->nullable();
            $table->string('currency')->nullable();
            $table->foreignIdFor(Cuisine::class);
            $table->json('social_media')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
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
