<?= $this->extend('/baseMain'); ?>
<?= $this->section('this-page'); ?>
<div class="sidebar-content">
    <ul>
        <li>
            <h1>Job</h1>
        </li>
        <li><a href="lowongan"><img src="<?= base_url('assets/img/home-solidwhite.svg'); ?>" alt="" class="icon" width="20"></span><span class="title">Job Vacancy</span></a></li>
        <li class="this-page"><img src="<?= base_url('assets/img/Vector.svg'); ?>" alt="" class="icon" width="25"></span><span class="title">Enrollment History</span></a></li>
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
<div class="content-lowongan">
    <div class="content-header">
        <a href="<?= site_url('auth/logout'); ?>">Logout</a>
        <a href="profile"><?= $userInfo[0]['nama']; ?></a>
    </div>
    <div class="content-main">
        <h1>Enrollment History</h1>
        <table border=1 class="table-lowongan">
        <thead>
            <tr>
                <th>No</th>
                <th>Perusahaan</th>
                <th>Posisi</th>
                <th>Contract</th>
                <th>Gaji</th>
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
                    <td><?= $key->nama_perusahaan; ?></td>
                    <td><?= $key->posisi; ?></td>
                    <td><?= $key->tipe_kontrak; ?></td>
                    <td><?= $key->gaji; ?></td>
                    <td><?= "waiting"; ?></td>
                </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
    </div>
</div>
<?= $this->endSection('content'); ?>