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

namespace App\Interfaces;

interface PostRepositoryInterface
{
    public function all(): mixed;
    public function findBy($id): mixed;
    public function find($id): mixed;
    public function create($data): mixed;
    public function update($data, $id): mixed;
    public function delete($postId): mixed;
}