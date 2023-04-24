<?php

$this->get('/', 'futebol\FutebolController@index');

$this->get('/leagues_list', 'futebol\FutebolController@listLeagues');
$this->get('/league_detail/{id}', 'futebol\FutebolController@leagueDetail');
$this->get('/league_add', 'futebol\FutebolController@leagueAdd');
$this->post('/league_save', 'futebol\FutebolController@leagueSave');
$this->post('/league_update/{id}', 'futebol\FutebolController@leagueUpdate');

$this->get('/teams_list', 'futebol\FutebolController@listTeams');
$this->get('/team_detail/{id}', 'futebol\FutebolController@teamDetail');
$this->get('/team_detail/{id}/{leagueId}', 'futebol\FutebolController@teamDetail');
$this->get('/team_add', 'futebol\FutebolController@teamAdd');
$this->post('/team_save', 'futebol\FutebolController@teamSave');
$this->post('/team_update', 'futebol\FutebolController@teamUpdate');

$this->get('/api/v1/leagues', 'api\v1\LeaguesApi@index');
$this->get('/api/v1/leagues/{id}', 'api\v1\LeaguesApi@show');
$this->post('/api/v1/leagues', 'api\v1\LeaguesApi@store');
$this->put('/api/v1/leagues/{id}', 'api\v1\LeaguesApi@update');
$this->delete('/api/v1/leagues/{id}', 'api\v1\LeaguesApi@destroy');

$this->get('/api/v1/teams', 'api\v1\TeamsApi@index');
$this->get('/api/v1/teams/{id}', 'api\v1\TeamsApi@show');
$this->post('/api/v1/teams', 'api\v1\TeamsApi@store');
$this->put('/api/v1/teams/{id}', 'api\v1\TeamsApi@update');
$this->delete('/api/v1/teams/{id}', 'api\v1\TeamsApi@destroy');
