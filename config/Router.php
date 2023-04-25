<?php

$this->get('/', 'futebol\FutebolController@index');

$this->get('/leagues_list', 'futebol\LeaguesController@listLeagues');
$this->get('/league_detail/{id}', 'futebol\LeaguesController@leagueDetail');
$this->get('/league_add', 'futebol\LeaguesController@leagueAdd');
$this->post('/league_save', 'futebol\LeaguesController@leagueSave');
$this->post('/league_update/{id}', 'futebol\LeaguesController@leagueUpdate');
$this->post('/league_delete/{id}', 'futebol\LeaguesController@leagueDelete');

$this->get('/teams_list', 'futebol\TeamsController@listTeams');
$this->get('/team_detail/{id}', 'futebol\TeamsController@teamDetail');
$this->get('/team_add', 'futebol\TeamsController@teamAdd');
$this->post('/team_save', 'futebol\TeamsController@teamSave');
$this->post('/team_update/{id}', 'futebol\TeamsController@teamUpdate');
$this->post('/team_delete/{id}', 'futebol\TeamsController@teamDelete');

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
