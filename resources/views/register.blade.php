<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>REGISTRASI</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="/registrasi"><b>OKO</b>STORE</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
    <p class="">
        <marquee>Registrasi Pengguna Akun Baru OKO STORE</marquee></p>

      <form action="/registrasi" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="namalengkap_user" 
          class="form-control" placeholder="Nama Lengkap">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-address-card"></span>
            </div>
          </div>
          @error('namalengkap_user')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="text" name="username" 
          oninvalid="setCustomValidity('mohon isi username')"oninput="setCustomValidity('')" 
          required class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user-alt"></span>
            </div>
          </div>
          @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="text" name="telpon_user" id="phone-mask"
          oninvalid="setCustomValidity('mohon isi No Telp')"oninput="setCustomValidity('')" 
          required class="form-control" placeholder="telpon">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user-alt"></span>
            </div>
          </div>
          @error('telpon_user')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" 
          oninvalid="setCustomValidity('mohon isi password')"oninput="setCustomValidity('')" 
          required class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password_confirmation" 
          oninvalid="setCustomValidity('Harap isi konfirmasi password')"oninput="setCustomValidity('')" 
          required class="form-control" placeholder="Konfirmasi password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="input-group mb-3">
          <label for="" class="form-label">Upload Foto Profil</label>
           <div class="input-group">
           <input type="file" class="form-control" name="foto_user">
           <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-image"></span>
              </div>
            </div>
          </div>
        </div>
        <div class="row"> 
          <div class="col-4">
            <button type="submit" name="regis" class="btn btn-primary btn-block">Daftar</button>
          </div>
        </div>
      </form>
      <a href="/login" class="text-center">Sudah Punya Akun</a>
    </div>
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- SweetAlert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://unpkg.com/imask"></script>
<script>
  var phoneMask = IMask(
    document.getElementById('phone-mask'),{
      mask: '+62800-0000-0000'
    });
</script>

</body>
</html>
