<?php namespace Bzdbbb\Event\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateEventsTable extends Migration
{

    public function up()
    {
        Schema::create('bzdbbb_event_categories', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('bzdbbb_event_events', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('bzdbbb_event_categories');

            $table->string('summary');
            $table->string('url');
            $table->string('location');
            $table->text('description');
            $table->dateTime('startDate');
            $table->dateTime('endDate');
            $table->string('duration');
            $table->double('latitude');
            $table->double('longitude');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('bzdbbb_event_events');
        Schema::drop('bzdbbb_event_categories');
    }

}