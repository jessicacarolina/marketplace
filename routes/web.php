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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/product/{slug}', 'HomeController@single')->name('product.single');

Route::get('/model', function () {
    // $products = \App\Product::all();

    // $user = new \App\User();
    // $user->name = 'Usuário Teste ';
    // $user->email = 'email@teste.com';
    // $user->password = bcrypt('12345678');

    // return $products;

    // return $user->save();
    // return \App\User::all();
    // return \App\User::find(3);
    // return \App\User::where('name', 'jessica')->first();
    // return \App\User::paginate(10);


    // ou usar o Mass Assignment - atribuição em massa

    // $user = \App\User::create([
    //    'name' => 'jessica silva',
    //    'email' => 'email@email.com',
    //    'password' => bcrypt('123456')
    // ]);
    // dd($user);


    // Mass update
    // $user = \App\User::find(42);
    // $user = $user->update([ // ou $user->update que retorna o objeto inteiro e não só true ou false.
    //    'name' => 'Atualizando com Mazz Update'
    // ]);
    // dd($user);

    // Como pegar a loja de um usuário
    // $user = \App\User::find(4);

    // return $user->store;

    //Pegar os produtos de uma loja?
    // $loja = \App\Store::find(1);
    // return $loja->products()->where('id', 1)->get();// products() - é um método e retorna somente o pedido
    // products - é um atributo e não passa mais parametros, sendo assim ele retorna toda a coleção.


    // Pegar as lojas de uma categoria
    // $categoria = \App\Category::find(1);
    // $categoria->products;

    // Criar uma loja para um usuário
//    $user = \App\User::find(10);
//    $store = $user->store()->create([
//        'name' => 'Loja Teste',
//        'description' => 'Loja teste produtos de informatica',
//        'mobile_phone' => 'xxxxx-xxxx',
//        'phone' => 'xxxxx-xxxx',
//        'slug' => 'loja-teste'
//    ]);
//    dd($store);


    // Criar um produto para uma loja
//    $store = \App\Store::find(41);
//    $product = $store->products()->create([
//        'name' => 'Notebook Dell',
//        'description' => 'CORE I5 10GB',
//        'body' => 'Qualquer coisa...',
//        'price' => 2999.90,
//        'slug' => 'notebook-dell',
//    ]);
//    dd($product);


    // Criar uma categoria
//    \App\Category::create([
//        'name' => 'Games',
//        'description' => null,
//        'slug' => 'games'
//    ]);
//
//    \App\Category::create([
//        'name' => 'Notebooks',
//        'description' => null,
//        'slug' => 'notebooks'
//    ]);
//    return \App\Category::all();
//

    // Adicionar um produto para uma categoria ou vice-versa
//    $product = \App\Product::find(41);
//     return $product->categories;
    // attach adiciona, detach remove e o sync adiciona ou remove de acordo com o que tem no banco e com o que foi passado nos parametros.

    return \App\User::all();
});

Route::group(['middleware' => ['auth']], function (){

    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function() {
//    Route::prefix('stores')->name('stores.')->group(function () {
//        Route::get('/', 'StoreController@index')->name('index');
//        Route::get('/create', 'StoreController@create')->name('create');
//        Route::post('/store', 'StoreController@store')->name('store');
//        Route::get('/{store}/edit', 'StoreController@edit')->name('edit');
//        Route::post('/update/{store}', 'StoreController@update')->name('update');
//        Route::get('/destroy/{store}', 'StoreController@destroy')->name('destroy');
//    });
        Route::resource('stores', 'StoreController');
        Route::resource('products', 'ProductController');
        Route::resource('categories', 'CategoryController');

        Route::post('photos/remove', 'ProductPhotoController@removePhoto')->name('photo.remove');
    });

});

  //Route::get - busco
  //Route::post - crio
  //Route::put - atualização
  //Route::patch - atualização
  //Route::delete - deletar
  //Route::options - retorna quais cabeçalhos a rota responde


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
