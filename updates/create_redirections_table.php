<?php namespace EngagementAgency\Redirectionist\Updates;

use Illuminate\Database\Schema\Blueprint;
use Schema;
use October\Rain\Database\Updates\Migration;

class CreatePageStatsTable extends Migration
{
    public function up()
    {
        Schema::create('engagement_redirectionist_redirections', function (BluePrint $table) {
            $table->engine = 'InnoDb';
            $table->increments('id');
            $table->timestamps();
            $table->string('from_route');
            $table->string('to_route');
            $table->unique('from_route');
        });
    }

    public function down()
    {
        Schema::dropIfExists('engagement_redirectionist_redirections');
    }
}
