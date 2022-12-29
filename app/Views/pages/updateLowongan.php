<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Lowongan</title>
</head>

<div class="sidebar-content">
    <ul>
        <li>
            <h1>Job</h1>
        </li>
        <li><a href="lowonganAll"><img src="<?= base_url('assets/img/home-solidwhite.svg'); ?>" alt="" class="icon" width="30"></span><span class="title">Home</span></a></li>
        <li><a href="crud_job"><img src="<?= base_url('assets/img/Vectorwhite.svg'); ?>" alt="" class="icon" width="25"></span><span class="title">Job Vacancy Company</span></a></li>
    </ul>
</div>
<div class="sidebar-content">
    <ul>
        <li>
            <h1>Company</h1>
        </li>
        <li class="this-page"><img src="<?= base_url('assets/img/user-solid 1.svg'); ?>" alt="" class="icon" width="25"><span class="title">Company Information</span></li>
    </ul>
</div>

<div class="content-lowongan">
    <div class="content-header">
        <a href="<?= site_url('compauth/logout'); ?>">Logout</a>
        <a href="profile"><?= $compInfo[0]['nama_perusahaan']; ?></a>
    </div>
    <div class="content-main">
        <h1 style="margin-bottom: -45px;">Job Information</h1>
    </div>

    <div id="main_content">
        <p style="border-top: 1px solid #5A81BB; width: 100%; border-width: 3px;"></p>
        <br>

        <div id="page_content">
            <form action="<?= base_url('compauth/updateCompProfile'); ?>" id="input_profile" method="post">
            <body>
                <?php
                echo session()->get('loggedComp');
                // dd($lowonganInfo);
                ?>
                <form action="/compcrud/update/<?= $lowonganInfo['id_lowongan']; ?>" method="POST">
                    <?= csrf_field(); ?>
                    <div>
                        <label for="gaji">Gaji</label>
                        <input type="text" name="gaji" id="input" value="<?= $lowonganInfo['gaji']; ?>">
                        <span><?= isset($validation) ? display_error($validation, 'gaji') : ""; ?></span>
                    </div>
                    <div>
                        <label for="posisi">Posisi</label>
                        <input type="text" name="posisi" id="input" value="<?= $lowonganInfo['posisi']; ?>">
                        <span><?= isset($validation) ? display_error($validation, 'posisi') : ""; ?></span>
                    </div>
                    <div>
                        <p class="formfield">
                            <label style="vertical-align: middle;" for="jobDesk">Job Desk</label>
                            <textarea type="text" name="jobDesk" id="input" cols="29" rows="3" value="<?= $lowonganInfo['job_desk']; ?>"></textarea>
                            <span><?= isset($validation) ? display_error($validation, 'jobDesk') : ""; ?></span>
                        </p>
                    </div>
                    <div>
                        <label for="tipeKontrak">Tipe Kontrak</label>
                        <input type="text" name="tipeKontrak" id="input" value="<?= $lowonganInfo['tipe_kontrak']; ?>">
                        <span><?= isset($validation) ? display_error($validation, 'tipeKontrak') : ""; ?></span>
                    </div>
                    <div>
                        <label for="pendidikan">Pendidikan</label>
                        <input type="text" name="pendidikan" id="input" value="<?= $lowonganInfo['pendidikan_terakhir']; ?>">
                        <span><?= isset($validation) ? display_error($validation, 'pendidikan') : ""; ?></span>
                    </div>
                    <div>
                        <label for="pengalaman">Pengalaman</label>
                        <input type="text" name="pengalaman" id="input" value="<?= $lowonganInfo['pengalaman_kerja']; ?>">
                        <span><?= isset($validation) ? display_error($validation, 'pengalaman') : ""; ?></span>
                    </div>
                    <div>
                        <input type="submit" name="submit" value="update" id="simpan">
                    </div>
                </form>
            </body>
            </form>
        </div>
    </div>
</div>

</html>