@extends('layouts.global')

@section('content-header')
    Anggota    
@endsection

@section('content-body')
    <ul class="list-group">
        @foreach ($result as $item)    
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <h5>{{ $item->name }}</h5>
                {{-- <span class="badge bg-primary rounded-pill">14</span> --}}
                <a href="{{ route('report_member.index', ['id' => $item->id]) }}" class="btn btn-sm btn-success">Lihat Laporan</a>
            </li>
        @endforeach
    </ul>
@endsection