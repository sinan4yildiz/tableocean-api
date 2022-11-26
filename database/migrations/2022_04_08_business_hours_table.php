<?php

use App\Enum\DaysEnum;
use App\Models\BusinessShift;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    static string $table = 'business_hours';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(static::$table, function (Blueprint $table) {
            $table->id();
            $table->enum('day', collect(DaysEnum::cases())->pluck('value')->toArray());
            $table->foreignIdFor(BusinessShift::class);
            $table->char('from', 5);
            $table->char('to', 5);
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
