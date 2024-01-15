@extends('admin.layouts.main')

@section('container')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Tambah Mahasiswa</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data Produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/admin/produk/tambah" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                      <div class="form-group">
                        <label>Nama Barang</label>
                        <select class="form-control" name="id_kategori" required>
                        <option value="" disabled selected >Pilih Kategori</option>
                        @foreach($kategori as $data)
                        <option value="{{ $data->id_kategori }}"> {{ $data->nama_kategori }} </option>
                        @endforeach
                    </select>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi_barang" id="exampleInputEmail1" placeholder="Enter Barang">
                    </div>
                    <div class="form-group">
                            <label for="exampleInputEmail1">Paket</label>
                            <input type="text" class="form-control" name="paket_barang" id="exampleInputEmail1" placeholder="Enter Paket">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga</label>
                        <input type="number" class="form-control" name="harga_barang" id="exampleInputEmail1" placeholder="Enter Harga">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Stok</label>
                        <input type="number" class="form-control" name="stok_barang" id="exampleInputEmail1" placeholder="Enter Stok">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Gambar</label>
                    </div>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="foto_barang" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Cari foto</label>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name ="simpan" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>



@endsection