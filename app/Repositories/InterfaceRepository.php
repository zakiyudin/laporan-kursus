<?php

namespace App\Repositories;

interface InterfaceRepository {
    public function getAll();
    public function show($id);
    public function post($request);
    public function update($id, $request);
    public function delete($id);
}