<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>e-Notaris</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />


    <link rel="shortcut icon" href="https://web.situbondokab.go.id/tema/kominfo_kab_situbondo/favicon.png">
    <link rel="apple-touch-icon" sizes="114x114" href="https://web.situbondokab.go.id/tema/kominfo_kab_situbondo/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="https://web.situbondokab.go.id/tema/kominfo_kab_situbondo/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" href="https://web.situbondokab.go.id/tema/kominfo_kab_situbondo/apple-touch-icon.png">
    <link href="<?= base_url('/assets/img/favicon.png') ?>" rel="apple-touch-icon" />


    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet" />


    <link href="<?= base_url('/assets/vendor/aos/aos.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('/assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('/assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('/assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('/assets/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('/assets/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet" />


    <link href="<?= base_url('/assets/css/style.css') ?>" rel="stylesheet" />


</head>

<body>

    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                <h1 class="text-light">
                    <a href="<?= base_url('welcome') ?>"><img src="<?= base_url('/assets/img/enotarislogo.png') ?>" alt=""></a>
                </h1>

            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
                    <li><a class="nav-link scrollto" href="#layanan">Layanan</a></li>

                    <li><a class="nav-link scrollto" href="#clients">Pembayaran</a></li>

                    <li>
                        <a class="nav-link scrollto" href="#contact">Kontak Kami</a>
                    </li>

                    <a class="submit" href="<?= base_url('auth') ?>">
                        Login
                        <img class="imgIcon" src="<?= base_url('/assets/img/loginIcon.png') ?>" alt="" />
                    </a>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

        </div>
    </header>



    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row gy-4">
                <div class="
							col-lg-6
							order-2 order-lg-1
							d-flex
							flex-column
							justify-content-center
						">
                    <!-- <h3>Selamat datang di</h3> -->
                    <h1>
                        Layanan Notaris & PPAT <br />dengan menggunakan <br />teknologi Modern

                    </h1>

                    <button class="submit2" onclick="location.href='login.html'">
                        Konsultasi Gratis
                    </button>

                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                    <img draggable="false" src="<?= base_url('/assets/img/notaris.png') ?>" class="imgNotaris" alt="" />
                </div>
            </div>
        </div>
    </section>


    <main id="main">

        <section id="about" class="about">
            <div class="container">
                <h2 data-aos="fade-up" class="section-title text-center wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">Tentang e-Notaris</h2>
                <div class="row justify-content-between">
                    <div class="
								col-lg-6
								d-flex
								align-items-center
								justify-content-center
								about-img
							">
                        <img draggable="false" src="<?= base_url('/assets/img/pbb.png') ?>" class="img-fluid" alt="" data-aos="zoom-in" />
                    </div>
                    <div class=" col-lg-6
						d-flex
						align-items-center
						justify-content-center
						about-img">
                        <p data-aos="fade-up" data-aos-delay="100" style="text-align: justify; padding-top: 10px;   font-family: Poppins;
								font-style: normal;
								font-weight: normal;
								font-size: 18px;
								line-height: 150%;
								font-size: 15px;
								color: #64686d;">
                            &#8203 &#8203 &#8203 e-Notaris adalah salah suatu layanan Notaris dan PPAT dengan menggunakan teknologi Moden yang terbaru dan sudah berkembang.
                        </p>

                    </div>
                </div>
            </div>
        </section>


        <section id="layanan" style="background: linear-gradient(-90deg, #65b7ff, #005bea) " class="">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title text-center wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown; padding-bottom: 10px; color: #fff; box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);">Layanan Kami</h2>
                </div>

                <div class="row text-center" style="padding-top: 30px;">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="wow fadeInUp information-detail animated" data-wow-duration="400ms" data-wow-delay="0ms" style="visibility: visible; animation-duration: 400ms; animation-delay: 0ms; animation-name: fadeInUp;">
                            <img src="https://pajakonline.jakarta.go.id/../assets/setoran.png">
                            <h3 style="color: white;">Akta Tanah</h3>
                            <!-- <button type="button" class="btn-lg btn-warning">Pilih</button> -->

                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="wow fadeInUp information-detail animated" data-wow-duration="400ms" data-wow-delay="100ms" style="visibility: visible; animation-duration: 400ms; animation-delay: 100ms; animation-name: fadeInUp;">
                            <img src="https://pajakonline.jakarta.go.id/../assets/skpd.png">
                            <h3 style="color: white;">Pendirian CV/PT</h3>
                            <!-- <button type="button" class="btn-lg btn-warning">Pilih</button> -->

                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="wow fadeInUp information-detail animated" data-wow-duration="400ms" data-wow-delay="200ms" style="visibility: visible; animation-duration: 400ms; animation-delay: 200ms; animation-name: fadeInUp;">
                            <img src="https://pajakonline.jakarta.go.id/../assets/pelaporan.png">
                            <h3 style="color: white;">Waris</h3>
                            <!-- <button type="button" class="btn-lg btn-warning">Pilih</button> -->

                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="wow fadeInUp information-detail animated" data-wow-duration="400ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 400ms; animation-delay: 300ms; animation-name: fadeInUp;">
                            <img src="https://pajakonline.jakarta.go.id/../assets/lainnya.png">
                            <h3 style="color: white;">Lainnya</h3>
                            <!-- <button type="button" class="btn-lg btn-warning">Pilih</button> -->

                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section id="clients" class="clients section-bg">
            <div class="container" data-aos="fade-up">
                <h2 data-aos="fade-up" class="section-title text-center wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">Informasi Pembayaran</h2>
                <div class="imgPembayaran" style="display: block;
  margin-left: auto;
  margin-right: auto;
  width: 300px;
  padding-bottom: 20px;">
                    <img src="<?= base_url('/assets/img/pembayaran/bankBri.png') ?>" class="img-fluid" alt="" data-aos="fade-up" class="section-title text-center wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;" />
                </div>

                <h3 style="text-align: center;">7748-01-004303-53-6</h3>
                <p style="text-align: center;">BRI a/n <strong>Sherli Hardhyarti</strong> </p>

            </div>
        </section>

        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <h2 data-aos="fade-up" class="section-title text-center wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">Hubungi Kami</h2>

                <div class="row">
                    <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Alamat Kantor :</h4>
                                <p>Jl Mastrip V No.4, Sumbersari, Jember</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email :</h4>
                                <p>sherlynotaris@gmail.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Telp. :</h4>
                                <p>+62 852 5806 5041</p>
                            </div>

                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d246.83704772310847!2d113.72470328483682!3d-8.163125136753347!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd69589d7e64f6f%3A0x5565d7f71ef28810!2sNotaris%20SHERLI%20HARDHYARTI%20P.%2CS.H.%2CM.Kn!5e0!3m2!1sid!2sid!4v1641980354978!5m2!1sid!2sid" frameborder="0" style="border: 0; width: 100%; height: 290px" allowfullscreen></iframe>
                        </div>
                    </div>

                    <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <form action="forms/contact.html" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Nama :</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Masukkan nama anda" required />
                                </div>
                                <div class="form-group col-md-6 mt-3 mt-md-0">
                                    <label for="name">Email :</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email anda" required />
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="name">Subjek :</label>
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Masukkan subjek pesan" required />
                            </div>
                            <div class="form-group mt-3">
                                <label for="name">Pesan :</label>
                                <textarea class="form-control" name="message" rows="10" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">
                                    Pesan anda telah terkirim.
                                    Terima Kasih atas respon yang telah anda berikan.
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit">Kirim Pesan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer id="footer">



        <div class="footer-bot">
            <div class="copyright">
                &copy; Copyright 2021.
                <strong><span>Tim e-Notaris</span></strong> All Rights
                Reserved.
            </div>
        </div>
    </footer>


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


    <script src="<?= base_url('/assets/vendor/aos/aos.js') ?>"></script>
    <script src="<?= base_url('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('/assets/vendor/glightbox/js/glightbox.min.js') ?>"></script>
    <script src="<?= base_url('/assets/vendor/isotope-layout/isotope.pkgd.min.js') ?>"></script>
    <script src="<?= base_url('/assets/vendor/php-email-form/validate.js') ?>"></script>
    <script src="<?= base_url('/assets/vendor/swiper/swiper-bundle.min.js') ?>"></script>


    <script src="<?= base_url('/assets/js/main.js') ?>"></script>
</body>

</html>