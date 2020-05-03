<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Clients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->bigInteger('agent_id')->nullable();
            $table->bigInteger('policy_no')->nullable()->unique();
            $table->string('name', 150)->nullable();
            $table->bigInteger('sum_assured')->nullable();
            $table->string('plan_term', 10)->nullable();
            $table->string('mode', 10)->nullable();
            $table->integer('premium')->nullable();
            $table->string('address', 200)->nullable();
            $table->string('risk_date', 20)->nullable();
            $table->string('due_date', 50)->nullable();
            $table->bigInteger('phone_no')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
