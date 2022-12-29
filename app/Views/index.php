<?= $this->extend('/baseLanding'); ?>
<?= $this->section('content'); ?>
        <div class="content">
            <div class="search-box">
                <form name="cari" method="post">
                    <p>Feature That Is Amazing</p>
                    <input class="search" name="search" placeholder="search" autocomplete="off">
                    <button class="submit" type="submit" name="cari">Search</button>
                </form>
            </div>
            <div class="hero">
            </div>
        </div>


        <div class="lowongan">
            <h1>Career opportunities easily await.</h1>
            <h2>"if you don't try this app, you won't becom the superhero you were meant to be"</h2>
            <div class="box-container">
                <div class="box">
                    <p>Careers at Astra Financial</p>
                    <div class="hero">
                        <img src="assets/img/Astra.png">
                    </div>
                    <button><a href="#">Kunjungi</a></button>
                </div>

                <div class="box">
                    <p>Careers at PT.Berkat Hijau</p>
                    <div class="hero">
                        <img src="assets/img/burung.png">
                    </div>
                    <button><a href="#">Kunjungi</a></button>
                </div>

                <div class="box">
                    <p>Careers at BANK BTPN</p>
                    <div class="hero">
                        <img src="assets/img/BCA.png">
                    </div>
                    <button><a href="#">Kunjungi</a></button>
                </div>
            </div>
        </div>
<?= $this->endSection('content'); ?>