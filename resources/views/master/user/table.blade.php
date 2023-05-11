<div class="table table-responsive dataTables_wrapper dt-bootstrap4">
    <table class="table table-bordered table-striped dataTable dtr-inline collapsed" id="anggota_datatables">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No. HP</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function () {
        $("#anggota_dataTables").DataTable();
    });
</script>
