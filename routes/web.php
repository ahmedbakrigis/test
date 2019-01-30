<?php


Route::group(['prefix'=>'user'],function (){
    Route::get('/',['uses'=>'UserController@index','as'=>'getAllUser']);
    Route::get('/add-user',['uses'=>'UserController@create','as'=>'getAddUser']);
    Route::post('/add-user',['uses'=>'UserController@store','as'=>'postAddUser']);
    Route::get('/add-user/{id}',['uses'=>'UserController@edit','as'=>'getUserById']);
    Route::put('/add-user/{id}',['uses'=>'UserController@update','as'=>'updateUserById']);
    Route::delete('/add-user/{id}',['uses'=>'UserController@delete','as'=>'deleteUserById']);
});

?>

