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

El archivo .env sirve para configuraciones de la aplicación como conexión a base de datos

```
DB_HOST=127.0.0.1
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
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

## Entidades y migraciones

Se pueden crear entidades junto con sumigración desde consola

```
php artisan make:model Entities/Team -m
php artisan make:model Entities/Member -m
```

Respuesta

```
Model created successfully.
Created Migration: 2016_02_18_203714_create_teams_table
Model created successfully.
Created Migration: 2016_02_18_204225_create_members_table
```

app/Entities/Team.php

```
namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
}
```

app/Entities/Member.php

```
namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
}
```

database/migrations/2016_02_18_203714_create_teams_table.php

```
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('teams');
    }
}
```

database/migrations/2016_02_18_204225_create_members_table.php

```
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('members');
    }
}
```

Laravel proporciona la Clase Blueprint para generar los campos dentro de las migraciones dentro del metodo run [https://laravel.com/docs/5.2/migrations](https://laravel.com/docs/5.2/migrations)

database/migrations/2016_02_18_203714_create_teams_table.php

```
$table->string('name' , 255)->nullable();
```

database/migrations/2016_02_18_204225_create_members_table.php

```
$table->string('name', 255)->nullable(false);
$table->string('email', 255)->nullable(false);
$table->string('image', 255)->nullable();
$table->integer('team_id')->unsigned()->nullable();
$table->foreign('team_id')
    ->references('id')
    ->on('teams')
    ->onUpdate('cascade')
    ->onDelete('set null');
```

Las migraciones se ejecutan desde consola

```
php artisan migrate
```

Respuesta

```
Migration table created successfully.
Migrated: 2014_10_12_000000_create_users_table
Migrated: 2014_10_12_100000_create_password_resets_table
Migrated: 2016_02_18_203714_create_teams_table
Migrated: 2016_02_18_204225_create_members_table
```

Las clases de Modelo requieren una propiedad llamada fillable, que es un array que contiene los campos que se van a poder asignar una valor desde la aplicación (setter)


app/Entities/Team.php

```
protected $fillable = [
    'name',
];
```

app/Entities/Member.php


```
protected $fillable = [
    'name', 'email' , 'team_id' , 'image'
];
```

## Relaciones

Las relaciones se definen dentro de la clase de modelo de manera sencilla

app/Entities/Team.php

```
public function members()
{
    return $this->hasMany(Member::class);
}
```

app/Entities/Member.php

```
public function team()
{
    return $this->belongsTo(Team::class);
}
```

## Seeders

Los seeders se utilizan para poblar las tablas con datos de prueba. Se pueden generar desde consola

```
php artisan make:seeder TeamsTableSeeder
```

Respuesta

```
Seeder created successfully.
```

```
php artisan make:seeder MembersTableSeeder
```

Respuesta

```
Seeder created successfully.
```

database/seeds/TeamsTableSeeder.php

```
use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    }
}
```

database/seeds/MembersTableSeeder.php

```
use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    }
}
```

Agregamos 5 equipos desde el metodo run del TeamsTableSeeder

```
public function run()
{
    $teams = [
        'Web',
        'IOS',
        'Android',
        'QA',
        'Windows Phone'
    ];

    foreach($teams as $team)
    {
        App\Entities\Team::create([
            'name' => $team
        ]);
    }
}
```

Ejecutamos el seeder desde consola

```
php artisan db:seed --class=TeamsTableSeeder
```

### Model Factory

Los Model Factory se utilizan para generar registros Faker desde los seeders

Implementamos un Model Factory para la entidad de Member

database/factories/ModelFactory.php


```
$factory->define(App\Entities\Member::class, function (Faker\Generator $faker) {

    $team = App\Entities\Team::all()->random(1);

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'team_id' => $team->id,
        'image' => str_random(12).'.jpg'
    ];
});
```

Lo integramos en el seeder

database/seeds/MembersTableSeeder.php

```
public function run()
{
    factory(App\Entities\Member::class, 20)->create();
}
```

Ahora, podemos ejecutar ese seeder cada vez que querramos generar registros de prueba

```
php artisan db:seed --class=MembersTableSeeder
php artisan db:seed --class=MembersTableSeeder
php artisan db:seed --class=MembersTableSeeder
```





























