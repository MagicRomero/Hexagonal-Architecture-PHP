<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (!Schema::hasTable('roles')) {
            Schema::create('roles', function (Blueprint $table) {
                $table->increments('id');
                $table->char('name', 20)->unique();
                $table->text('abilities');
                $table->string('description')->nullable();
                $table->string('hash')->unique();
            });
        }

        if (!Schema::hasTable('clients')) {
            Schema::create('clients', function (Blueprint $table) {
                $table->string('name');
                $table->string('alias')->index();
                $table->primary('alias');

                $table->string('token')->nullable();
                $table->string('email')->unique();
                $table->text('description')->nullable();
                $table->boolean('active')->default(0);

                $table->timestamps();
            });
        }


        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('client_reference')->nullable();
            $table->foreign('client_reference', 'user_cl_fk')->references('alias')->on('clients');

            $table->char('role_name', 20)->default('normal')->index();

            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->unique();

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();

            $table->string('password');

            $table->enum('status', ['ACTIVE', 'PENDING',  'BLOCKED'])->index();
            $table->enum('lang', ['es', 'en', 'de', 'pt', 'pl', 'fr', 'it', 'nl'])->default('es');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('users');
        Schema::dropIfExists('clients');
        Schema::dropIfExists('roles');

        Schema::enableForeignKeyConstraints();
    }
}
