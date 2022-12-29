<?= $this->extend('/baseMain'); ?>
<?= $this->section('this-page'); ?>
<div class="sidebar-content">
    <ul>
        <li>
            <h1>Job</h1>
        </li>
        <li><a href="lowonganAll"><img src="<?= base_url('assets/img/home-solidwhite.svg'); ?>" alt="" class="icon" width="30"></span><span class="title">Home</span></a></li>
        <li class="this-page"><img src="<?= base_url('assets/img/Vector.svg'); ?>" alt="" class="icon" width="25"></span><span class="title">Job Vacancy Company</span></li>
    </ul>
</div>
<div class="sidebar-content">
    <ul>
        <li>
            <h1>Company</h1>
        </li>
        <li><a href="compProfile"><img src="<?= base_url('assets/img/user-solid 1white.svg'); ?>" alt="" class="icon" width="20"><span class="title">Company Information</span></a></li>
    </ul>
</div>
<?= $this->endSection('this-page'); ?>
<?= $this->section('content'); ?>
<div class="content-lowongan">
    <div class="content-header">
        <a href="<?= site_url('compauth/logout'); ?>">Logout</a>
        <a href="profile"><?= $compInfo[0]['nama_perusahaan']; ?></a>
    </div>
    <div class="content-main">
        <h1>Job Vacancy</h1>
        <?php echo form_open('page/searchComp');   ?>
        <input type="text" name="keyword" placeholder="Position, Job Description, Salary, .....">
        <button type="submit">Search</button>
        <?php echo form_close(); ?>
        <div class="create-lowongan">
            <a href="/compcrud/createlowongan">Buat Lowongan</a>
        </div>
        <table border=1 class="table-lowongan">
            <thead>
                <tr>
                    <th>Gaji</th>
                    <th>Posisi</th>
                    <th>Job Description</th>
                    <th>Contract</th>
                    <th>Tertiary Education</th>
                    <th>Experience</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($viewdata as $key) :  ?>
                    <tr>
                        <td><?= $key->gaji; ?></td>
                        <td><?= $key->posisi; ?></td>
                        <td><?= $key->job_desk; ?></td>
                        <td><?= $key->tipe_kontrak; ?></td>
                        <td><?= $key->pendidikan_terakhir; ?></td>
                        <td><?= $key->pengalaman_kerja; ?></td>
                        <td>
                            <a href="/compcrud/updatelowongan/<?= $key->id_lowongan; ?>">Update</a> 
                            | 
                            <a href="/compcrud/deletelowongan/<?= $key->id_lowongan; ?>" onclick="return confirm('Anda yakin ingin delete?')">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
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