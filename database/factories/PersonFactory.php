<?php

use Faker\Generator as Faker;
use GuzzleHttp\Client;

$autoIncrement = autoIncrement();
$posts = getPosts();

$factory->define(
    \App\Person::class,
    function (Faker $faker) use ($autoIncrement) {
        $autoIncrement->next();
        $id = $autoIncrement->current();

        return [
            'id' => $id,
            'first_name' => $faker->firstName(),
            'last_name' => $faker->lastName(),
            'email' => $faker->unique()->email,
            'address' => $faker->address,
            'job_title' => $faker->jobTitle,
        ];
    }
);

$factory->afterMaking(
    \App\Person::class,
    function ($person) use ($posts) {
        $person->posts = $posts->filter(function ($post) use ($person) {
            return $post->userId == $person->id;
        })->values();
    }
);

function autoIncrement()
{
    for ($i = 0; $i < 1000; $i++) {
        yield $i;
    }
}

function getPosts()
{
    $client = new Client([
        'base_uri' => 'https://jsonplaceholder.typicode.com',
    ]);

    $response = $client->request('GET', 'posts');

    return collect(json_decode($response->getBody()
        ->getContents()));
}
