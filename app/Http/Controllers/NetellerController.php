<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use App\Host;
use App\Transaction;

class NetellerController extends Controller
{
    
    public $client;

    public function __construct() {
        $this->client = new Client();        
    }

    public function index() {        
        return view('welcome');
    }

    public function home() {
        if(\Auth::check()) {
            $hosts = Host::all();
            $data = [
                'hosts' => $hosts
            ];
            return view('home', $data);
        } else {
            return redirect('login');
        }        
    }

    public function add(Request $request) {        
        $host_url = $request->host_url;
        $result = Host::create(['url' => $host_url]);
        
        $hosts = Host::all();
        $data = [
            'hosts' => $hosts
        ];
        return back();
    }

    public function delete(Request $request) {
        $id = $request->id;
        $result = Host::whereId($id)->delete();
        
        $hosts = Host::all();        
        $data = [
            'hosts' => $hosts
        ];
        return back();
    }

    public function depositWebhook(Request $request) {
        $data = $request->all();
        
        // save webhook response
        $detail = [
            'detail' => json_encode($data)
        ];
        Transaction::create($detail);

        $hosts = Host::all();
        try {
            foreach($hosts as $host) {
                $response[] = $this->client->post($host->url . '/api/payment/paysafe/webhook', [RequestOptions::JSON => $request->all()]);            
            }            
            return response()->json(['success' => 'success'], 200);
        } catch (\Exception $e) {
            file_put_contents('error_log.txt', $e->getMessage() . '\n', FILE_APPEND);
            throw $e;
        };        
    }
}
