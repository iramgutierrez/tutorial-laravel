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






