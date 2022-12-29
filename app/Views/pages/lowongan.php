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
                <?php echo form_open('page/search')   ?>
                    <input type="text" name="keyword" placeholder="Position, Job Description, Salary, .....">
                    <button type="submit">Search</button>
                <?php echo form_close()   ?>
                <table>
                    <?php foreach($viewdata as $key):  ?>
                    <tr>
                        <td>
                            <?php echo form_open('page/detail') ?>
                                <input type="hidden" name="keyword" value="<?= $key['id_lowongan']?>">
                                <button class="box-lowongan" type="submit" style="border: none;">
                                    <h1><?=  $key['posisi'];   ?></h1>
                                    <p class="desc"><?= $key['job_desk']; ?></p>
                                    <p class="timeline"><?= $key['tipe_kontrak']; ?></p>
                                </button>
                            <?php echo form_close()   ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?= $pager->links('lowongan', 'lowongan_pagination') ?>
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