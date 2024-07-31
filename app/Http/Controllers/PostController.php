<?php
/*
 * Copyright 2024 Matheus Eufrásio
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

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
     * @return Response 200
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
     * @param Request $request Include user's datas
     * @return Response 201
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
     * @return Response 200
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
     * @param Request $request Include user's datas
     * @param int $id Include id's post
     * @return Response 200
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
     * @param string $postId Include id's post
     * @return Response 204
     */
    public function destroy(string $postId)
    {
        $this->repository->delete((int) $postId);

        return response()->json([
            'message' => 'delete successfully',
        ], Response::HTTP_NO_CONTENT);
    }
}
