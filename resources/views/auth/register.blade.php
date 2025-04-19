<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">


</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"
                        style="background-image: url('{{ asset('img/register.png') }}'); background-size: cover; background-position: center; border-right: 2px solid #ccc;">
                    </div>

                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Daftar Sekarang!!!</h1>
                            </div>
                            <form action="{{ route('register.simpan') }}" method="POST" enctype="multipart/form-data" class="user">
                                @csrf
                                <div class="form-group">
                                    <input name="nama" type="text" class="form-control form-control-user @error('nama') is-invalid @enderror" placeholder="Nama Lengkap">
                                    @error('nama')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input name="alamat" type="text" class="form-control form-control-user @error('alamat') is-invalid @enderror" placeholder="Alamat">
                                    @error('alamat')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input name="tanggal_lahir" type="date" class="form-control form-control-user @error('tanggal_lahir') is-invalid @enderror" placeholder="Tanggal Lahir">
                                    @error('tanggal_lahir')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input name="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" placeholder="Email">
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="password_confirmation" type="password" class="form-control form-control-user @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">Daftar</button>
                            </form>

                            <hr>

                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Sudah Daftar? Masuk!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js')}}"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelector(".custom-file-input").addEventListener("change", function(e) {
            // Ambil nama file yang dipilih
            var fileName = e.target.files[0] ? e.target.files[0].name : "Pilih Gambar...";
            // Update label input dengan nama file yang dipilih
            var label = e.target.nextElementSibling;
            label.innerText = fileName;
        });
    });
</script>


</body>

</html>