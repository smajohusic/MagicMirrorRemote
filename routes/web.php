<?php

Route::get(
    '/',
    [
        'as' => 'home.index',
        'uses' => 'MagicMirrorRemoteController@index'
    ]
);
