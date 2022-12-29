<?= $this->extend('/baseMain'); ?>
<?= $this->section('this-page'); ?>
<div class="sidebar-content">
    <ul>
        <li>
            <h1>Job</h1>
        </li>
        <li><a href="lowongan"><img src="<?= base_url('assets/img/home-solidwhite.svg'); ?>" alt="" class="icon" width="30"></span><span class="title">Job Vacancy</span></a></li>
        <li><a href="enroll"><img src="<?= base_url('assets/img/Vectorwhite.svg'); ?>" alt="" class="icon" width="25"></span><span class="title">Enrollment History</span></a></li>
    </ul>
</div>
<div class="sidebar-content">
    <ul>
        <li>
            <h1>Jobseeker</h1>
        </li>
        <li class="this-page"><img src="<?= base_url('assets/img/user-solid 1.svg'); ?>" alt="" class="icon" width="25"><span class="title">Jobseeker Information</span></li>
    </ul>
</div>
<?= $this->endSection('this-page'); ?>
<?= $this->section('content'); ?>
<div class="content-lowongan">
    <div class="content-header">
        <a href="<?= site_url('auth/logout'); ?>">Logout</a>
        <a href="profile"><?= $userInfo[0]['nama']; ?></a>
    </div>
    <div class="content-main">
        <h1>Jobseeker Information</h1>
            <div class="drag-area">
                <?php echo form_open('page/detail') ?>
                    <header>Upload Profile Picture</header>
                    <span></span>
                    <button><i class="fa fa-upload"></i> &nbsp;&nbsp;Browse File</button>
                    <input type="file" hidden>
                    <input type="submit">
                <?php echo form_close()   ?>
            </div>        
    </div>

    <div id="main_content">
        <li class="selected" id="page1" onclick="change_tab(this.id);">Data Diri</li>
        <li class="notselected" id="page2" onclick="change_tab(this.id);">Riwayat Pendidikan</li>
        <li class="notselected" id="page3" onclick="change_tab(this.id);">Pengalaman</li>
        <br><br>
        <p style="border-top: 1px solid #5A81BB; width: 100%; border-width: 3px;"></p>
        <br><br>
        <div class='hidden_desc' id="page1_desc">
            <form action="<?= base_url('page/updateProfile'); ?>" id="input_profile" method="post">
                <div class="row">
                    <div class="column">
                        <label>Nama</label>
                        <input type="text" name="nama" id="input" value="<?= $userInfo[0]['nama']; ?>"> <br>
                        <label>Gender</label>
                        <select class="dropO" name="gender" id="gender">
                            <option value="Perempuan">Perempuan</option>
                            <option value="Laki- laki">Laki- laki</option>
                        </select>
                        <label>Email</label>
                        <input type="text" name="email" id="input" value="<?= $userInfo[0]['email']; ?>"> <br>
                        <label>No. Telp</label>
                        <input type="text" name="no_telp" id="input"><br>
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="input"><br>
                    </div>
                    <div class="column">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" id="input"><br>
                        <label>Alamat</label>
                        <input type="text" name="alamat" id="input"><br>
                        <label>Domisili Terakhir</label>
                        <input type="text" name="domisili" id="input"><br>
                        <button class="simpan" style="margin-top: 50px;" type="submit" nama="submit">Simpan</button>
                    </div>
                </div>
                <br>
            </form>
        </div>

        <div class='hidden_desc' id="page2_desc">
            <form action="input_pendidikan" id="input_profile" method="post">
                <div class="row">
                    <div class="column">
                        <label>SD</label>
                        <input type="text" name="sd" id="input"> <br>
                        <label>SMP</label>
                        <input type="text" name="smp" id="input"> <br>
                        <label>SMA</label>
                        <input type="text" name="sma" id="input"> <br>
                        <label>Universitas</label>
                        <input type="text" name="universitas" id="input"><br>
                    </div>
                    <div class="column">
                        <button class="simpan" style="margin-top: 170px;" type="submit" nama="submit">Simpan</button>    
                    </div>
                </div>
                <br>
            </form>
        </div>

        <div class='hidden_desc' id="page3_desc">
            <form action="input_pengalaman" id="input_profile" method="post">
                <div class="row">
                    <div class="column">
                        <label>Nama Pengalaman</label>
                        <input type="text" name="pengalaman" id="input"> <br>
                        <label>Jenis Pengalaman</label>
                        <input type="text" name="jenis_pengalaman" id="input"> <br>
                        <label>Posisi</label>
                        <input type="text" name="posisi" id="input"> <br>
                        <label>Lama Pengalaman</label>
                        <select name="pengalaman1" id="pengalaman1">
                            <option value="Tidak Ada" default disabled selected>Pilih Angka</option>
                            <option value="1">Belum Ada</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="> 5">> 5</option>
                        </select>&nbsp;
                        <select name="pengalaman2" id="pengalaman2">
                            <option value="Tidak Ada" default disabled selected>Pilih Durasi</option>
                            <option value="1">Belum Ada</option>
                            <option value="Bulan">Bulan</option>
                            <option value="Tahun">Tahun</option>
                        </select><br>
                        <br><br>
                    </div>
                    <div class="column">
                        <button class="simpan" style="margin-top: 170px;" type="submit" nama="submit">Simpan</button>
                    </div>
                </div>
                <br>
            </form>
        </div>

        <div id="page_content">
            <form action="input_js" id="input_profile" method="post">
                <div class="row">
                    <div class="column">
                        <label>Nama</label>
                        <input type="text" name="nama" id="input" value="<?= $userInfo[0]['nama']; ?>"> <br>
                        <label>Gender</label>
                        <select class="dropO" name="gender" id="gender">
                            <option value="Perempuan">Perempuan</option>
                            <option value="Laki- laki">Laki- laki</option>
                        </select>
                        <label>Email</label>
                        <input type="text" name="email" id="input" value="<?= $userInfo[0]['email']; ?>"> <br>
                        <label>No. Telp</label>
                        <input type="text" name="no_telp" id="input"><br>
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="input"><br>
                    </div>
                    <div class="column">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" id="input"><br>
                        <label>Alamat</label>
                        <input type="text" name="alamat" id="input"><br>
                        <label>Domisili Terakhir</label>
                        <input type="text" name="domisili" id="input"><br>
                        <button class="simpan" style="margin-top: 50px;" type="submit" nama="submit">Simpan</button>
                    </div>
                </div>
                <br>
            </form>
        </div>

    </div>
