<?php

namespace App\Repositories;

use App\Models\ReportMember;

class ReportMemberRepository implements InterfaceRepository 
{
    public function getAll()
    {
        try {
            $data = ReportMember::with('member')->get();
            
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

    public function show($id)
    {
        
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
}