<?= $this->extend('/baseMain'); ?>
<?= $this->section('this-page'); ?>  
    <div class="sidebar-content">
        <ul>
            <li><h1>Job</h1></li>
            <li class="this-page"><img src="<?= base_url('assets/img/home-solid.svg'); ?>" alt="" class="icon" width="30"></span><span class="title">Job Vacancy</span></li>
            <li><a href="enroll"><img src="<?= base_url('assets/img/Vectorwhite.svg'); ?>" alt="" class="icon" width="20"><span class="title">Enrollment History</span></a></li>
        </ul>
    </div>
    <div class="sidebar-content">
        <ul>
            <li><h1>Jobseeker</h1></li>
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
                <a href="profile"><?= $userInfo[0]['nama']; ?></a>
            </div>

            <div class="content-main">
                <h1>Job Vacancy</h1>
                <table>
                    <tr>
                        <td>
                            <div class="lowongan-box">
                                <h1 style="font-size:2rem;"><?= $viewdata[0]['posisi']; ?></h1>
                                <div class="text-lowongan">
                                    <h6>Description : </h6>
                                    <p class="desc"><?= $viewdata[0]['job_desk']; ?></p>
                                </div>
                                <div class="text-lowongan">
                                    <h6>Contract :  </h6>
                                    <p class="timeline"><?= $viewdata[0]['tipe_kontrak']; ?></p>
                                </div>
                                <div class="text-lowongan">
                                    <h6> Tertiary Education :  </h6>
                                    <p class="timeline"><?= $viewdata[0]['pendidikan_terakhir']; ?></p>
                                </div>
                                <div class="text-lowongan">
                                    <h6>Experience :  </h6>
                                    <p class="timeline"><?= $viewdata[0]['pengalaman_kerja']; ?></p>
                                </div>
                                <div class="text-lowongan">
                                    <h6>Salary :  </h6>
                                    <p class="timeline"><?= $viewdata[0]['gaji']; ?></p>
                                </div>
                                <?php echo form_open('page/apply') ?>
                                    <input type="hidden" name="id_lowongan" value="<?= $viewdata[0]['id_lowongan']; ?>">
                                    <button class="simpan-apply" type="submit">Apply</button>
                                <?php echo form_close()   ?>
                            </div>
                            </a>
                        </td>
                    </tr>
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