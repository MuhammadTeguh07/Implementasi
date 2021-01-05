@extends('layout/sidenav')
@section('title', 'Scoreboard Controller')

@section('konten')
<!-- Content -->
<div class="content ">

    <div class="page-header">
        <h4>Dashboard</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col d-flex align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col d-flex align-items-center justify-content-center">
                            <div class="table-responsive col-md-8">
                                <table class="table table-active text-center table-bordered">
                                    <thead>
                                        <tr>
                                            <td colspan="2">
                                                <h4>SCOREBOARD</h4>
                                            </td>
                                            <td>
                                                <h4>CONTROL</h4>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td align="center">
                                                <input type="text" id="home" name="home" class="form-control" value="" placeholder="Home"><hr>
                                                <div id="home_score" style="display:table-cell; border: 5px solid purple; width: 80px; height: 80px; vertical-align: middle; text-align: center; font-size: 48px;">
                                                    0
                                                </div></br>
                                                <h6>SCORE</h6>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-danger home_score_min">
                                                        <i class="ti-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-primary home_score_plus">
                                                        <i class="ti-plus"></i>
                                                    </button>
                                                </div><hr>
                                                <div id="home_foul" style="display:table-cell; border: 5px solid purple; width: 50px; height: 50px; vertical-align: middle; text-align: center; font-size: 32px;">
                                                    0
                                                </div></br>
                                                <h6>FOUL</h6>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-danger home_foul_min">
                                                        <i class="ti-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-primary home_foul_plus">
                                                        <i class="ti-plus"></i>
                                                    </button>
                                                </div></br></br>
                                                <button type="button" class="btn btn-warning home_foul_reset">
                                                    Reset
                                                </button>
                                            </td>
                                            <td align="center">
                                                <input type="text" id="away" name="away" class="form-control" value="" placeholder="Away"><hr>
                                                <div id="away_score" style="display:table-cell; border: 5px solid purple; width: 80px; height: 80px; vertical-align: middle; text-align: center; font-size: 48px;">
                                                    0
                                                </div></br>
                                                <h6>SCORE</h6>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-danger away_score_min">
                                                        <i class="ti-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-primary away_score_plus">
                                                        <i class="ti-plus"></i>
                                                    </button>
                                                </div><hr>
                                                <div id="away_foul" style="display:table-cell; border: 5px solid purple; width: 50px; height: 50px; vertical-align: middle; text-align: center; font-size: 32px;">
                                                    0
                                                </div></br>
                                                <h6>FOUL</h6>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-danger away_foul_min">
                                                        <i class="ti-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-primary away_foul_plus">
                                                        <i class="ti-plus"></i>
                                                    </button>
                                                </div></br></br>
                                                <button type="button" class="btn btn-warning away_foul_reset">
                                                    Reset
                                                </button>
                                            </td>
                                            <td style="vertical-align: top" align="center">
                                                <!-- <h6>Set Team Name</h6>
                                                <div class="form-row" style="width: 300px;">
                                                    <div class="col">
                                                        <input type="text" name="" class="form-control" value="" placeholder="Home">
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" name="" class="form-control" value="" placeholder="Away">
                                                    </div>
                                                    <div class="col">
                                                        <button type="button" class="btn btn-primary">
                                                            SET
                                                        </button>
                                                    </div>
                                                </div>
                                                <hr> -->
                                                <h6>Scoreboard</h6>
                                                <button type="button" class="btn btn-warning reset_scoreboard">
                                                    Reset
                                                </button>
                                                <button type="button" class="btn btn-primary update">
                                                    Update
                                                </button>
                                                <hr>
                                                <h6>Timer</h6>
                                                <button type="button" class="btn btn-warning reset_timer">
                                                    Reset
                                                </button>
                                                <button type="button" class="btn btn-danger stop">
                                                    Stop
                                                </button>
                                                <button type="button" class="btn btn-primary start">
                                                    Start / Resume
                                                </button>
                                                <hr>
                                                <h6>Sound</h6>
                                                <input type="hidden" value="0" id="sound_status">
                                                <button type="button" class="btn btn-secondary sound1">
                                                    Sound 1
                                                </button>
                                                <button type="button" class="btn btn-secondary sound2">
                                                    Sound 2
                                                </button>
                                                <button type="button" class="btn btn-secondary sound3">
                                                    Sound 3
                                                </button>
                                                <hr>
                                                <h4>PERIOD</h4>
                                                <div class="form-inline" style="display: flex; justify-content: center; align-items: center;">
                                                    <div class="form-group mb-2">
                                                        <button type="button" class="btn btn-secondary min_period">
                                                            -
                                                        </button>
                                                        <div id="period" style="display:table-cell; border: 5px solid purple; width: 90px; height: 90px; vertical-align: middle; text-align: center; font-size: 56px; margin-left: 5px; margin-right: 5px">
                                                            1
                                                        </div>
                                                        <button type="button" class="btn btn-primary plus_period">
                                                            +
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- ./ Content -->


@endsection