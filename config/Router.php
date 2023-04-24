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

