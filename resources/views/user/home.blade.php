@section('title') {{ 'Home' }}@endsection
@extends('user.layout')
@section('content')

<!-- ======= hero Section ======= -->
<section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="20000">

            <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <div class="carousel-item active mt-2" style="background-image: url({{ asset('storage/home/hero1.jpg') }});">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">Selamat Datang <br> Perpustakaan Digital
                            </h2>
                            <a href="/login" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get
                                Started</a>
                        </div>
                    </div>
                </div>

                @foreach ($home as $hom)
                {{-- {{ dd($hom->gambar) }} --}}
                <div class="carousel-item mt-2" style="background-image: url({{ asset('storage/home/'.$hom->gambar) }});">
                    <div class="carousel-container">
                        <div class="container position-absolute top-50 start-50 translate-middle">
                            <h2 class="animate__animated animate__fadeInDown">{{ $hom['judul'] }}</h2>
                            <a href="/perpus" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>
    </div>
</section><!-- End Hero Section -->



<!-- ======= About Us Section ======= -->
<section id="about">
    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h3>About Us</h3>
        </header>

        <h6 class="text-center pr-2 pl-2">Kami adalah sebuah platform perpustakaan digital yang berkomitmen untuk menyediakan akses mudah terhadap berbagai sumber daya digital, termasuk buku elektronik, artikel, dan materi edukasi lainnya. Visi kami adalah membuat pengetahuan dapat diakses oleh semua orang, di mana pun, dan kapan pun. Terima kasih telah bergabung dengan Perpustakaan Digital kami. Selamat menikmati dan teruslah belajar!</h6>

    </div>
</section><!-- End About Us Section -->




<!-- script for chart -->
<script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/chart.js/chart.umd.js"></script>
<script src="/assets/vendor/echarts/echarts.min.js"></script>
@endsection
