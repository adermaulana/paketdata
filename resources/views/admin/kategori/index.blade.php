@extends('admin.layouts.main')

@section('container')

    <!--content-->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kategori</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active">Kategori</li>
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
                <h3 class="card-title">Data kategori</h3>
                <hr>
                <a href='/admin/kategori/tambah' class="btn btn-info">Tambah Data <i class = "fas fa-plus-circle"></i></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover" id="example2">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA OPERATOR</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    @foreach($kategori as $data)
                      <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td> {{ $data->nama_kategori }} </td>
                        <td>
                        <div class="btn-group">
                        <a href="/admin/kategori/edit/{{ $data->id_kategori }}"  class="btn btn-info btn-flat">
                        <i class="fas fa-edit"></i>
                        </a>
                        <form action="/admin/kategori/delete/{{ $data->id_kategori }}" method="post">
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