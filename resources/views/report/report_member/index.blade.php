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
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('member.index') }}" class="btn btn-primary btn-sm">
                            <strong>KEMBALI</strong>
                        </a>
                        <h5 class="card-title">
                            Laporan Anggota
                            <strong>{{ $result->name }}</strong>
                        </h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <button type="button" class="btn btn-sm btn-success mb-2"data-bs-toggle="modal" onclick="showModal()" data-bs-target="#modalAdd">Tambah Laporan</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
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
                                                @if ($report->attendance == 1)
                                                    <td>
                                                        <span class="badge badge-success">HADIR</span>
                                                    </td>
                                                @elseif ($report->attendance == 2)
                                                    <td>
                                                        <span class="badge badge-warning">TERLAMBAT</span>
                                                    </td>
                                                @elseif ($report->attendance == 3)
                                                    <td>
                                                        <span class="badge badge-danger">ABSEN</span>
                                                    </td>
                                                @endif
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-warning">EDIT</a>
                                                    <a href="#" class="btn btn-sm btn-danger">HAPUS</a>
                                                </td>
                                            </tr>
                                        @endforeach
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
    </div>

        <!-- Modal -->
        <div class="modal fade" id="modalAdd" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">LAPORAN</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-report">
                            @csrf
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="member_id">Nama</label>
                                <select class="form-control" name="member_id" id="member_id" disabled>
                                    <option value="{{ $result->id }}" selected>{{ $result->name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="date_course">Tanggal</label>
                                <input type="date" name="date_course" id="date_course" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="book">Kitab</label>
                                <input type="text" name="book" id="book" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="contact">Kontakan</label>
                                <textarea name="contact" id="contact" cols="5" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Kehadiran</label>
                                {{-- <p></p> --}}
                                <div class="d-flex justify-content-between">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input custom-control-input-success" type="radio" id="hadir" name="attendance" value="1">
                                        <label for="hadir" class="custom-control-label">Hadir</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input custom-control-input-warning" type="radio" id="terlambat" name="attendance" value="2">
                                        <label for="terlambat" class="custom-control-label">Terlambat</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input custom-control-input-danger" type="radio" id="absen" name="attendance" value="3">
                                        <label for="absen" class="custom-control-label">Absen</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="evidence">Keterangan</label>
                                <textarea name="evidence" id="evidence" cols="5" rows="3" class="form-control"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="save()">Save changes</button>
                    </div>
                </div>
            
            </div>
            
        </div>
@endsection
@section('script')
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {
            $("#anggota_dataTables").DataTable();   
        });

        function showModal() {
            $("#modalAdd").modal("show");
        }

        function save() {
            let date_course = $("#date_course").val()
            let book = $("#book").val()
            let attendance = $("input[name='attendance']:checked").val()
            let evidence = $("#evidence").val()
            let contact = $("#contact").val()
            let id = $("#id").val()
            let member_id = $("#member_id").val()
            let _token = "{{ csrf_token() }}"

            console.log(contact);

            $.ajax({
                type: "post",
                url: "{{ route('report_member.store') }}",
                data: {
                    id, date_course, book, contact, attendance, evidence, member_id, _token
                },
                dataType: "json",
                success: function (response) {
                    Swal.fire(
                        'Good job!',
                        response.message,
                        'success'
                    )
                    console.log(response);
                },
                error: function (response) {
                    console.error(response);
                }
            });
        }
    </script>
@endsection