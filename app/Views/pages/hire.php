<?= $this->extend('/baseCom'); ?>
<?= $this->section('content'); ?>
<div class="login-container">
    <div class="hire-box">
        <h1>Your Company Information</h1>
        <?php if (!empty(session()->getFlashdata('fail'))) : ?>
            <div><?= session()->getFlashdata('fail'); ?></div>
        <?php endif ?>
        <?php if (!empty(session()->getFlashdata('success'))) : ?>
            <div><?= session()->getFlashdata('success'); ?></div>
        <?php endif ?>
        <form action="<?= base_url('compauth/save'); ?>" method="post">
            <?= csrf_field(); ?>

            <div class="bisection">
                <div>
                    <input type="text" name="companyName" placeholder="Company Name" value="<?= set_value('companyName'); ?>"><br>
                    <span><?= isset($validation) ? display_error($validation, 'companyName') : ""; ?></span>
                </div>

                <!-- <input type="text" name="email" placeholder="Your Email"><br> -->
                <div>
                    <input type="password" name="companyPassword" placeholder="Password"><br>
                    <span><?= isset($validation) ? display_error($validation, 'companyPassword') : ""; ?></span>
                </div>

            </div>
            <div class="bisection">
                <div>
                    <input type="text" name="companyEmail" placeholder="Company Email" value="<?= set_value('companyEmail'); ?>"><br>
                    <span><?= isset($validation) ? display_error($validation, 'companyEmail') : ""; ?></span>
                </div>

                <!-- <input type="text" name="fullname" placeholder="Your Fullname"><br> -->
                <div>
                    <input type="password" name="cpass" placeholder="Confirm Password"><br>
                    <span><?= isset($validation) ? display_error($validation, 'cpass') : ""; ?></span>
                </div>

                <a href="loginCompany" style="margin-left: 50%; text-decoration: none;">have account?</a>
                <input style="margin-top: 1rem;" type="submit" name="submit" id="" value="Sign Up">
            </div>
        </form>
    </div>
</div>
<?= $this->endSection('content'); ?>