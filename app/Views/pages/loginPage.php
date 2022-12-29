<?= $this->extend('/baseLanding'); ?>
<?= $this->section('content'); ?>
<div class="login-container">
    <div class="login-box">
        <h1>Login as Jobseeker</h1>
        <form action="<?= base_url('auth/check'); ?>" method="post">
            <?= csrf_field(); ?>

            <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                <div><?= session()->getFlashdata('fail'); ?></div>
            <?php endif ?>
            <div>
                <input type="text" name="email" placeholder="email" value="<?= set_value('email'); ?>"><br>
                <span><?= isset($validation) ? display_error($validation, 'email') : ''; ?></span>
            </div>
            <div>
                <input type="password" name="password" placeholder="password"><br>
                <span><?= isset($validation) ? display_error($validation, 'password') : ''; ?></span>
            </div>
            <div>
                <a href="#" style="margin-left: 62.5%; text-decoration: none;">forgot password?</a><br>
            </div>
            <div>
                <input style="margin-top: 1rem;" type="submit" name="submit" id="" value="Sign In">
            </div>
            <div>
                <a href="register">create new account</a>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection('content'); ?>