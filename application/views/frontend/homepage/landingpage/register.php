<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register | e-Notaris</title>
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

                <h2>Register e-Notaris</h2>
                <h3>Notaris dan PPAT Sherli Hardhyarti, S.H. M.KN.,
                </h3>
                <form action="">
                    <div class="nop">
                        <span>Nama</span>
                        <input placeholder="Masukkan username" type="text" name="" />
                    </div>
                    <div class="nop">
                        <span>Email</span>
                        <input placeholder="Masukkan username" type="text" name="" />
                    </div>
                    <div class="nop">
                        <span>Password</span>
                        <input placeholder="Masukkan password" type="password" name="" />
                    </div>
                    <div class="nop">
                        <span>Konfirmasi Password</span>
                        <input placeholder="Masukkan ulang password" type="password" name="" />
                    </div>
                    <div class="inputBx2">

                        <a class="submit" href="<?php echo site_url('admin/dashboard') ?>" style="text-decoration: none;">
                            Daftar
                            <img class="imgIcon" src="<?= base_url('assets/img/loginIcon.png') ?>" alt="" />
                        </a>
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