</div>

<script>
    //Script Upload Foto
    const dropArea = document.querySelector(".drag-area"),
        dragText = dropArea.querySelector("header"),
        button = dropArea.querySelector("button"),
        input = dropArea.querySelector("input");
    let file;

    button.onclick = () => {
        input.click();
    }

    input.addEventListener("change", function() {
        file = this.files[0];
        dropArea.classList.add("active");
        showFile();
    });

    dropArea.addEventListener("dragover", (event) => {
        event.preventDefault();
        dropArea.classList.add("active");
        dragText.textContent = "Release to Upload File";
    });

    dropArea.addEventListener("dragleave", () => {
        dropArea.classList.remove("active");
        dragText.textContent = "Drag & Drop to Upload File";
    });

    dropArea.addEventListener("drop", (event) => {
        event.preventDefault();
        file = event.dataTransfer.files[0];
        showFile();
    });

    function showFile() {
        let fileType = file.type;
        let validExtensions = ["image/jpeg", "image/jpg", "image/png"];
        if (validExtensions.includes(fileType)) {
            let fileReader = new FileReader();
            fileReader.onload = () => {
                let fileURL = fileReader.result;
                let imgTag = `<img src="${fileURL}" alt="">`;
                dropArea.innerHTML = imgTag;
            }
            fileReader.readAsDataURL(file);
        } else {
            alert("This is not an Image File!");
            dropArea.classList.remove("active");
            dragText.textContent = "Drag & Drop to Upload File";
        }
    }

    //Script Input Data
    function change_tab(id) {
        document.getElementById("page_content").innerHTML = document.getElementById(id + "_desc").innerHTML;
        document.getElementById("page1").className = "notselected";
        document.getElementById("page2").className = "notselected";
        document.getElementById("page3").className = "notselected";
        document.getElementById(id).className = "selected";
    }
</script>
<?= $this->endSection('content'); ?>