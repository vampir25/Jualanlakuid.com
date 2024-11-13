@extends('pelanggan.layout.index')

@section('content')
    <div class="row mt-4 align-items-center">
        <div class="col-md-6">
            <div class="content-text">
            Tentang JualanLaku.id
            JualanLaku.id adalah platform e-commerce inovatif yang diluncurkan pada tahun 2024 dengan tujuan untuk menjadi solusi belanja online. Dengan fokus pada kualitas, kenyamanan, dan harga yang terjangkau, jualanlaku.id menawarkan produk dari berbagai fashion.
            Misi kami adalah untuk memberdayakan konsumen dengan memberikan akses mudah ke produk berkualitas tinggi dengan harga yang kompetitif, didukung oleh layanan pelanggan yang cepat dan responsif. Kami percaya bahwa setiap orang berhak mendapatkan pengalaman berbelanja yang menyenangkan, aman, dan efisien.
                </div>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('assets/images/logo toko 1.png') }}" style="width:60%;" alt="">
        </div>
    </div>

    <h4 class="text-center mt-md-5 mb-md-2">Contact Us</h4>
    <hr class="mb-5">
    <div class="row mb-md-5">
    <div class="d-flex justify-content-lg-between mt-5">
        <div class="d-flex align-items-center gap-4">
            <a href="=https://www.instagram.com/_iksanasmin?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank">
                <i class="fa-brands fa-square-instagram fa-3x"></i> Instagram
            </a>
        </div>
        <div class="d-flex align-items-center gap-4">
            <a href="https://maps.app.goo.gl/kJE9xk9iepin47J3A" target="_blank">
                <i class="fa-solid fa-location-dot fa-3x"></i> Lokasi
            </a>
        </div>
        <div class="d-flex align-items-center gap-4">
            <a href="https://wa.me/6281344123430" target="_blank">
                <i class="fa-brands fa-square-whatsapp fa-3x"></i> WhatsApp
            </a>
        </div>
    </div>
    </div>
    <!-- <div class="d-flex justify-content-lg-between mt-5">
        <div class="d-flex align-items-center gap-4">
            <a href="=https://www.instagram.com/_iksanasmin?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank">
                <i class="fa-brands fa-instagram fa-3x"></i> Instagram
            </a>
        </div>
        <div class="d-flex align-items-center gap-4">
            <a href="https://maps.app.goo.gl/kJE9xk9iepin47J3A" target="_blank">
                <i class="fa-brands fa-location_ond fa-3x"></i> Lokasi
            </a>
        </div>
        <div class="d-flex align-items-center gap-4">
            <a href="https://wa.me/6281344123430" target="_blank">
                <i class="fa-brands fa-whatsapp fa-3x"></i> WhatsApp
            </a>
        </div>
    </div>

    <h4 class="text-center mt-md-5 mb-md-2">Contact Us</h4>
    <hr class="mb-5">
    <div class="row mb-md-5">
        <div class="col-md-5">
            <div class="bg-secondary" style="width: 100%; height:50vh; border-radius:10px;"></div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-header text-center">
                    <h4>kritik dan saran</h4>
                </div>
                <div class="card-body">
                        <p class="p-0 mb-5 text-lg-center">Masukan kritik dan saran anda kepada aplikasi kami agar kami dapat memberikan apa yang menjadi kebutuhan anda dan kami dapat berkembang lebih baik lagi.
                        </p>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" value="" placeholder="Masukan email Anda">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="pesan" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pesan"  placeholder="Masukan sandi Anda">
                        </div>
                    </div>
                    <button class="btn btn-primary mt-4 w-100"> Kirim Pesan Anda</button>
                </div>
            </div> -->
        </div>
@endsection