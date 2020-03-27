<?php

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

Route::pattern("id","[0-9]+");
Route::get("/","HomeController@index")->name("home");
Route::get("/brojArtikala","HomeController@brojArtikala");
Route::get("/contact","SendEmailController@contact");
Route::post("/contact/sendemail","SendEmailController@send")->name("contact.email");
Route::get("/post/{id?}","PostController@show")->name("showpost");
Route::get("/login","AuthController@login")->middleware(["isLoggedIn"]);;
Route::get("/register","AuthController@register")->middleware(["isLoggedIn"]);

Route::post("/login","AuthController@doLogin");
Route::post("/register","AuthController@doRegister");
Route::get("/logout","AuthController@logout")->middleware(["NotLoggedIn"])->name("logout");

Route::get("/category/{id}","HomeController@filterArticles");
Route::get("/posts/search/","HomeController@filterBySearch");

Route::post("/comments","CommentsController@postComment")->name("postComment");
Route::delete("/comments/delete/{id}","CommentsController@delete")->name("deleteComment");
Route::group(['middleware'=>'admin'],function(){
    Route::get("/admin","Admin\DashboardController@index")->name("dashboard.index");

    Route::get("/admin/users","Admin\UserController@index")->name("user.index");
    Route::get("/admin/users/createuser","Admin\UserController@create")->name("user.create");
    Route::post("/admin/users/createuser/create","Admin\UserController@store")->name("user.store");
    Route::delete("/admin/users/deleteuser/{id}","Admin\UserController@destroy")->name("user.delete");
    Route::get("/admin/users/{id}","Admin\UserController@show")->name("user.show");
    Route::post("/admin/users/update/{id}","Admin\UserController@update")->name("user.update");

    Route::get("/admin/posts","Admin\PostController@index")->name("posts.index");
    Route::get("/admin/createpost","Admin\PostController@create")->name("posts.create");
    Route::post("/admin/insertCategory","Admin\PostController@insertCategory")->name("posts.categoryinsert");
    Route::post("/admin/insertPost","Admin\PostController@insertPost")->name("posts.insertpost");
    Route::delete("/admin/post/delete/{id}","Admin\PostController@delete")->name("post.delete");
    Route::get("/admin/posts/{id}", "Admin\PostController@show")->name("posts.show");
    Route::post("/admin/posts/update/{id}", "Admin\PostController@update")->name("posts.update");

    Route::get("/admin/navigation","Admin\NavigationController@index")->name("navigation.index");
    Route::post("/admin/navigation/createnav","Admin\NavigationController@store")->name("navigation.store");
    Route::delete("/admin/navigation/delete/{id}","Admin\NavigationController@destroy")->name("navigation.destroy");
    Route::get("/admin/navigation/{id}","Admin\NavigationController@show")->name("navigation.show");
    Route::post("/admin/navigation/update/{id}","Admin\NavigationController@update")->name("navigation.update");

    Route::get("/admin/actions","Admin\ActionController@index")->name("action.index");
    Route::get("/admin/actions/date","Admin\ActionController@filter")->name("action.filter");

    Route::get("/admin/emails","Admin\EmailController@index")->name("emails.index");
    Route::delete("/admin/emails/delete/{id}","Admin\EmailController@destroy")->name("emails.delete");

    Route::get("/admin/comments","Admin\CommentController@index")->name("comment.index");
    Route::delete("/admin/comments/delete/{id}","Admin\CommentController@destroy")->name("comment.delete");
});
