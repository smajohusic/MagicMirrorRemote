<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'ssh', 'namespace' => 'Api'], function () {
    Route::post(
        'screen-on',
        [
            'as' => 'ssh.screenOn',
            'uses' => 'SshController@screenOn'
        ]
    );

    Route::post(
        'screen-off',
        [
            'as' => 'ssh.screenOff',
            'uses' => 'SshController@screenOff'
        ]
    );

    Route::post(
        'reboot',
        [
            'as' => 'ssh.reboot',
            'uses' => 'SshController@reboot'
        ]
    );

    Route::post(
        'shutdown',
        [
            'as' => 'ssh.shutdown',
            'uses' => 'SshController@shutdown'
        ]
    );
});
