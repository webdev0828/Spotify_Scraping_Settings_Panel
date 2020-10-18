<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use App\Playlist;
use App\Detail;

class PlaylistController extends Controller
{
    
    public $client;

    public function index() {
        
        $detail = Detail::first();
        $playlists = Playlist::all();

        $data = [
            'playlists' => $playlists,
            'detail' => $detail
        ];

        return view('home', $data);
    }

    public function add(Request $request) {        
        $title = $request->title;
        $playlist_id = $request->playlist_id;
        $googlesheet = $request->googlesheet;
        

        if($playlist_id == '' || !isset($playlist_id)) 
            return back();
        
        $result = Playlist::create(['title' => $title,'playlist' => $playlist_id, 'googlesheet' => $googlesheet]);
        
        $playlists = Playlist::all();
        $detail = Detail::first();

        $data = [
            'playlists' => $playlists,
            'detail' => $detail
        ];
        return back();
    }

    public function delete(Request $request) {
        $id = $request->id;
        $result = Playlist::whereId($id)->delete();
        
        $playlists = Playlist::all();
        $detail = Detail::first();

        $data = [
            'playlists' => $playlists,
            'detail' => $detail
        ];
        return back();
    }

    public function update(Request $request) {
        $email = $request->email;
        $password = $request->password;

        $detail = Detail::first();
        $detail->email = $email;
        $detail->password = $password;
        $detail->save();

        $playlists = Playlist::all();
        $detail = Detail::first();

        $data = [
            'playlists' => $playlists,
            'detail' => $detail
        ];
        return back();
    }
}
