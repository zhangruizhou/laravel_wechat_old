<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


$urls = parse_url(Request::Url());
$host =  $urls['host'];
$prefix = explode('.', $host)[0];

if (strtolower($prefix) == 'wechat') {
    $namespace = 'Front';
} else if(strtolower($prefix) == 'admin') {
    $namespace = 'Admin';
} else if(strtolower($prefix) == 'mai') {
    $namespace = 'Seller';
} else if(strtolower($prefix) == 'auth') {
    $namespace = 'Auth';
} else { //解决composer时自动查找localhost的问题
    $namespace = 'Front';
}
echo $namespace;

echo "<br/>";

echo $host;die;
//域名分组
Route::group(array('domain' => $host, 'namespace'=>$namespace), function() use($namespace){
    return  __DIR__.'/Group/' . $namespace .'.php';
});

/*
Route::get('/', function () {
    return view('welcome');
});
*/
