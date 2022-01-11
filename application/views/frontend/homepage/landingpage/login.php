<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | e-Notaris</title>
    <link rel="stylesheet" href="<?= base_url('/assets/css/login.css') ?>" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
</head>

<body>
    <section>
        <div class="imgBx">
            <img draggable="false" src="<?= base_url('/assets/img/notarisloginbg.jpg') ?>" alt="" />
        </div>

        <div class="contentBx">
            <div class="formBx">
                <img draggable="false" src="<?= base_url('/assets/img/enotarislogo.png') ?>" alt="" />
                <h2>Login e-Notaris</h2>
                <h3>Notaris dan PPAT Sherli Hardhyarti, S.H. M.KN.,
                </h3>
                <?php
                    $pesan = $this->session->flashdata('pesan');
                    if (!empty($pesan) && $pesan['status_pesan'] == true) {
                        echo '<div class = "alert alert-success">' . $pesan['isi_pesan'] . '</div>';
                    } else if (!empty($pesan) && $pesan['status_pesan'] == false) {
                        echo '<div class = "alert alert-danger">' . $pesan['isi_pesan'] . '</div>';
                    }
                ?>
                <form action="<?= base_url('auth/proses_login') ?>" method="POST">
                    <div class="nop">
                        <span>Email :</span>
                        <input placeholder="Masukkan email" type="text" name="email" required />


                    </div>
                    <div class="nop">
                        <span>Password :</span>
                        <input placeholder="Masukkan password" type="password" name="password" required/>


                    </div>
                    <div class="inputBx2">

                        <button class="submit" type="submit" style="text-decoration: none;">
                            Login
                            <img class="imgIcon" src="<?= base_url('assets/img/loginIcon.png') ?>" alt="" />
                        </button>
                    </div>


                    <div class="credit">
                        <h3>Belum Punya Akun ? <a href="<?php echo site_url('auth/register') ?>" style="color: #fff">
                                Daftar</a></h3>


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