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

Route::get('teks1', function () {
    return 'Hay Dinda Cahya <br>Semangat untuk hari ini!';
});

Route::get('teks2', function () {
    return 'Teknik Informatika <br>Politeknik Negeri Semarang';
});

Route::get('view_pertama', function () {
    return view ('view1');
});

Route::get('view_kedua', function () {
    return view ('view2');
});

//Route::get('/', function () {
   // return 'welcome';
//});

Route::get('biodata', function () {
    return 'Nama : Dinda <br>NIM : 3.34.18.1.09 <br>Alamat : Surakarta <br>Hobi : Mendengarkan musik';
});

//Route::get('mahasiswa/{jurusan}', function ($jurusan) {
  //  return 'Mahasiswa jurusan : '.$jurusan;
//});

//Route::get('mahasiswa2/{jurusan?}', function ($jurusan=null) {
  //  if($jurusan == null)
    //    return "Data mahasiswa jurusan kosong";
    //return "Mahasiswa jurusan : ".$jurusan;
//});

Route::get('mahasiswa3/{jurusan?}', function ($jurusan="Teknik Informatika"){
    return "Mahasiswa jurusan : ".$jurusan;
});

Route::get('biodata2', function (){
    return view('biodata2');
});

Route::get('halaman_tersembunyi', ['as' => 'rahasia', function (){
    return 'Ini halaman yang disembunyikan';
}]);

Route::get('tampilkan_halaman_tersembunyi', function (){
    return redirect()->route('rahasia');
});

Route::group([], function ()
{
    Route::get('/pertama', function ()
    {
        echo "route pertama";
    });
    Route::get('/kedua', function ()
    {
        echo "route kedua";
    });
    Route::get('/ketiga', function ()
    {
        echo "route ketiga";
    });
});

Route::group(['prefix' => 'latihan'], function ()
{
    Route::get('/satu', function ()
    {
        echo "latihan 1";
    });
    Route::get('/dua', function ()
    {
        echo "latihan dua";
    });
    Route::get('/tiga', function ()
    {
        echo "latihan tiga";
    });
});

Route::group(array('prefix' => 'admin'), function ()
{
    // home page route to the admin section
    Route::get('/', function ()
    {
        return 'Halaman Admin';
    });

    // route to create a all posts listing
    Route::get('posts', function ()
    {
        return 'Halaman Dashboard';
    });

    // Route to create a new blog post
    Route::get('posts/simpan', function ()
    {
        return 'Data berhasil disimpan';
    });
});

Route::name('kuliah.')->group(function()
{
    Route::get('teknik_informatika', function()
    {
        return "kuliah Teknik Informatika";
    })->name('teknik_informatika');
});

Route::name('kuliah2')->group(function()
{
    Route::get('teknik_informatika2', function()
    {
        return "kuliah Teknik Informatika juga";
    });
});

Route::group(array('prefix' => 'halaman_admin', 'before'=>'login'), function ()
{
    // home page route to the admin section
    Route::get('/', function ()
    {
        return 'Halaman Admin bisa diakses setelah login';
    });

    // route to the all posts listing
    Route::get('posts', function ()
    {
        return 'Halaman Dashboard bisa diakses setelah login';
    });

    // Route to create a new blog post
    Route::get('posts/simpan', function ()
    {
        return 'Bisa menyimpan setelah login';
    });
});

Route::get('latihan1view/{nama}', function($nama) {
	return view('latihan1view', ['nama' => $nama]);
});

Route::get('latihan2/{nama}', function($nama) {
	return view('latihan2', ['nama' => $nama]);
});


//tugas3 controller
Route::get('/', 'MahasiswaController@welcome');

Route::get('biodata', 'MahasiswaController@biodata');

Route::get('mahasiswa/(jurusan)', 'MahasiswaController@mahasiswa');

Route::get('mahasiswa3/{jurusan?}', 'MahasiswaController@mahasiswa3');

