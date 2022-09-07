<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\JsonResponse;

class PostController extends Controller
{
    use ResponseTrait;
    private object $model;
    private string $table;

    public function __construct()
    {
        $this->model = Post::query();
        $this->table = (new Post())->getTable();

        View::share('title', ucwords($this->table));
        View::share('table', $this->table);
    }

    public function index(request $request)
    {
        $selectedPost = $request->get('select-post');
        $query = $this->model->clone();
        if($selectedPost !== 'All...' && $selectedPost !== null){
            ($query->where('title', $selectedPost));
        }
        $data = $query->paginate();

        return view("manager.$this->table.index",[
            'data' => $data,
            'selectedPost'=>$selectedPost,
        ]);
    }

    public function create()
    {
        return view("manager.$this->table.create",[
            'title'=>'Create ' . $this->table,
        ]);
    }

    public function store(request $request)
    {
        dd($request->all());
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $this->model->create($request->all());
        return $this->redirectWithMessage('success', 'Create successfully');
    }

    public function preview(request $request) : JsonResponse
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        return $this->responseSuccess($request->all());
        return view("manager.$this->table.preview",[
            'title'=>'Preview ' . $this->table,
            'data' => $request->all(),
        ]);

    }
}
