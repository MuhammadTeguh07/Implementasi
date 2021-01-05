@extends('layout/sidenav')
@section('title', 'Futsal Scoreboard')    

@section('konten')
<!-- Content -->
<div class="right_col" role="main" style="min-height: 3754px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3></h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content"><br>
                        <table class="table table-active text-center table-borderless">
                            <thead>
                                <tr>
                                    <td>
                                        <h1>HOME</h1>
                                        <h4 id="home">TEAM A</h4>
                                    </td>
                                    <td>
                                        <h1><b>FUTSAL</b></h1>
                                    </td>
                                    <td>
                                        <h1>AWAY</h1>
                                        <h4 id="away">TEAM B</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <div id="home_score" style="display:table-cell; border: 5px solid; width: 80px; height: 80px; vertical-align: middle; text-align: center; font-size: 48px;">
                                            0
                                        </div>
                                    </td>
                                    <td style="width: 20%">
                                        <h2>PERIOD</h2>
                                        <h1 id="period">1</h1>
                                    </td>
                                    <td align="center">
                                        <div id="away_score" style="display:table-cell; border: 5px solid; width: 80px; height: 80px; vertical-align: middle; text-align: center; font-size: 48px;">
                                            0
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <h1>FOUL</h1>
                                        <div id="home_foul" style="display:table-cell; border: 5px solid; width: 50px; height: 50px; vertical-align: middle; text-align: center; font-size: 32px;">
                                            0
                                        </div>
                                    </td>
                                    <td align="center" style="width: 40%">
                                        <h1>TIME</h1>
                                        <div id="time" style="display:table-cell; border: 5px solid; width: 180px; height: 60px; vertical-align: middle; text-align: center; font-size: 42px;">
                                            00:00
                                        </div>
                                    </td>
                                    <td align="center">
                                        <h1>FOUL</h1>
                                        <div id="away_foul" style="display:table-cell; border: 5px solid; width: 50px; height: 50px; vertical-align: middle; text-align: center; font-size: 32px;">
                                            0
                                        </div>
                                    </td>
                                </tr>                                        
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./ Content -->
<script>
// 20 minutes
var time_in_minutes = 20;
var current_time = Date.parse(new Date());
var deadline = new Date(current_time + time_in_minutes*60*1000);


function time_remaining(endtime){
    var t = Date.parse(endtime) - Date.parse(new Date());
    var seconds = Math.floor( (t/1000) % 60 );
    var minutes = Math.floor( (t/1000/60) % 60 );
    return {'total':t, 'minutes':minutes, 'seconds':seconds};
}

var timeinterval;
function run_timer(id,endtime){
    var clock = document.getElementById(id);
    function update_clock(){
        var t = time_remaining(endtime);
        clock.innerHTML = t.minutes+':'+t.seconds;
        if(t.total<=0){ clearInterval(timeinterval); }
    }
    update_clock(); 
    timeinterval = setInterval(update_clock,1000);
}
run_timer('time',deadline);


var paused = false; 
var time_left; 

function pause_clock(){
    if(!paused){
        paused = true;
        clearInterval(timeinterval); 
        time_left = time_remaining(deadline).total;
        // console.log("time left: "+time_left);
    }
}

function start_timer(){
    if(paused){
        paused = false;

        deadline = new Date(Date.parse(new Date()) + time_left);

        run_timer('time',deadline);
    }
}

function reset_clock(){
    document.getElementById("time").innerHTML = "20:00";
    if(!paused){
        paused = true;
        clearInterval(timeinterval); 
        time_left = 1199000;
    }
}

function sound_play(aud2){
    var loaded = false;
    var audio = new Audio();

    audio.addEventListener('loadeddata', function() {
        loaded = true;
        audio.play();
    }, false);

    audio.src = aud2;
    console.log("Musik:" +aud2)
}

if(typeof(EventSource) !== "undefined") {
    var source = new EventSource("{{ url('/messages') }}");
    source.addEventListener('message', event => {

        // Scoreboard
        let data = JSON.parse(event.data);
        if(data[0].home == ""){
            document.getElementById("home").innerHTML = "TEAM A";
        }
        else{
            document.getElementById("home").innerHTML = data[0].home;
        }
        if(data[0].away == ""){
            document.getElementById("away").innerHTML = "TEAM B";
        }
        else{
            document.getElementById("away").innerHTML = data[0].away;
        }
        document.getElementById("period").innerHTML = data[0].period;
        document.getElementById("home_score").innerHTML = data[0].home_score;
        document.getElementById("away_score").innerHTML = data[0].away_score;
        document.getElementById("home_foul").innerHTML = data[0].home_foul;
        document.getElementById("away_foul").innerHTML = data[0].away_foul;
        document.getElementById('period').innerHTML = data[0].period;
        let countdown = data[0].countdown;
        // console.log(data);
        // console.log(s);
        if(countdown == 1){
            start_timer();
        }
        if(countdown == 0){
            pause_clock();
        }
        if(countdown == 3){
            reset_clock();
        }
            
        // Audio
        let status = data[0].status;
        let aud = data[0].path;

        console.log('status: '+status);
        console.log('path :'+aud);

        if(status != 0){
            aud2 = aud;
            sound_play(aud2);
        }
    });
}
</script>
@endsection