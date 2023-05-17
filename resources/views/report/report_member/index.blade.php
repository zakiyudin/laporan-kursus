@extends('layouts.global')

@section('content-header')
    Laporan    
@endsection

@section('content-body')
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Laporan Anggota
                        <strong>{{ $result->name }}</strong>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <button class="btn btn-sm btn-success mb-2" onclick="addData()">Tambah Laporan</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="anggota_dataTables" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                                <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Tanggal</th>
                                    <th>Kitab</th>
                                    <th>Kontakan</th>
                                    <th>Kehadiran</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($result->report_members as $report)
                                        <tr>
                                            <td>{{ $report->id }}</td>
                                            <td>{{ $report->date_course }}</td>
                                            <td>{{ $report->book }}</td>
                                            <td>{{ $report->contact }}</td>
                                            <td>{{ $report->attendance }}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                    {{-- @foreach ($result as $member)
                                        @foreach ($member->report_members()->get() as $report)  
                                                <tr>
                                                    <td>{{ $report->id }}</td>
                                                    <td>{{ $report->date_course }}</td>
                                                    <td>{{ $report->book }}</td>
                                                    <td>{{ $report->contact }}</td>
                                                    <td>{{ $report->attendance }}</td>
                                                    <td></td>
                                                </tr>
                                        @endforeach
                                    @endforeach --}}
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">No</th>
                                    <th rowspan="1" colspan="1">Tanggal</th>
                                    <th rowspan="1" colspan="1">Kitab</th>
                                    <th rowspan="1" colspan="1">Kontakan</th>
                                    <th rowspan="1" colspan="1">Kehadiran</th>
                                    <th rowspan="1" colspan="1"></th>
                                </tr>
                                </tfoot>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $("#anggota_dataTables").DataTable();   
        });
    </script>
@endsection