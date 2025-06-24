<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Indo GoPermit</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/accept-terms-not-css.css" />

    <link href="css/templatemo-topic-listing.css" rel="stylesheet">
    <link rel="stylesheet" href="css/wave.css" />
    {{-- @vite('resources/css/app.css') --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <!--

TemplateMo 590 topic listing

https://templatemo.com/tm-590-topic-listing

-->
</head>

<body id="top">
    <main>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="images/LOGO 2.png" alt="" style="width: 136px">
                </a>

                <div class="d-lg-none ms-auto me-4">
                    <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-5 me-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_1">Beranda</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_2">Jenis Perizinan</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_3">Cara Kerja</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_4">FAQs</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_5">Kontak</a>
                        </li>

                    </ul>

                    <div class="d-none d-lg-block">
                        <a href="{{ route('login') }}" class="navbar-icon bi-person smoothscroll flex">
                            <span class="masuk">Masuk</span>
                        </a>
                    </div>

                </div>
            </div>
        </nav>


        <section id="section_1">
            <div class="header">
                <!--Content before waves-->
                <div class="inner-header flex justify-center row align-items-center">
                    <div class="col-6 text-start" style="margin-left: 2rem">
                        <h1 class="font-bold fw-bold"><b>Indo GoPermit</b></h1>
                        <span class="text-start">Selamat datang di GoPermit, platform terintegrasi yang
                            memudahkan
                            Anda
                            mengurus
                            berbagai jenis
                            izin dengan cepat, transparan, dan efisien. Nikmati kemudahan proses perizinan melalui
                            sistem
                            digital kami yang dirancang untuk menghemat waktu dan meminimalisir kerumitan
                            birokrasi.</span>
                        <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6 pt-3">
                            <button class="section2_btn btn2" type="button">Ajukan Perizinan <i
                                    class="bi bi-send"></i></button>
                        </div>
                        {{-- <div class="d-flex justify-content-center h-100">
                            <div class="search">
                                <input class="search_input" type="text" name="" placeholder="Search here...">
                                <a href="#" class="search_icon"><i class="fa fa-search"></i></a>
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-4">
                        <img src="{{ asset('images/Accept terms.svg') }}" alt="" style="width: 80%">
                    </div>
                </div>

                <!--Waves Container-->
                <div class="">
                    <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                        <defs>
                            <path id="gentle-wave"
                                d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                        </defs>
                        <g class="parallax">
                            <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                            <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                            <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                            <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
                        </g>
                    </svg>
                </div>
                <!--Waves end-->
            </div>
            <!--Header ends-->
        </section>

        <section class="explore-section section-padding" id="section_2">
            <div class="container">
                <div class="row">

                    <div class="col-12 text-center">
                        <h2 class="mb-4">Jenis Perizinan</h1>
                            <span>Berbagai jenis perizinan yang kami layani meliputi Perizinan Pendidikan & Lembaga
                                Kursu, Perizinan Pariwisata dan Hiburan, Perizinan Kesehatan dan Kecantikan dengan
                                regulasi yang berlaku.</span>
                    </div>

                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="design-tab-pane" role="tabpanel"
                                aria-labelledby="design-tab" tabindex="0">
                                <div class="row pt-5">
                                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                        <div class="custom-block bg-white shadow-lg">
                                            <a href="topics-detail.html">
                                                <div class="d-flex">
                                                    <div>
                                                        <h5 class="mb-2">Perizinan Kesehatan & Kecantikan</h5>

                                                        <p class="mb-0">untuk operasional fasilitas medis, klinik,
                                                            atau usaha di bidang kecantikan sesuai regulasi yang
                                                            berlaku.
                                                        </p>
                                                    </div>
                                                </div>

                                                <img src="{{ asset('images/landing/hospita.png') }}"
                                                    class="custom-block-image img-fluid" alt="">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                        <div class="custom-block bg-white shadow-lg">
                                            <a href="topics-detail.html">
                                                <div class="d-flex">
                                                    <div>
                                                        <h5 class="mb-2">Perizinan Pendidikan & Lembaga Kursus</h5>

                                                        <p class="mb-0">untuk mendirikan, mengoperasikan, atau
                                                            mengelola institusi pendidikan dan kursus sesuai peraturan
                                                            yang berlaku.</p>
                                                    </div>
                                                </div>

                                                <img src="{{ asset('images/landing/school_Artboard 1.png') }}"
                                                    class="custom-block-image img-fluid" alt="">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="custom-block bg-white shadow-lg">
                                            <a href="topics-detail.html">
                                                <div class="d-flex">
                                                    <div>
                                                        <h5 class="mb-2">Perizinan Pariwisata & Hiburan</h5>

                                                        <p class="mb-0">untuk menjalankan usaha di sektor pariwisata,
                                                            rekreasi, dan hiburan sesuai ketentuan yang berlaku.</p>
                                                    </div>
                                                </div>

                                                <img src="{{ asset('images/landing/hotel-02.png') }}"
                                                    class="custom-block-image img-fluid" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="marketing-tab-pane" role="tabpanel"
                                aria-labelledby="marketing-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-3">
                                        <div class="custom-block bg-white shadow-lg">
                                            <a href="topics-detail.html">
                                                <div class="d-flex">
                                                    <div>
                                                        <h5 class="mb-2">Perizinan Kesehatan & Kecantikan</h5>

                                                        <p class="mb-0">untuk operasional fasilitas medis, klinik,
                                                            atau usaha di bidang kecantikan sesuai regulasi yang
                                                            berlaku.</p>
                                                    </div>

                                                    <span class="badge bg-advertising rounded-pill ms-auto">30</span>
                                                </div>

                                                <img src="{{ asset('images/howtowork.png') }}"
                                                    class="custom-block-image img-fluid" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
        </section>

        <section class="timeline-section section-padding" id="section_3">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-12 text-center">
                        <h2 class="text-white mb-4">Bagaimana GoPermit berjalan?</h1>
                    </div>

                    <div class="col-lg-10 col-12 mx-auto">
                        <div class="timeline-container">
                            <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                                <div class="list-progress">
                                    <div class="inner"></div>
                                </div>

                                <li>
                                    <h4 class="text-white mb-3">Pengajuan</h4>

                                    <p class="text-white">Pengguna mengisi formulir dan mengunggah dokumen persyaratan
                                        melalui sistem perizinan online. Setelah pengajuan dikirim, pengguna menerima
                                        nomor registrasi untuk melacak status permohonan.
                                    </p>

                                    <div class="icon-holder">
                                        <i class="bi-search"></i>
                                    </div>
                                </li>

                                <li>
                                    <h4 class="text-white mb-3">Verifikasi & Proses</h4>

                                    <p class="text-white">Admin meninjau kelengkapan dan keabsahan dokumen yang
                                        diajukan oleh pengguna. Jika ada kekurangan, pengguna akan mendapatkan
                                        notifikasi untuk melakukan perbaikan atau melengkapi dokumen.</p>

                                    <div class="icon-holder">
                                        <i class="bi-bookmark"></i>
                                    </div>
                                </li>

                                <li>
                                    <h4 class="text-white mb-3">Persetujuan & Penerbitan</h4>

                                    <p class="text-white">Jika permohonan disetujui, izin diterbitkan dalam bentuk
                                        digital dan dapat diunduh oleh pengguna. Jika ditolak, sistem akan memberikan
                                        alasan penolakan serta opsi untuk mengajukan ulang dengan perbaikan.
                                    <div class="icon-holder">
                                        <i class="bi-book"></i>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="faq-section section-padding" id="section_4">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12">
                        <h2 class="mb-4">Frequently Asked Questions</h2>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-lg-5 col-12">
                        <img src="{{ asset('images/landing/FAQs.png') }}" class="img-fluid" alt="FAQs">
                    </div>

                    <div class="col-lg-6 col-12 m-auto">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        Jenis perizinan apa saja yang dapat diajukan?
                                    </button>
                                </h2>

                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Pengguna dapat mengajukan perizinan di berbagai sektor, seperti Pendidikan &
                                        Lembaga Kursus, Pariwisata & Hiburan, serta Kesehatan & Kecantikan.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        Bagaimana cara mengajukan perizinan?
                                    </button>
                                </h2>

                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Pengguna cukup membuat akun kemudian login, menyiapkan dokumen yang diperlukan,
                                        memilih jenis izin, mengisi formulir, dan
                                        mengunggah dokumen yang diperlukan melalui sistem online.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        Berapa lama waktu proses perizinan?
                                    </button>
                                </h2>

                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Waktu proses bervariasi tergantung pada jenis izin dan kelengkapan dokumen,
                                        namun pengguna dapat memantau status permohonan yang diajukan.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                        aria-expanded="false" aria-controls="collapseFour">
                                        Siapa yang bisa saya hubungi jika mengalami kendala?
                                    </button>
                                </h2>

                                <div id="collapseFour" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Jika mengalami kendala, pengguna dapat menghubungi layanan bantuan melalui
                                        kontak yang tersedia di platform Indo GoPermit.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer section-padding" id="section_5">
        <div class="container">
            <div class="row">

                <h3 class="contact"><strong>Kontak</strong></h3>

                <div class="col-4 mr-8">
                    <iframe class="google-map"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.549561488665!2d115.22992867579441!3d-8.639166591407383!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd23f8661ef31cd%3A0x663c45c04ca4cfb3!2sPT.%20Indo%20Apps%20Solusindo%20-%20Apps%20%26%20Web%20Development%20%7C%20Software%20Services%20%7C%20Seo%20Services%20di%20Bali%20%7C%20Domain%20%26%20Hosting%20%7C%20IoT!5e0!3m2!1sid!2sid!4v1741935235522!5m2!1sid!2sid"
                        width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col">
                    <h6 class="site-footer-title mb-3">Resources</h6>

                    <ul class="site-footer-links">
                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Home</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">How it works</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">FAQs</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Contact</a>
                        </li>
                    </ul>
                </div>

                <div class="col mb-lg-0">
                    <h6 class="site-footer-title mb-3">Information</h6>

                    <p class="text-white d-flex mb-1">
                        <a href="mailto:partners@indoapps.id" class="site-footer-link">
                            Email: partners@indoapps.id
                        </a>
                    </p>

                    <p class="text-white d-flex">
                        <a href="wa/me.+62 81228840166" class="site-footer-link">
                            Phone: +62 81228840166
                        </a>
                    </p>
                    <p class="text-white d-flex">
                        <a href="https://www.indoapps.id" class="site-footer-link">
                            Website: www.indoapps.id
                        </a>
                    </p>
                    <p class="text-white d-flex">
                        <span class="site-footer-link">Jl. Ganetri IV No.4, Tonja, Kec. Denpasar Utara, Kota Denpasar,
                            Bali 80237</span>
                    </p>
                </div>

                <div class="col">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            English</button>

                        <ul class="dropdown-menu">
                            <li><button class="dropdown-item" type="button">Thai</button></li>

                            <li><button class="dropdown-item" type="button">Myanmar</button></li>

                            <li><button class="dropdown-item" type="button">Arabic</button></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </footer>


    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>