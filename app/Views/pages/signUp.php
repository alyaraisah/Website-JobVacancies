<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/style.css'); ?>">
    <title>Register</title>
</head>
<?= $this->extend('/baseLanding'); ?>
<?= $this->section('content'); ?>
<body>
    <div class="sign-up-container">
        <div class="sign-up-box">
            <h1>Sign Up as Jobseeker</h1>
            <form action="<?= base_url('auth/save'); ?>" method="post">
                <?= csrf_field(); ?>
                <?php if(!empty(session()->getFlashdata('fail'))) :  ?>
                    <div><?= session()->getFlashdata('fail'); ?></div>
                <?php endif ?>

                <?php if(!empty(session()->getFlashdata('success'))) :  ?>
                    <div><?= session()->getFlashdata('success'); ?></div>
                <?php endif ?>
                <div>
                    <input type="text" name="fullname" placeholder="Full Name" value="<?= set_value('fullname'); ?>"><br>
                    <span><?= isset($validation) ? display_error($validation, 'fullname') : ''; ?></span>
                </div>
                <div>
                    <input type="text" name="email" placeholder="E-mail" value="<?= set_value('email'); ?>"><br>
                    <span><?= isset($validation) ? display_error($validation, 'email') : ''; ?></span>
                </div>
                <div>
                    <input type="password" name="password" placeholder="Password" value="<?= set_value('password'); ?>"><br>
                    <span><?= isset($validation) ? display_error($validation, 'password') : ''; ?></span>
                </div>
                <div>
                    <input type="password" name="cpassword" placeholder="Confirm Password" value="<?= set_value('cpassword'); ?>"><br>
                    <span><?= isset($validation) ? display_error($validation, 'cpassword') : ''; ?></span>
                </div>
                <div>
                    <input type="submit" name="submit" id="" value="Sign Up">
                </div>
                <div>
                    <a href="<?= site_url('Auth'); ?>">i already have account</a>
                </div>
        </div>
    </div>
</body>
<?= $this->endSection('content'); ?>
</html>