Route::get('biodata2', 'MahasiswaController@biodata2');

Route::get('halaman_tersembunyi', 
            ['as' => 'Rahasia',
            'uses' => 'MahasiswaController@halaman_tersembunyi']);

Route::get('tampilkan_halaman_tersembunyi', 'MahasiswaController@tampilkan_halaman_tersembunyi');

Route::group([], function ()
{
    Route::get('/pertama', 'MahasiswaController@pertama');
    Route::get('/kedua', 'MahasiswaController@kedua');
    Route::get('/ketiga', 'MahasiswaController@ketiga');

});

Route::group(['prefix' => 'latihan'], function ()
{
    Route::get('/satu', 'MahasiswaController@satu');
    Route::get('/dua', 'MahasiswaController@dua');
    Route::get('/tiga', 'MahasiswaController@tiga');

});

Route::group(['prefix' => 'admin'], function ()
{
    // home page route to the admin section
    Route::get('/', 'MahasiswaController@admin');

    // route to create a all posts listing
    Route::get('posts', 'MahasiswaController@posts');

    // Route to create a new blog post
    Route::get('posts/simpan', 'MahasiswaController@simpan');

});

Route::name('kuliah.')->group(function()
{
    Route::get('teknik_informatika', 'MahasiswaController@teknik_informatika');
});

Route::name('kuliah2')->group(function()
{
    Route::get('teknik_informatika2', 'MahasiswaController@teknik_informatika2');
});

Route::group(array('prefix' => 'halaman_admin', 'before'=>'login'), function ()
{
    // home page route to the admin section
    Route::get('/', 'MahasiswaController@halaman_admin');

    // route to the all posts listing
    Route::get('posts', 'MahasiswaController@halaman_posts');

    // Route to create a new blog post
    Route::get('posts/simpan', 'MahasiswaController@halaman_simpan');
});


//tugas4 Metode POST

Route::get('input', 'MahasiswaController@input');

Route::post('tampilkan', 'MahasiswaController@tampilkan');

//tugas5 Migrasi
Route::get('contohdata', function(){
    DB::table('biodata')->insert([
        [
            'nim' => '33418109',
            'nama' => 'Dinda Cahya Nur Santoso',
            'prodi' => 'Teknik Informatika',
            'tanggal_lahir' => '2000-06-02',
            'alamat' => 'jl. malabar dalam, solo',
            'hobi' => 'Mendengarkan musik',
            'quote' => 'Semangat!',
        ],
    ]);
});

//tugas6 Eloquent

Route::get('tampilkan_biodata', 'MahasiswaController@tampilkan_biodata');

Route::get('tambah_biodata', 'MahasiswaController@tambah_biodata');

Route::post('store', 'MahasiswaController@store');

//tugas7 eloquent2

Route::get('detail_biodata/{biodata}', 'MahasiswaController@show');
Route::get('edit_biodata/{biodata}/edit', 'MahasiswaController@edit');
Route::get('update/{id}', 'MahasiswaController@update');
Route::get('hapus/{id}', 'MahasiswaController@delete');
Route::get('biodata/cari', 'MahasiswaController@cari');

//tugas8 Eloquent3
Route::get('test_collection', 'MahasiswaController@test_collection');
Route::get('first_collection', 'MahasiswaController@first_collection');
Route::get('last_collection', 'MahasiswaController@last_collection');
Route::get('count_collection', 'MahasiswaController@count_collection');
Route::get('take_collection', 'MahasiswaController@take_collection');
Route::get('pluck_collection', 'MahasiswaController@pluck_collection');
Route::get('where_collection', 'MahasiswaController@where_collection');
Route::get('toarray_collection', 'MahasiswaController@toarray_collection');
Route::get('date_mutator', 'MahasiswaController@date_mutator');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('buat_pdf', 'MahasiswaController@buat_pdf');
