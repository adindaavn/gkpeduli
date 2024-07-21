<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Meta -->
  <link rel="shortcut icon" href="{{ asset('assets/mars') }}/images/user.png" />

  <!-- Title -->
  <title>Log In</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <!-- *************
			************ Common Css Files *************
		************ -->

  <!-- Animated css -->
  <link rel="stylesheet" href="{{ asset('assets/mars') }}/css/animate.css" />

  <!-- Bootstrap font icons css -->
  <link rel="stylesheet" href="{{ asset('assets/mars') }}/fonts/bootstrap/bootstrap-icons.css" />

  <!-- Main css -->
  <link rel="stylesheet" href="{{ asset('assets/mars') }}/css/main.min.css" />

  <!-- sweeralert2 -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>

<body>
  <div class="container">
    <div class="row justify-content-center vh-100">
      <div class="col-xl-4 col-lg-5 col-sm-6 col-12 m-auto">
        <form action="{{ route('cek-login') }}" method="post" class="my-5">
          @csrf
          <div class="border rounded-2 p-4 mt-5">
            <div class="login-form">
              <h2 class="fw-bold mb-4">Peduli Diri</h2>
              <div class="mb-2">
                <label class="form-label" for="nik">NIK</label>
                <input type="number" id="nik" name="nik" class="form-control @error('nik') is-invalid @endError" placeholder="1514461614" value="{{ old('nik') }}" />
                @error('nik')
                <div class="alert alert danger p-0 m-0">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-2">
                <label class="form-label" for="nama">Nama</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @endError" placeholder="Brando Keren" value="{{ old('nama') }}" />
                @error('nama')
                <div class="alert alert danger p-0 m-0">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="d-grid py-3 mt-2">
                <button type="submit" class="btn btn-lg btn-info">LOGIN</button>
              </div>
              <div class="text-center">
                <span>Tidak terdaftar?</span>
                <a href="{{ url('register') }}" class="text-blue text-decoration-underline ms-2"> Sign Up</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- *************
			************ Required JavaScript Files *************
		************* -->
  <!-- Required jQuery first, then Bootstrap Bundle JS -->
  <script src="{{ asset('assets/mars') }}/js/jquery.min.js"></script>
  <script src="{{ asset('assets/mars') }}/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('assets/mars') }}/js/modernizr.js"></script>
  <script src="{{ asset('assets/mars') }}/js/moment.js"></script>

  <!-- *************
			************ Vendor Js Files *************
		************* -->

  <!-- Main Js Required -->
  <script src="{{ asset('assets/mars') }}/js/main.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="{{ asset('assets/adminlte') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
  @if ($message = Session::get('success'))
  <script>
    Swal.fire({
      title: "Berhasil!",
      text: '{{ $message }}',
      icon: "success",
    });
  </script>
  @endif
  @if ($message = Session::get('failed'))
  <script>
    Swal.fire({
      title: "Oops...",
      text: '{{ $message }}',
      icon: "error",
    });
  </script>
  @endif
</body>

</html>