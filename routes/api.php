<?php

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

Route::group(['prefix' => 'web-camera', 'namespace' => 'Api'], function () {
    Route::post(
        'store',
        [
            'as' => 'webCamera.store',
            'uses' => 'WebCameraController@store'
        ]
    );
});
