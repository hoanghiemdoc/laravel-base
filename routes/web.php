<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//  tạo một router kết nối đến lớp controller

// tạo một project file mới
Route::get('/profile/{name}','App\Http\Controllers\ProfileController@showProfile');

// truyền một phần tử từ return qua
Route::get('/home','App\Http\Controllers\HomeController@index');



Route::get('/detail',[AboutController::class,'showDetail']);


// tạo một routee truyền thêm một phần tử từ lớp controller
Route::get('/about/{theSubject}','App\Http\Controllers\AboutController@showSubject');

// func đầu tiên của laravel
Route::get('/', function () {
//    return 'welcome home by hoang';
    return view('welcome');
});

Route::get('about',function (){
    return 'about content';
});

// liên kết link router ở dưới
Route::get('about/directions',array('as' => 'directions' ,function (){
    $theURL = URL::route('directions');
    return "direction go here this URL: $theURL";
}));

Route::any('submit-form',function (){
    return 'submit -form process';
});

// ;

// nối các  router lại với nhau bằng cách truyền object
Route::get('about/classes/{theSubject}/{theArt}',function ($theSubject,$theArt){
    return  " the name artictist: $theSubject and $theArt";
});

// cách liên kết với router khác
Route::get('where',function (){
    return Redirect::route('directions');
});


//insert một cột vào mysql

Route::get('/insert',function (){
    DB::insert('insert into post(title,body) values(?,?)',['PHP WITH LARAVEL2345','laravel is frame work!']);
    DB::insert('insert into post(title,body) values(?,?)',['PHP WITH LARAVEL23457899','laravel is perfer!']);
     return 'Done';
});


// cách truy vấn dữ liệu trên database
Route::get('/read',function (){
   $result = DB::select('select * from post where id > ?',[1]);
//   return $result;

    foreach ($result as $post){ // duyệt để lấy dữ liệu mình mong muốn bằng cách dùng forEach
        return $post->id;
    }
});

// update một phần tử trên database
Route::get('/update',function (){
    $update = DB::update('update post set title = "new update cua hoàng" where id > ?',[1]);
    return $update;
});

// xóa bỏ một phần tử
Route::get('/delete',function (){
    $delete = DB::delete('delete from post where id = ?',[1]);
    return $delete;
});


// cách truy xuất bản ghi mà không cần đến gọi DB::up,read,delete
// cần phải khai báo biến use:App/... ở trêm

Route::get('/readAll',function (){
   $post = Post::all();
   foreach ($post as $p){
       return $p->body;
//       echo $p->title;
   }
//    foreach (Post::all() as $post) {
//        echo $post->title;
//    }
});



Route::get('/findId',function (){
    $post = Post::where('id',3)
        ->orderBy('id','desc')
        ->take(1)
        ->get();
    foreach ($post as $p){
        return $p->title;
//       echo $p->title;
    }
});


// thêm bản ghi mới

Route::get('/insertORM',function (){
    $p = new Post;
    $p->title = 'insert ORM';
    $p->body = 'insert weldone body';
    $p->created_at = '';
    $p->updated_at = '';
    $p->save();
});

