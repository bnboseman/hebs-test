<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;

/**
 * Class PersonController
 * @package App\Http\Controllers
 * @group Person
 */
class PersonController extends Controller
{
    /**
     * Display a listing people randomly generated using faker.
     *
     * @return \Illuminate\Http\Response
     * @queryParam limit Limit of people to return. Maximun is 100, default is set to 10. Example: 2
     *
     */
    public function index(PersonRequest $request)
    {
        $limit = (int)$request->get('limit', 10);
        $people = factory(\App\Person::class, $limit)->make();

        return response()->json($people);
    }

    /**
     * Display a specific person randomly generated using faker.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $person = factory(\App\Person::class)->make(['id' => $id]);

        return response()->json($person);
    }
}
