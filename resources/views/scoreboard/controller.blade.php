@extends('layout/sidenav')
@section('title', 'Scoreboard Controller')    

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
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content"><br>
                        <table class="table table-active text-center table-bordered">
                            <thead>
                                <tr>
                                    <td colspan="2">
                                        <h4>SCOREBOARD</h4>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <input type="text" id="home" name="home" class="form-control" value="" placeholder="Home">
                                                </tr>
                                                <tr style="height:7px;"></tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td align="center" style="padding-top:38px;">
                                                        <div id="home_foul" style="display:table-cell; border: 5px solid; width: 50px; height: 50px; vertical-align: middle; text-align: center; font-size: 32px;">
                                                            0
                                                        </div></br>
                                                        <h6>FOUL</h6>
                                                        <div role="group" aria-label="Basic example">
                                                            <button type="button" class="btn btn-danger home_foul_min">
                                                                <i class="fa fa-minus"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-primary home_foul_plus">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td align="center">
                                                        <div id="home_score" style="display:table-cell; border: 5px solid; width: 80px; height: 80px; vertical-align: middle; text-align: center; font-size: 48px;">
                                                            0
                                                        </div></br>
                                                        <h6>SCORE</h6>
                                                        <div role="group" aria-label="Basic example">
                                                            <button type="button" class="btn btn-danger home_score_min">
                                                                <i class="fa fa-minus"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-primary home_score_plus">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <input type="text" id="away" name="away" class="form-control" value="" placeholder="Away">
                                                </tr>
                                                <tr style="height:7px;"></tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td align="center">
                                                        <div id="away_score" style="display:table-cell; border: 5px solid; width: 80px; height: 80px; vertical-align: middle; text-align: center; font-size: 48px;">
                                                            0
                                                        </div></br>
                                                        <h6>SCORE</h6>
                                                        <div role="group" aria-label="Basic example">
                                                            <button type="button" class="btn btn-danger away_score_min">
                                                                <i class="fa fa-minus"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-primary away_score_plus">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td align="center" style="padding-top:38px;">
                                                        <div id="away_foul" style="display:table-cell; border: 5px solid; width: 50px; height: 50px; vertical-align: middle; text-align: center; font-size: 32px;">
                                                            0
                                                        </div></br>
                                                        <h6>FOUL</h6>
                                                        <div role="group" aria-label="Basic example">
                                                            <button type="button" class="btn btn-danger away_foul_min">
                                                                <i class="fa fa-minus"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-primary away_foul_plus">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td colspan="4">
                                                    <h4>CONTROL</h4>
                                                    </td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="vertical-align: top" align="center">
                                                        <h6>Scoreboard</h6>
                                                        <button type="button" class="btn btn-warning reset_scoreboard">
                                                            Reset
                                                        </button><br>
                                                        <button type="button" class="btn btn-primary update">
                                                            Update
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <h6>Timer</h6>
                                                        <button type="button" class="btn btn-warning reset_timer">
                                                            Reset
                                                        </button><br>
                                                        <button type="button" class="btn btn-danger stop">
                                                            Stop
                                                        </button><br>
                                                        <button type="button" class="btn btn-primary start_timer">
                                                            Start / Resume
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <h6>Sound</h6>
                                                        <input type="hidden" value="0" id="sound_status">
                                                        <button type="button" class="btn btn-secondary sound1">
                                                            Sound Goal
                                                        </button><br>
                                                        <button type="button" class="btn btn-secondary sound2">
                                                            Sound Foul
                                                        </button>
                                                    </td>
                                                    <td align="center">
                                                        <h4>PERIOD</h4>
                                                        <div class="form-inline" style="justify-content: center; align-items: center;">
                                                            <div id="period" style="display:table-cell; border: 5px solid; width: 90px; height: 90px; vertical-align: middle; text-align: center; font-size: 56px; margin-left: 5px; margin-right: 5px">
                                                                1
                                                            </div>
                                                            <div role="group" aria-label="Basic example" style="margin-top:7px; margin-left:7px;">
                                                                <button type="button" class="btn btn-danger min_period">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-primary plus_period">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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

<!-- ./ Content -->
@endsection
