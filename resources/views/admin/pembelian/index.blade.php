@extends('admin.layouts.main')

@section('container')

<!--content-->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Laporan Pembelian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active">Laporan Pembelian</li>
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
                <h3 class="card-title">Laporan Pembelian</h3>
                <hr>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover" id="example2">
                    <thead>
                        <tr>
                            <th>Id Pembelian</th>
                            <th>Nama Operator</th>
                            <th>harga</th>
                            <th>Tanggal Transaksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($pembelian as $data)
                      <tr>
                          <td> {{ $loop->iteration }} </td>
                          <td>{{ $data->transaksi->barang->kategori->nama_kategori }}</td>
                          <td>Rp {{ number_format($data->transaksi->harga_paket_transaksi, 0, ',', '.') }}</td>
                          <td>{{ $data->transaksi->tgl_transaksi }}</td>
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

@endsection