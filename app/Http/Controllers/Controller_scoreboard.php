<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Controller_scoreboard extends Controller
{
    public function scoreboard_index(){
        return view('/scoreboard/scoreboard');
    }

    public function message(){
        $response = new \Symfony\Component\HttpFoundation\StreamedResponse(function() {
            while(true) {
                $data = DB::table('scoreboard')->select('scoreboard.*', 'sd.*')
                ->join('sound as sd', 'sd.id_sound', '=', 'scoreboard.id_sound')
                ->get();
                echo 'data: ' . json_encode($data) . "\n\n";
                
                // print PHP_EOL;
                ob_end_flush();
                flush();
                sleep(1);
            }
        });
        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('X-Accel-Buffering', 'no');
        $response->headers->set('Cach-Control', 'no-cache');
        return $response;
    }

    public function controller_index(){
        return view('scoreboard/controller');
    }
     
    public function controller_store(Request $r){
        if($r->countdown != null){
            DB::table('scoreboard')->where('id', $r->id)->update([
                'countdown' => $r->countdown
            ]);
        }
        elseif($r->status != null){
            DB::table('scoreboard')->where('id', $r->id)->update([
                'id_sound' => $r->id_sound
            ]);
            DB::table('sound')->where('id_sound', $r->id_sound)->update([
                'status' => $r->status
            ]);
        }
        else{
            DB::table('scoreboard')->where('id', $r->id)->update([
                'home' => strtoupper($r->home),
                'away' => strtoupper($r->away),
                'home_score' => $r->home_score,
                'away_score' => $r->away_score,
                'home_foul' => $r->home_foul,
                'away_foul' => $r->away_foul,
                'period' => $r->period
            ]);
        }
    }
}
