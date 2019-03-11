<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

/**
 * Class QuoteController
 * @package App\Http\Controllers
 * @group Quote
 */
class QuoteController extends Controller
{
    /**
     * Retrieves random quote from https://api.kanye.rest/
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $client = new Client([
            'base_uri' => 'https://api.kanye.rest/',
        ]);

        $response = $client->request('GET', '/');

        return response()->json(['quote' => json_decode($response->getBody()
            ->getContents())->quote]);
    }
}
