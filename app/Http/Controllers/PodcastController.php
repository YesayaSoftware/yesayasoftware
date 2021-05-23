<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Inertia\Response;

class PodcastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $podcast_info = $this->fetchPodcastInfo();

        $episodes = $this->fetchFeed()['collection'];

        return Inertia::render('Podcast/Index', [
            'episodes' => $episodes,
            'podcast_info' => $podcast_info
        ]);
    }

    public function fetchFeed()
    {
        return Cache::remember('episodes', 60 * 24 * 3, function () {
            $response = Http::withToken(config('services.simplecast.key'))
                ->get(config('services.simplecast.url') . '/episodes');

            return json_decode($response, true);
        });
    }

    public function fetchPodcastInfo()
    {
        return Cache::rememberForever('podcast-info', function () {
             $response = Http::withToken(config('services.simplecast.key'))
                ->get(config('services.simplecast.url'));

            return json_decode($response, true);
        });
    }
}
