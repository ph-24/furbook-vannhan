<?php

use Faker\Generator as Faker;

$factory->define(Furbook\Cat::class, function (Faker $faker) {
	return [
		'name'=>$faker->name,
		'date_of_birth'=>$faker->date(),
		'breed_id'=>1,
		'user_id'=>1,
		'created_at'=>$faker->dateTime(),
		'updated_at'=>$faker->dateTime()
	];
});
