<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Gigigo\Repositories\TeamRepository as Repository;
use App\Gigigo\Managers\TeamManager as Manager;
use App\Gigigo\Entities\TeamEntity as Entity;
use Illuminate\Support\MessageBag;

class TeamController extends Controller
{
    /**
     * @var Repository
     */
    protected $repository;
    /**
     * @var Manager
     */
    protected $manager;
    /**
     * @param Repository $Repository
     * @param Manager $Manager
     */
    public function __construct(Repository $Repository, Manager $Manager)
    {
        $this->repository = $Repository;
        $this->manager = $Manager;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = $this->repository->all();
        return response()->json($resources);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $response = $this->manager->save($data);
        if ($response instanceof Entity) {

            return response()->json($response, 200);

        } else if ($response instanceof MessageBag) {

            return response()->json($response, 400);

        }

        return response()->json(['error' => 'Server error. Try Again'], 500);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resource = $this->repository->findById($id);

        if (!$resource) {
            return response()->json(['error' => 'Entity not found'], 404);
        }

        return response()->json($resource);
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
        $resource = $this->repository->findById($id);

        if (!$resource) {
            return response()->json(['error' => 'Entity not found'], 404);
        }

        $data = $request->all();

        $this->manager->setEntity($resource);

        $response = $this->manager->update($data);

        if ($response instanceof Entity) {

            return response()->json($response, 200);

        } else if ($response instanceof MessageBag) {

            return response()->json($response, 400);

        }

        return response()->json(['error' => 'Server error. Try Again'], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resource = $this->repository->findById($id);

        if(!$resource)
        {
            return response()->json(['error' => 'Entity not found'] , 404);
        }

        $this->manager->setEntity($resource);

        $response = $this->manager->delete();

        if($response){

            return response()->json(['success' => 'Entity deleted'], 200);

        }

        return response()->json(['error' => 'Server error. Try Again' ],500);
    }
}
