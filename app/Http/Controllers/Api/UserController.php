<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function index()
    {
        return view('master.user.table');
    }
    public function getAll()
    {
        $isSuccess = $this->userRepository->getAll();
        dd($isSuccess);
        return response()->json($isSuccess['data'], $isSuccess['status']);
    }
}
