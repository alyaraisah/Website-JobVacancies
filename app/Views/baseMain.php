<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/style.css'); ?>">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>VACANCYJB</title>
</head>
<body>
    <!-- Sidebar -->
    <div class="outer-container">
        <!--
        <div class="btn">
            <img src="img/aset-btn.svg" alt="20">
        </div>
        -->
        <div class="sidebar">
            <nav class="sidebar-logo">
                <a href="lowongan">VACANCYJB</a>
            </nav>
            <?= $this->renderSection('this-page'); ?>
        </div>

        
        <?= $this->renderSection('content'); ?>
    </div>
</body>
</html>