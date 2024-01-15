@extends('admin.layouts.main')

@section('container')
 <!--content-->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active">Data User</li>
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
                <h3 class="card-title">Data User</h3>
                <hr>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover" id="example2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username </th>
                            <th>No Telp</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                  @foreach($pelanggan as $data)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->namalengkap_user }}</td>
                        <td>{{ $data->username }}</td>
                        <td>{{ $data->telpon_user }}</td>
                      
                        <td>
                          <img src="{{ asset('storage/' . $data->foto_user) }}" alt="foto" width="100">
                        </td>
                        <td>
                        <div class="btn-group">
                        <form action="/admin/user/delete/{{ $data->id_user }}" method="post">
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