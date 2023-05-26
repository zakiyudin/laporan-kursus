<?php

namespace App\Repositories;

use App\Models\ReportMember;
use Illuminate\Support\Facades\Validator;

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
        try {
            $validator = Validator::make($request->all(), [
                'date_course' => 'date|required',
                'contact' => 'string|required',
                'book' => 'required',
                'attendance' => 'required'
            ]);

            if ($validator->fails()){
                return [
                    'status' => 403,
                    'success' => false,
                    'message' => $validator->errors()->getMessages()
                ];
            }

            ReportMember::create([
                'member_id' => $request->member_id,
                'date_course' => $request->date_course,
                'attendance' => $request->attendance,
                'contact' => $request->contact,
                'book' => $request->book,
                'evidence' => $request->evidence
            ]);

            return [
                'status' => 201,
                'success' => true,
                'message' => 'Berhasil ditambahkan'
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

    public function update($id, $request)
    {
        
    }

    public function delete($id)
    {
        
    }
}