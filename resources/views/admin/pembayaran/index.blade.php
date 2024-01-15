@extends('admin.layouts.main')

@section('container')

 <!--content-->
 <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Konfirmasi Pembayaran</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./">Home</a></li>
                        <li class="breadcrumb-item active">Konfirmasi Pembayaran</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Konfirmasi Pembayaran</h3>
                            <hr>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover" id="example2">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id Pembelian</th>
                                    <th>Id Transaksi</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Nama User</th>
                                    <th>No Telpon</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($pembayaran as $data)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td> {{ $data->id_pembayaran }} </td>
                                        <td>{{ $data->id_transaksi }}</td>
                                        <td><a href="{{ asset('storage/' . $data->bukti_pembayaran) }}" target="_blank">Lihat Bukti</a>
                                        </td>
                                        <td>{{ $data->user->namalengkap_user }}</td>
                                        <td>{{ $data->user->telpon_user }}</td>
                                        @if($data->status_pembayaran == 2)
                                        <td>
                                            Lunas
                                        </td>
                                        @else
                                        <td>
                                            <!-- Form konfirmasi lunas dapat ditambahkan di sini -->
                                            <form id="konfirmasiForm{{ $data->id_pembayaran }}" method="post" action="/admin/pembayaran/konfirmasi/{{ $data->id_pembayaran }}">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="status_pembayaran" value="2">
                                                <button class="btn btn-success btn-flat" type="button" onclick="konfirmasiLunas('{{ $data->id_pembayaran }}')"><i class="fas fa-print"></i></button>
                                            </form>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <script>
    function konfirmasiLunas(formId) {
        Swal.fire({
            title: 'Konfirmasi Pembayaran',
            text: 'Apakah Anda yakin ingin membayar?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Bayar!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna menekan "Ya", kirim formulir
                document.getElementById('konfirmasiForm'+ formId).submit();
            }
        });
    }
</script>

@endsection