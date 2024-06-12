<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



class IndexController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get('https://suitmedia-backend.suitdev.com/api/ideas?page[number]=1&append[]=small_image&append[]=medium_image');

        $data = $response->json();

        $ideas = collect($data['data'])->map(function ($idea) {
            preg_match('/<img src="([^"]+)"/', $idea['content'], $matches);
    
            if(isset($matches[1])) {
                $imgUrl = $matches[1];
            } else {
                $imgUrl = null;
            }

            if(is_null($imgUrl)) {
                $imgUrl = asset('nodata.jpg');
            }
    
            return [
                'title' => $idea['title'],
                'published_at' => $idea['published_at'],
                'imgurl' => $imgUrl,
            ];
        });

        return view('index', compact('ideas'));
    }
}
