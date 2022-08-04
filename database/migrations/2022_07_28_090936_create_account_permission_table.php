<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_permission', function (Blueprint $table) {
            $table->foreignId('account_id')->constrained()->nullable();
            $table->foreignId('permission_id')->constrained()->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->primary(['account_id', 'permission_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_permission');
        // Schema::dropForeign('account_permission_account_id_foreign');
        // Schema::dropColumn('account_id');
        // Schema::dropForeign('account_permission_permission_id_foreign');
        // Schema::dropColumn('permission_id');
    }
}
