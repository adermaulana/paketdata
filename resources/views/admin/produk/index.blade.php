@extends('admin.layouts.main')

@section('container')
<!--content-->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Produk</li>
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
                <h3 class="card-title">Data Produk</h3>
                <hr>
                <a href='/admin/produk/tambah' class="btn btn-info">Tambah Data <i class = "fas fa-plus-circle"></i></a>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover" id="example2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Operator</th>
                            <th>Deskripsi </th>
                            <th>Paket</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                  @foreach ($produk as $data)
                      <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td> {{ $data->kategori->nama_kategori }} </td>
                        <td> {{ $data->deskripsi_barang }} </td>
                        <td> {{ $data->paket_barang }} </td>
                        <td>Rp {{ number_format($data->harga_barang, 0, ',', '.') }}</td>
                        <td> {{ $data->stok_barang }} </td>
                        <td>
                          <img src=" {{ asset('storage/' . $data->foto_barang) }} " alt="foto" width="100">
                        </td>
                        <td>
                          <div class="btn-group">
                          <a href="/admin/produk/edit/{{ $data->id_barang }}"  class="btn btn-info btn-flat">
                        <i class="fas fa-edit"></i>
                        </a>
                        <form action="/admin/produk/delete/{{ $data->id_barang }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('Yakin Hapus?');"
                            class="btn btn-danger btn-flat">
                            <i class ="fas fa-trash"></i>
                            </button>
                        </form>
                          </div>
                        </td>
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