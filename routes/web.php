<?php

//模板继承
Route::resource('/admin','Admin\AdminController');

//后台的用户模块
Route::resource('/adminusers','Admin\UsersController');

//后台会员收货地址
Route::get('/adminaddress/{id}','Admin\UsersController@address');

//自定义函数
Route::get('/a','Admin\UsersController@a');

//自定义类
Route::get('/b','Admin\UsersController@b');

//云之讯调用短信接口
Route::get('/c','Admin\UsersController@c');

//调用支付宝接口
Route::get('/d','Admin\UsersController@d');

//支付完成返回界面
Route::get('/returnurl','Admin\UsersController@returnurl');