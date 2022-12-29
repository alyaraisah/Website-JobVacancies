<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/style.css'); ?>">
    <title>VACANCYJB</title>
</head>
<body>
        <div class="header-nav-bar">
            <nav class="nav-logo">
                <a href="/" class="logo">VACANCYJB</a>
            </nav>
            <nav class="nav-link">
                <span class="link"><a class="sign-up" href="register">Sign Up</a></span>
                <a class="link" href="Auth">Sign In</a>
                <a class="link" href="hire">Hire Now</a>
            </nav>
        </div>
        
        <div class="container">
            <?= $this->renderSection('content'); ?>
            <div class="footer">
            <div class="row-1">
                <div class="footer-logo">
                    VACANCYJB
                </div>
            </div>

            <div class="row-2">
                <div class="article">
                    <p>Latest Blog Post</p><br>
                    <p>Ready to get started?</p><br>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolores consequatur quibusdam porro
                        modi, delectus dignissimos inventore sed assumenda quas aperiam?</p>
                </div>
            </div>

            <div class="row-3">
                <div class="wraper">
                    <div class="row-3-1">
                        <div class="product">
                            <p>Product</p><br>
                            <p>Product</p><br>
                            <p>Product</p><br>
                            <p>Product</p><br>
                            <p>Product</p><br>
                        </div>
                    </div>

                    <div class="row-3-2">
                        <div class="company">
                            <p>Company</p><br>
                            <p>Company</p><br>
                            <p>Company</p><br>
                            <p>Company</p><br>
                            <p>Company</p><br>
                        </div>
                    </div>
                </div>
                <p class="privacy">@2010-2020</p>
            </div>
        </div>
        </div>
        
</body>
</html>