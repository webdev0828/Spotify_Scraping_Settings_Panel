<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use App\Playlist;
use App\Transaction;

class PlaylistController extends Controller
{
    
    public $client;

    public function index() {
        $playlists = Playlist::all();

        $data = [
            'playlists' => $playlists
        ];

        return view('welcome', $data);
    }

    public function add(Request $request) {        
        $title = $request->title;
        $playlist_id = $request->playlist_id;
        

        if($playlist_id == '' || !isset($playlist_id)) 
            return back();
        
        $result = Playlist::create(['title' => $title,'playlist' => $playlist_id]);
        
        $playlists = Playlist::all();
        $data = [
            'playlists' => $playlists
        ];
        return back();
    }

    public function delete(Request $request) {
        $id = $request->id;
        $result = Playlist::whereId($id)->delete();
        
        $playlists = Playlist::all();        
        $data = [
            'playlists' => $playlists
        ];
        return back();
    }
}
