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

Las rutas se definen en app/Http/routes.php

Una ruta se puede definir de varias maneras

```php
Route::get('/', function () {
    return view('welcome');
});
```

```php
Route::get('/', function () {
    return "<h1>Welcome</h1>";
});
```

```php
Route::get('/', 'HomeController@index');
```
