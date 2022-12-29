<?= $this->extend('/baseMain'); ?>
<?= $this->section('this-page'); ?>
<div class="sidebar-content">
    <ul>
        <li>
            <h1>Job</h1>
        </li>
        <li class="this-page"><img src="<?= base_url('assets/img/home-solid.svg'); ?>" alt="" class="icon" width="30"></span><span class="title">Job Vacancy</span></li>
        <li><a href="enroll"><img src="<?= base_url('assets/img/Vectorwhite.svg'); ?>" alt="" class="icon" width="20"><span class="title">Enrollment History</span></a></li>
    </ul>
</div>
<div class="sidebar-content">
    <ul>
        <li>
            <h1>Jobseeker</h1>
        </li>
        <li><a href="profile"><img src="<?= base_url('assets/img/user-solid 1white.svg'); ?>" alt="" class="icon" width="20"><span class="title">Jobseeker Information</span></a></li>
    </ul>
</div>
<?= $this->endSection('this-page'); ?>
<?= $this->section('content'); ?>
<!--
        <div class="btn">
            <img src="img/aset-btn.svg" alt="20">
        </div>
        -->
<div class="content-lowongan">
    <div class="content-header">
        <a href="<?= site_url('auth/logout'); ?>">Logout</a>
        <a href="profile"><?= $compInfo[0]['nama_perusahaan']; ?></a>
    </div>
    <div class="content-main">
        <h1>Appliers</h1>
        <table border=1 class="table-lowongan">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telf</th>
                    <th>Pengalaman</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($viewdata->getResult() as $key) :
                ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $key->nama; ?></td>
                        <td><?= $key->email; ?></td>
                        <td><?= $key->no_telp; ?></td>
                        <td><?= $key->nama_Pengalaman; ?></td>
                        <td><?= "waiting"; ?></td>
                    </tr>
                <?php $i++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!--
    <script>
        $('.btn').click(function(){
            $(this).toggleClass("click");
        })

    </script>
    -->
<?= $this->endSection('content'); ?>