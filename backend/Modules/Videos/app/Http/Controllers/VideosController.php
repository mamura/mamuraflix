<?php

namespace Modules\Videos\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Modules\Videos\Http\Requests\RequestStoreVideo;
use Modules\Videos\Repositories\VideosRepository;

class VideosController extends Controller
{
    private $repository;

    public function __construct()
    {
        $this->repository = new VideosRepository();
    }

    public function list()
    {
        return response()->json($this->repository->list());
    }

    public function find($id)
    {
        return response()->json($this->repository->find($id));
    }

    public function store(RequestStoreVideo $request)
    {
        return response()->json($this->repository->save($request));
    }

    public function delete($id)
    {
        return response()->json($this->repository->delete($id));
    }
}
