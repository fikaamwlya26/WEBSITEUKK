<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekom Beauty</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    
    <!-- FontAwesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Open+Sans:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    
    
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="../img/logo.png" alt="Logo" style="height: 40px;">
            <span class="ms-2" style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 20px; color: white;">Rekom Beauty</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <img src="img/Toggler.png" alt="Toggler">
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="mynavbar">
                <ul class="navbar-nav" id="navbar">
                    <li class="nav-item"><a class="nav-link" href="#hero-section" data-section="hero-section">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang-kami" data-section="tentang-kami">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="#ProductSection" data-section="gallerySection">Product</a></li>

                    <!-- Search Icon -->
                    <li class="nav-item">
                        <a href="#search" class="nav-link">
                            <i class="fas fa-search fa-lg"></i>
                        </a>
                    </li>

                    <!-- Cek apakah user sudah login -->
                    @if(Auth::check())
                        <!-- Jika sudah login, tampilkan nama user -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-family: inherit;">
                                <i class="fas fa-user-circle fa-lg"></i> <span>{{ Auth::user()->nama }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('user1.index') }}">
                                    Logout
                                </a>
                            </div>
                        </li>
                    @else
                        <!-- Jika belum login, tampilkan tombol login -->
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link btn btn-primary text-white px-3">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>


        <!-- Hero Section -->
        <section id="hero-section" class="hero-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 text-lg-start text-center">
                        <h1>kami bisa</h1>
                        <h1>Membantu Menyediakan</h1>
                        <h1>Inspirasi Produk Kecantikan Anda</h1>
                        <p>Rekom Beauty hadir untuk temukan produk kecantikan terbaik untukmu,sebagai rekomendasi untuk memilih produk beauty!</p>
                        <a href="#our-services-section" class="btn btn-pink">Selengkapnya</a>
                    </div>
                    <div class="col-lg-6 text-center">
                        <div class="about-images">
                            <img class="about-main" src="img/1.jpg" alt="Gambar Utama">
                            <img class="about-inset" src="img/2.jpg" alt="Gambar Inset">
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!--tentang kami-->
        <div class="container-fluid bg-light py-5" id="tentang-kami">
            <div class="container">
                <section class="our-services-section" id="our-services-section">
                    <div class="row align-items-center">
                        <!-- Kolom Teks (Kiri) -->
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="img-service text-center">
                                <img src="{{ asset('img/tentang.jpg') }}" alt="Our Service">
                            </div>
                        </div>

                        <!-- Kolom Gambar (Kanan) -->
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="desc-service">
                                <h2 class="section-title">Tentang Kami - Rekom Beauty</h2>
                                <p class="section-subtitle">Rekom Beauty adalah platform rekomendasi produk kecantikan yang dibuat khusus untuk kamu, para wanita yang ingin tampil percaya diri dan menemukan produk terbaik sesuai kebutuhan.
                                                            Kami memahami bahwa memilih produk kecantikan tidak selalu mudah. Banyaknya pilihan di pasaran bisa membingungkan — mulai dari skincare, makeup, hingga produk perawatan tubuh.
                                                            Di sinilah Rekom Beauty hadir untuk membantu!</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

         <!-- section cari-->
        <section class="center-container" id="search">
            <div class="text-center text-white mb-4">
                <h1 class="fw-bold">Temukan Product Kecantikan Impianmu</h1>
                <p>Sekarang Anda dapat menemukan solusi semua masalah kecantikan disini, mulai dari Scincare, Bodycarem Haircare dan make up, dengan ratusan product untuk Anda.</p>
            </div>

            <form action="{{ route('user1.product') }}" method="GET" class="search-box bg-white rounded">
                <input name="query" class="form-control border-0" type="text" placeholder="Cari berdasarkan nama" aria-label="Search">
                <button class="btn text-white" type="submit">
                    Cari
                </button>
            </form>
        </section>

        <!-- Section Product -->
        <div class="container-fluid bg-light py-5">
            <div class="container">
                <section id="ProductSection" class="gallery-section">
                    <h2 class="text-center gallery-header">
                        @if(isset($query) && $query != '') 
                            Hasil Pencarian untuk "{{ $query }}"
                        @else
                            Koleksi Produk Rekom-Beauty
                        @endif
                    </h2>
                    <p class="text-center gallery-subtitle">Koleksi terbaik dari berbagai produk</p>

                    <div class="row">
                        @if($products->isNotEmpty())
                            @foreach($products->take(4) as $product)
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                    <div class="card gallery-card">
                                        <a href="{{ route('user1.detail', $product->id) }}">
                                            <img src="{{ asset('storage/product/' . $product->image) }}" class="img-fluid rounded-top gallery-img" alt="{{ $product->nama }}">
                                        </a>
                                        <div class="card-body text-center">
                                            <h5 class="gallery-title">{{ $product->nama }}</h5>
                                            <p class="gallery-desc">{{ $product->deskripsi }}</p>
                                            <p class="gallery-price">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                                            <p class="gallery-stock">Stok: {{ $product->stok }}</p>
                                            
                                            <div class="d-flex justify-content-center gap-2">
                                                <!-- Tombol Like -->
                                                <button class="btn btn-like" id="likeBtn-{{ $product->id }}" onclick="toggleLike({{ $product->id }})">
                                                    <i class="fas fa-heart"></i>
                                                </button>
                                                <!-- Tombol Tambah ke Keranjang -->
                                                <a href="{{ route('user1.detail', $product->id) }}" class="btn btn-pink">
                                                    <i class="fas fa-eye"></i> Lihat Detail
                                                </a>

                                            </div>

                                            <!-- Form Komentar (Disembunyikan Awal) -->
                                            <div id="komentarForm-{{ $product->id }}" class="mt-3" style="display: none;">
                                                @if(auth()->check())
                                                    <form action="" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        <div class="form-group">
                                                            <textarea name="komentar" class="form-control" placeholder="Tulis komentar..." required></textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-pink mt-2">Kirim</button>
                                                    </form>
                                                @else
                                                    <p>Silakan <a href="{{ route('login') }}">login</a> untuk berkomentar.</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-center text-danger">Produk tidak ditemukan.</p>
                        @endif
                    </div>

                    <!-- Tombol Selengkapnya -->
                    <div class="text-end mt-1">
                        <a href="{{ route('user1.product') }}" class="btn btn-pink">Tampilkan Selengkapnya</a>
                    </div>
                </section>
            </div>
        </div>


        <section class="footer-section">
            <div class="overlay"></div>
            <div class="container py-5 position-relative">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="address">
                            <h5 class="fw-bold">Contact Us</h5>
                            <p class="mb-1">Jalan Lebak No. 272 Kota Lebak 567000</p>
                            <p class="mb-1">Fikaamaliya@gmail.com</p>
                            <p>088-200-716-9189</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-4">
                        <div class="navigation">
                            <h5 class="fw-bold">Quick Links</h5>
                            <ul class="list-unstyled">
                                <li><a href="#" class="text-white text-decoration-none">Our Services</a></li>
                                <li><a href="#" class="text-white text-decoration-none">Home</a></li>
                                <li><a href="#" class="text-white text-decoration-none">Product</a></li>
                                <li><a href="#" class="text-white text-decoration-none">Search</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="navigation">
                            <h5 class="fw-bold">Connect with Us</h5>
                            <ul class="list-unstyled d-flex">
                                <li class="me-3"><a href="https://www.facebook.com/"><img src="{{ asset('img/icon_facebook.png') }}" alt="Facebook" class="social-icon"></a></li>
                                <li class="me-3"><a href="https://www.instagram.com/"><img src="{{ asset('img/icon_instagram.png') }}" alt="Instagram" class="social-icon"></a></li>
                                <li class="me-3"><a href="https://www.twitter.com/"><img src="{{ asset('img/icon_twitter.png') }}" alt="Twitter" class="social-icon"></a></li>
                                <li class="me-3"><a href="https://www.gmail.com/"><img src="{{ asset('img/icon_mail.png') }}" alt="Email" class="social-icon"></a></li>
                                <li class="me-3"><a href="#"><img src="{{ asset('img/icon_twitch.png') }}" alt="Twitch" class="social-icon"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>




    


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Tambahkan JavaScript untuk menangani dropdown -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dropdownToggle = document.getElementById('userDropdown');
            const dropdownMenu = dropdownToggle.nextElementSibling; // Mengambil elemen <ul> dropdown menu

            // Menambahkan event listener untuk mengontrol dropdown
            dropdownToggle.addEventListener('click', function (e) {
                // Mencegah aksi default dan toggle visibilitas menu
                e.preventDefault();
                dropdownMenu.classList.toggle('show'); // Menampilkan/menyembunyikan dropdown saat klik
            });

            // Menutup dropdown jika klik di luar menu
            document.addEventListener('click', function (e) {
                if (!dropdownToggle.contains(e.target) && !dropdownMenu.contains(e.target)) {
                    dropdownMenu.classList.remove('show');
                }
            });
        });
    </script>

        <!-- JavaScript untuk Menampilkan Form Komentar -->
    <script>
        function toggleForm(fotoId) {
            var form = document.getElementById("komentarForm-" + fotoId);
            if (form.style.display === "none") {
                form.style.display = "block";
            } else {
                form.style.display = "none";
            }
        }
    </script>

        <!-- JavaScript untuk Like -->
        <script>
