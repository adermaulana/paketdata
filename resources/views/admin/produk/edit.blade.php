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
              <li class="breadcrumb-item"><a href="/admin/produk">Home</a></li>
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
              <form action="/admin/produk/edit/{{ $produk->id_barang }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                      <div class="form-group">
                        <label>Nama Barang</label>
                        <select class="form-control" name="id_kategori" required>
                        <option value="" disabled selected >Pilih Kategori</option>
                        @foreach($kategori as $data)

                        @if(old('id_kategori',$produk->id_kategori) == $data->id_kategori)
                        <option value="{{ $data->id_kategori }}" selected> {{ $data->nama_kategori }} </option>
                        @else
                        <option value="{{ $data->id_kategori }}"> {{ $data->nama_kategori }} </option>
                        @endif
                        @endforeach
                    </select>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi_barang" value="{{ $produk->deskripsi_barang }}" id="exampleInputEmail1" placeholder="Enter Barang">
                    </div>
                    <div class="form-group">
                            <label for="exampleInputEmail1">Paket</label>
                            <input type="text" class="form-control" name="paket_barang" value="{{ $produk->paket_barang }}" id="exampleInputEmail1" placeholder="Enter Paket">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga</label>
                        <input type="number" class="form-control" name="harga_barang" value="{{ $produk->harga_barang }}" id="exampleInputEmail1" placeholder="Enter Harga">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Stok</label>
                        <input type="number" class="form-control" name="stok_barang" value="{{ $produk->stok_barang }}" id="exampleInputEmail1" placeholder="Enter Stok">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Gambar</label>
                    </div>
                    <div class="input-group">
                        <div class="">
                            <input class="form-control mb-3" type="file" id="foto_barang" name="foto_barang" onchange="previewImage()">
                            <input type="hidden" name="oldImage" class="custom-file-input" value="{{ $produk->foto_barang }}" id="exampleInputFile">
                            @if($produk->foto_barang)
                            <img src="{{ asset('storage/' . $produk->foto_barang) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                            @else
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            @endif
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

    <script>

    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const ofReader = new FileReader();
        ofReader.readAsDataURL(image.files[0]);

        ofReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }

    </script>


@endsection