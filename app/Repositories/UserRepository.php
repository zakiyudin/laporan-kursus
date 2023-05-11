<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\InterfaceRepository;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class UserRepository implements InterfaceRepository {
    
    public function getAll()
    {
        try {
            $data = User::all();
            return [
                'success' => true,
                'status' => 202,
                'data' => $data
            ];
        } catch (\Throwable $th) {
            throw $th->getMessage();
        }
        
    }

    public function show($id)
    {
        
    }

    public function post($request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "name" => "required",
                "email" => "required|email",
                "no_hp" => "required|numeric",
                "status" => "required"
            ]);

            if($validator->fails()) {
                throw new BadRequestException($validator->errors()->first());
            }

            User::create([
                "name" => $request->name,
                "jabatan" => $request->jabatan,
                "address" => $request->address,
                "email" => $request->email,
                "no_hp" => $request->no_hp,
                "status" => $request->status,
            ]);

            return [
                "status" => 201,
                "success" => true,
                "message" => "Data posted successfully"
            ];
        } catch (\Throwable $th) {
            return [
                "status" => 500,
                "success" => false,
                "message" => $th->getMessage()
            ];
        }
    }

    public function update($id, $request)
    {
        
    }

    public function delete($id)
    {
        
    }
}