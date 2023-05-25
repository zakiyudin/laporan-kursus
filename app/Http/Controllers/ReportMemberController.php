<?php

namespace App\Http\Controllers;

use App\Repositories\MemberRepository;
use App\Repositories\ReportMemberRepository;
use Illuminate\Http\Request;

class ReportMemberController extends Controller
{
    protected $memberRepository;
    protected $reportMemberRepository;


    public function __construct(
        MemberRepository $memberRepository,
        ReportMemberRepository $reportMemberRepository
    )
    {
        $this->memberRepository = $memberRepository;
        $this->reportMemberRepository = $reportMemberRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // dd($id);
        $isSuccess = $this->memberRepository->find($id);
        $result = $isSuccess['data'];
        // dd($result);
        return view('report.report_member.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->contact);
        $isSuccess = $this->reportMemberRepository->post($request);
        // dd($isSuccess);
        return response()->json($isSuccess);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
