# Tutorial Laravel

## Nuevo proyecto

Comenzamos generando un nuevo proyecto

```bash
laravel new tutorial-laravel
```

Una vez se genere la copia de Laravel, se puede iniciar el servidor de desarrollo

```bash
cd tutorial-laravel
php artisan serve
```

```bash
Laravel development server started on http://localhost:8000/
```

## Rutas

Las rutas se definen desde app/Http/routes.php

Una ruta se puede definir de varias maneras

```bash
Route::get('/', function () {
    return view('welcome');
});
```

```bash
Route::get('/', function () {
    return "<h1>Welcome</h1>"
});
```

```bash
Route::get('/', "HomeController@index");
```


