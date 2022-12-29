<?= $this->extend('/baseCom'); ?>
<?= $this->section('content'); ?>
<div class="login-container">
    <div class="login-box">
        <h1>Login as Company</h1>
        <?php if (!empty(session()->getFlashdata('fail'))) : ?>
            <div><?= session()->getFlashdata('fail'); ?></div>
        <?php endif ?>
        <?php if (!empty(session()->getFlashdata('success'))) : ?>
            <div><?= session()->getFlashdata('success'); ?></div>
        <?php endif ?>
        <form action="<?= base_url('compauth/check'); ?>" method="post">
            <div>
                <input type="text" name="companyEmail" placeholder="Email Company" value="<?= set_value('companyEmail'); ?>"><br>
                <span><?= isset($validation) ? display_error($validation, 'companyEmail') : ""; ?></span>
            </div>
            <div>
                <input type="password" name="companyPassword" placeholder="Password"><br>
                <span><?= isset($validation) ? display_error($validation, 'companyPassword') : ""; ?></span>
            </div>

            <a href="#" style="margin-left: 62.5%; text-decoration: none;">forgot password?</a><br>
            <input style="margin-top: 1rem;" type="submit" name="submit" id="" value="Sign In">
            <div>
                <span> <a href="<?= site_url('/hire'); ?>" style=" text-decoration: none;">create account</a><br></span>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection('content'); ?>