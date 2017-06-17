<?php

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
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

//1//
//MAKE AUTH LOGIN PAGE / php artisan make:auth
//chek if loged in user is admin
Route::resource('admin/users','AdminUserController');//admin/users - rest controlls the controller
//resource() crete all our routes for us
//we need to make controler true gitbash
//php artisan make:controller --resource AdminUserController
//--resource will enable us CRUD methods usage

//php artisan route:list //chek it out
//by defoult AdminuserController will route ro AdminuserController@index

//2//
//GULP
//DOWNLOAD nodejs / Install it!
//in bash : node -v for version check
//bash: npm install --global gulp
//bash: npm install

//gulp will compile our css stylesheets and script  code to one file
//and make app work faster and be more accesibble
//laravl location for gulp : vendor/gulpfile.js

//3//
//SETTING UP GULP FILE gulpfile.js
//Download all the folders needed from udemy css,fonts,js
//put js and css folder here : C:\xampp\htdocs\codehack\resources\assets
//put fonts here: C:\xampp\htdocs\codehack\public
//now go to gulpfile.js and set bouth css and js files into methods as presented there now
//go bash: gulp
//4//
/////CREATING MASTER ADMIN PAGE
//Master page for all our ADMIN areas categories,posts, users
//then we can just @yield('content') and reuse elsewhere
//create file in: resources\views\layouts/admin.blade.php
//copy paste code within file that we get from udemy (admin.blade.php zip)

Route::get('/admin',function(){
    return view('admin.index');//folder.file
    //in index.php extend admin.php from layouts
});

//STYLING 
//resources/assets/sass/app.scss 
//there we insert style changes to admin page 
//#admin-page {
//    padding-top: 0 !important; //use !important if normal way doesnt work
//}
//becouse app.scss is first in chain of coomand for styling
//this file is compiled to our gulp already is in public/css/app.css
//affter making changess go bash : gulp // to compile changes again

//4//EDITING ADMIN USERS INDEX FILE (list of users)
//we extend layout from MAIN ADMIN
//we go to w3schools and copy/paste basic table and modify

//5//
//ADMIn users create view:
//@extend() layouts.admin,  modify AdminUserController
//pulling role name & id from roles table
//WE DO NOT NEED A ROUTE , its controlled by AdminUSerController
//we need to install laravelcollective/html to be able to use
//predefined html forms
//goggle: laravelcollective/html follow instructions
//try install manually first
//modification to composer.json "require"
//modifications to config app/php
//insert forms in admin/user/crate view:
//name,email, role, status
//modify controller create() , puling roles from table enable select
//modify admin/users/create :

//make new password field under Status:
//check in AdminUserController if it returns data from admin/users/create view

//MAKING REQUEST bash: php artisan make:request reqnamehere
//to stop sending blank forms to table when creating users
//in request /http/requests/our new req :
//authorize() set to true and make new rules : 'name'=>'request' ...
//in AdminUserConreoller change store(ournewrequestnamehere $request) 
//import class on top!!!

//diplaying errors as a result of our new request in admin/users/create :
//make new foolder in views : 'includes' and put error.blade.php:
//inside make @if statement <div> ul  @foreach li (loop true global $errors) li ul ...
//@include('includes.errors') at the bootom ,after submit form ,in admin/users/create view

//6//
//add another form-group (input file field) in admin/users/create above password
//modify MAIN form::open([]) add ,'files'=>true // to enable adding files /enctype ...
//add new column to users table true migration  : photo_id
//php artisan make:migration add_photo_id_to_users --table=users
// migrate
//7//
//make new model with migration create_photos_table /add column 'title' /add $fillable / make relation in users to photo

//8//
//make side columns active for admin/users/index & admin/users/create
//so we dont have to type paths anymore :
//modify MAIN admin layout : admin.blade.php : /  <a href="{{route('admin.users.create')}}">Create User</a>,



//9//
/*
What happens when we klik create user:
Our admin/users/create view have all the records in forms 
Name, email, role,status,photo,password
By kliking create user it all goes to store()
in AdminUsersController
1.There it gets checked by UserCheckRequest : 
To check if each field is populated or shows error view
2.All requests go to $input
3.if() statement in variable $file = checks if we have chosen FILE for our photo
3.1 $name captures time and original $file name
3.2 in public folder we create new images folder
and we save our $file 
3.3 we make new record in photo table 
in photo table we save that record under column 'file' as $name
3.4we set users $input photo_id to be equal as newlycreated id from photos table
4. Step 4 is representing whats happening after if()statement:
we make sure that $input password is encrypted
4.1saves new user in (user table) + belonging photo_id taken from photo table!!!!
5. redirect to wherever


if we dont have a photo only user will be created without photo_id
*/





