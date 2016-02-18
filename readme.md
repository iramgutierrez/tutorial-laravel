# Tutorial Laravel

## Nuevo proyecto

Comenzamos generando un nuevo proyecto

```
laravel new tutorial-laravel
```

Una vez se genere la copia de Laravel, se puede iniciar el servidor de desarrollo

```
cd tutorial-laravel
php artisan serve
```

```
Laravel development server started on http://localhost:8000/
```

## Rutas

Las rutas se definen desde app/Http/routes.php

Una ruta se puede definir de varias maneras

```
Route::get('/', function () {
    return view('welcome');
});
```

```
Route::get('/', function () {
    return "<h1>Welcome</h1>"
});
```

```
Route::get('/', "HomeController@index");
```

## Controladores

Los controladores se encuentran por default en: app/Http/Controllers

Se puede generar desde consola:

```
php artisan make:controller HomeController
```

app/Http/Controllers/HomeController.php

```
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
}
```

También se pueden generar rutas y controladores preparados para un CRUD

app/Http/routes.php

```
Route::resource('teams' , 'TeamController');
```

Esto genera las siguientes rutas:

```
+--------+-----------+--------------------+---------------+---------------------------------------------+------------+
| Domain | Method    | URI                | Name          | Action                                      | Middleware |
+--------+-----------+--------------------+---------------+---------------------------------------------+------------+
|        | GET|HEAD  | teams              | teams.index   | App\Http\Controllers\TeamController@index   |            |
|        | POST      | teams              | teams.store   | App\Http\Controllers\TeamController@store   |            |
|        | GET|HEAD  | teams/create       | teams.create  | App\Http\Controllers\TeamController@create  |            |
|        | DELETE    | teams/{teams}      | teams.destroy | App\Http\Controllers\TeamController@destroy |            |
|        | PUT|PATCH | teams/{teams}      | teams.update  | App\Http\Controllers\TeamController@update  |            |
|        | GET|HEAD  | teams/{teams}      | teams.show    | App\Http\Controllers\TeamController@show    |            |
|        | GET|HEAD  | teams/{teams}/edit | teams.edit    | App\Http\Controllers\TeamController@edit    |            |
+--------+-----------+--------------------+---------------+---------------------------------------------+------------+
```
Desde consola se puede generar el controlador con los metodos necesarios

```
php artisan make:controller TeamController --resource
```

app/Http/Controllers/TeamController.php

```
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
```