<script>
    function toggleLike(fotoId) {
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        let likeBtn = document.getElementById(`likeBtn-${fotoId}`);

        fetch('/like', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            body: JSON.stringify({ foto_id: fotoId })
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message); // Tampilkan pesan sukses
            likeBtn.classList.toggle('liked'); // Tambahkan efek liked
        })
        .catch(error => console.error('Error:', error));
    }
</script>

<!-- jQuery & Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- Script Owl Carousel -->
<script>
    $(document).ready(function(){
        var owl = $("#testimoniCarousel");

        owl.owlCarousel({
            loop: true,
            margin: 15,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 3000,
            responsive:{
                0:{ items: 1 },
                768:{ items: 2 },
                992:{ items: 3 }
            }
        });

        // Navigasi manual
        $("#prevBtn").click(function(){
            owl.trigger('prev.owl.carousel');
        });

        $("#nextBtn").click(function(){
            owl.trigger('next.owl.carousel');
        });
    });
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    let navLinks = document.querySelectorAll(".nav-link");

    function setActiveLink() {
        let fromTop = window.scrollY;

        navLinks.forEach(link => {
            let section = document.querySelector(link.getAttribute("href"));

            if (
                section.offsetTop <= fromTop + 100 &&
                section.offsetTop + section.offsetHeight > fromTop + 100
            ) {
                navLinks.forEach(nav => nav.classList.remove("active"));
                link.classList.add("active");
            }
        });
    }

    window.addEventListener("scroll", setActiveLink);
    setActiveLink(); // Panggil saat halaman dimuat
});
</script>




    
<!-- Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
