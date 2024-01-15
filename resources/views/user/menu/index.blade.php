  @extends('admin.layouts.main')

  @section('container')

      <!--content-->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Data Menu</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/user">Home</a></li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
          <div class="container-fluid">
            <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Pilih Katogori</h3>
                </div>
                <div class="card-body">
                <form action="/user/menu/cari" method="get" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <select class="form-control" name="id_kategori" required>
                                <option value="" disabled selected>Pilih Kategori</option>
                                @foreach($allkategori as $data)
                                    <option value="{{ $data->id_kategori }}">{{ $data->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-2">
                            <button type="submit" name="set" class="btn btn-success">Set</button>
                        </div>
                    </div>
                </form>
                </div>
                <!-- /.card-body -->
              </div>
            </div>

            <div class="container">
    @foreach($kategori as $k)
            <h5 class="mb-2">{{ $k->nama_kategori }}</h5>
          <div class="row">
          
          @forelse($produk->where('id_kategori', $k->id_kategori) as $produkItem)
              <div class="col-md-6 col-sm-6 col-12">
                  <form action="/user/menu/bayar" method="post" enctype="multipart/form-data" class="text-dark">
                    @csrf
                    <input type="hidden" name="id_barang" value="{{ $produkItem->id_barang }}">
                    <input type="hidden" name="harga_paket_transaksi" value="{{ $produkItem->harga_barang }}">
                    <input type="hidden" name="status_paket_transaksi" value="Belum Bayar">
                    <input type="hidden" name="tgl_transaksi" value="{{ now()->timezone('Asia/Makassar')->format('Y-m-d H:i:s') }}">

                      <div class="info-box">
                          <span class="info-box-icon" style="width: 100px; height: 100px">
                              <img style="width: 100px; height: 100px; object-fit: contain" src="{{ asset('storage/' . $produkItem->foto_barang) }}" alt="{{ $produkItem->nama_produk }}">
                          </span>

                          <div class="info-box-content">
                              <span class="info-box-text">{{ $produkItem->deskripsi_barang }}</span>
                              <span class="info-box-text">{{ $produkItem->paket_barang }}</span>
                              <span class="info-box-number">Rp. {{ number_format($produkItem->harga_barang, 0, ',', '.') }}</span>

                              <button type="submit" class="btn btn-success">Beli</button>
                          </div>
                          <!-- /.info-box-content -->
                      </div>
                  </form>
                  <!-- /.info-box -->
              </div>
          @empty
              <div class="col-md-12">
                  <p class="text-danger">Stok Kosong</p>
              </div>
          @endforelse

      </div>
      <!-- /.row -->
  @endforeach

  

  </div>

        </div>
      <!-- /.content -->

  @endsection