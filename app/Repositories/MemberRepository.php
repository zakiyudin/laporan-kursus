<?php

namespace App\Repositories;

use App\Models\Member;
use App\Models\User;
use App\Repositories\InterfaceRepository;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class MemberRepository implements InterfaceRepository 
{
    public function find($id)
    {
        try {
            $data = Member::with('report_members')->find($id);

            // dd($data->report_member);
            return [
                'status' => 200,
                'success' => true,
                'data' => $data
            ];
        } catch (\Throwable $th) {
            //throw $th;
            return [
                'status' => $th->getCode(),
                'success' => false,
                'message' => $th->getMessage()
            ];
        }
    }

    public function getAll()
    {
        try {
            $data = Member::latest()->get();

            return [
                'status' => 200,
                'success' => true,
                'data' => $data
            ];
        } catch (\Throwable $th) {
            //throw $th;
            return [
                'status' => 500,
                'success' => false,
                'message' => $th->getMessage()
            ];
        }
    }

    public function post($request)
    {
        
    }

    public function update($id, $request)
    {
        
    }

    public function delete($id)
    {
        
    }

    public function show($id)
    {
        
    }
}