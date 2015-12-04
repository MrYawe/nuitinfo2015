<?php
use App\Events;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// test : fire public envent
Route::get('fire', function () {
    // this fires the event
    event(new App\Events\EventName());
    return "public event fired";
});

// test : fire private event
Route::get('fire-private', function () {
    // this fires the event
    event(new App\Events\PrivateMessageTest());
    return "private event fired";
});

Route::get('socket-example', function () {
    // this checks for the event
    return view('socket_example');
});

Route::get('threejs-example', function () {
    return view('threejs-example');
});

Route::get('threejs-planete', function () {
    $events = Events::all();
    $lesEvents = array();
    foreach($events as $key=>$value)
    {
        $lesEvents[] = array(
            "id" => $value->id,
            "name" => $value->name,
            "type" => $value->type,
            "color" => $value->color
            );
    }
    return view('threejs-planete', compact('lesEvents'));
});


Route::get('user-info', function () {
    return view('user.user-info');
});

Route::get('vocal', function () {
    return view('vocal.test');
});

Route::resource('report', 'ReportController');
