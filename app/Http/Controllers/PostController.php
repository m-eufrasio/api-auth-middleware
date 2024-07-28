<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Interfaces\PostRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $repository;

    public function __construct(PostRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data' => $this->repository->all(),
            'message' => 'successfully',
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->repository->create([
            "name" => $request->name,
            "body" => $request->body,
            "user_name" => $request->user_name,
            "user_id" => $request->user_id,
        ]);

        return response()->json([
            'message' => 'successfully',
            'data' => $data,
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = Auth::user();
        $data = $this->repository->findBy($user->id);
        
        return response()->json([
            'message' => 'successfully',
            'data' => $data,
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $this->repository->update([
            "name" => $request->name,
            "body" => $request->body,
            "user_name" => $request->user_name,
            "updated_at" => $request->user_name,
            "user_id" => $request->user_id,
        ], $id);

        return response()->json([
            'message' => 'update successfully',
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $userId, string $postId)
    {
        $this->repository->delete((int) $postId);

        return response()->json([
            'message' => 'delete successfully',
        ], Response::HTTP_NO_CONTENT);
    }
}
