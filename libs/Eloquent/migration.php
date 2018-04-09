<?php
require '../../vendor/autoload.php';

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

require_once "config.php";

Capsule::schema()->dropIfExists('books');
Capsule::schema()->dropIfExists('category');
Capsule::schema()->create('category', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name'); //varchar 255
});
Capsule::schema()->create('books', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name'); //varchar 255
    $table->string('description'); //varchar 255
    $table->integer('category_id')->unsigned();
    // $table->timestamps(); //created_at&updated_at тип datetime
});
Capsule::schema()->table('books', function (Blueprint $table) {
    $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade')->onUpdate('cascade');
});

for ($i = 0; $i < 5; $i++) {
    $category = new \App\Category();
    $category->name = 'category-' . $i;
    $category->save();
}
for ($i = 0; $i < 20; $i++) {
    $faker = Faker\Factory::create();
    $book = new \App\Book();
    $book->name = $faker->name;
    $book->description = $faker->text;
    $book->category_id = $faker->numberBetween(1, 5);
    $book->save();
}



