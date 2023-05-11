@extends('layouts.global')

@section('content-header')
    Anggota    
@endsection

@section('content-body')
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Daftar Anggota</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <button class="btn btn-sm btn-success mb-2" onclick="addData()">Tambah Anggota</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="anggota_dataTables" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                                <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No.Hp</th>
                                    <th>Amanah</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($result as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td>{{ $user->no_hp }}</td>
                                            <td>{{ $user->jabatan }}</td>
                                            <td>
                                                @if ( $user->status == 0 )
                                                    <span class="badge badge-success">Admin</span>
                                                @elseif( $user->status == 1 )
                                                    <span class="badge badge-warning">Pelajar</span>
                                                @elseif( $user->status == 2 )
                                                    <span class="badge badge-info">Karyawan</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-warning">EDIT</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">No</th>
                                    <th rowspan="1" colspan="1">Nama</th>
                                    <th rowspan="1" colspan="1">Adress</th>
                                    <th rowspan="1" colspan="1">No. HP</th>
                                    <th rowspan="1" colspan="1">Amanah</th>
                                    <th rowspan="1" colspan="1">Status</th>
                                </tr>
                                </tfoot>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambah-anggota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Form Tambah</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <form class="form-horizontal" id="form-anggota">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                {{-- <input type="password" class="form-control" id="inputPassword3" placeholder="Password"> --}}
                                <select name="jabatan" id="jabatan" class="form-control custom-select">
                                    <option disabled selected>Pilih Jabatan</option>
                                    <option value="admin">Admin</option>
                                    <option value="dosen">Musyrif</option>
                                    <option value="pj">PJ</option>
                                    <option value="ajm">AJM</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_hp" class="col-sm-2 col-form-label">No. HP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor HP">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                {{-- <input type="password" class="form-control" id="inputPassword3" placeholder="Password"> --}}
                                <select name="status" id="status" class="form-control custom-select">
                                    <option disabled selected>Pilih Status</option>
                                    <option value="1">Pelajar</option>
                                    <option value="2">Karyawan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea name="address" id="address" class="form-control" cols="30" rows="5" placeholder="Alamat Lengkap"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="simpan()">Simpan</button>
                </div>
            </form>
          </div>
        </div>
      </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $("#anggota_dataTables").DataTable();   
        });

        function addData() {
            $("#tambah-anggota").modal("show")
        }

        function simpan() {
            let data = $("#form-anggota").serialize();
            // console.log(data);
            $.ajax({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "{{ route('anggota.post') }}",
                data: data,
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    console.log("berhasil");
                }
            });
        }
    </script>
@endsection