<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register | e-Notaris</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('/assets/img/favicon.ico') ?>" />
    <link rel="stylesheet" href="<?= base_url('/assets/css/login.css') ?>" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/vendor/sweetalert/dist/sweetalert2.min.css') ?>">
    <script type="text/javascript" src="<?= base_url('assets/vendor/sweetalert/dist/sweetalert2.all.min.js') ?>"></script>
</head>

<body>
    <?php
    $pesan = $this->session->flashdata('pesan');
    if (!empty($pesan)) {
        if ($pesan['status_pesan'] == true) {
            echo '
                    <script>
                        Swal.fire({
                            title: "Berhasil",
                            text: "' . $pesan['isi_pesan'] . '",
                            type: "success",
                            confirmButtonText: "Close"
                        });
                    </script>';
        } else if ($pesan['status_pesan'] == false) {
            echo '
                    <script>
                        Swal.fire({
                            title: "Gagal",
                            text: "' . $pesan['isi_pesan'] . '",
                            type: "error",
                            confirmButtonText: "Close"
                        });
                    </script>';
        }
    }
    ?>
    <section>
        <div class="imgBx">
            <img draggable="false" src="<?= base_url('/assets/img/notarisloginbg.jpg') ?>" alt="" />
        </div>

        <div class="contentBx">
            <div class="formBx">
                <br>
                <br>
                <h2>Register e-Notaris</h2>
                <h3>Notaris dan PPAT Sherli Hardhyarti, S.H. M.KN.,
                </h3>

                <?php
                $pesan = $this->session->flashdata('pesan');
                if (!empty($pesan) && $pesan['status_pesan'] == true) {
                    echo '<div class = "alert alert-success">' . $pesan['isi_pesan'] . '</div>';
                } else if (!empty($pesan) && $pesan['status_pesan'] == false && !empty($pesan['error'])) {
                    echo '<div class = "alert alert-danger">' . $pesan['error'] . '</div>';
                }
                ?>

                <form action="<?= base_url('auth/proses_register') ?>" method="POST">
                    <div class="nop">
                        <span>Nama</span>
                        <input placeholder="Masukkan nama" type="text" name="nama" required />
                    </div>
                    <div class="nop">
                        <span>Email</span>
                        <input placeholder="Masukkan email" type="text" name="email" required />
                    </div>
                    <div class="nop">
                        <span>Password</span>
                        <input placeholder="Masukkan password" type="password" name="password1" required />
                    </div>
                    <div class="nop">
                        <span>Konfirmasi Password</span>
                        <input placeholder="Masukkan ulang password" type="password" name="password2" required />
                    </div>
                    <div class="inputBx2">

                        <button class="submit" type="submit" style="text-decoration: none;">
                            Daftar
                            <img class="imgIcon" src="<?= base_url('assets/img/loginIcon.png') ?>" alt="" />
                        </button>
                    </div>


                    <div class="credit">
                        <h3>Sudah Punya Akun ? <a href="<?php echo site_url('auth') ?>" style="color: #fff">
                                Login</a></h3>


                    </div>
                </form>

            </div>
        </div>
    </section>
    <script>
        $(":input").inputmask();
    </script>
</body>

</html>