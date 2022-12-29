<?= $this->extend('/baseMain'); ?>
<?= $this->section('this-page'); ?>
<div class="sidebar-content">
    <ul>
        <li>
            <h1>Job</h1>
        </li>
        <li><a href="lowonganAll"><img src="<?= base_url('assets/img/home-solidwhite.svg'); ?>" alt="" class="icon" width="30"></span><span class="title">Home</span></a></li>
        <li><a href="crud_job"><img src="<?= base_url('assets/img/Vectorwhite.svg'); ?>" alt="" class="icon" width="25"></span><span class="title">Job Vacancy Company</span></a></li>
    </ul>
</div>
<div class="sidebar-content">
    <ul>
        <li>
            <h1>Company</h1>
        </li>
        <li class="this-page"><img src="<?= base_url('assets/img/user-solid 1.svg'); ?>" alt="" class="icon" width="25"><span class="title">Company Information</span></li>
    </ul>
</div>
<?= $this->endSection('this-page'); ?>
<?= $this->section('content'); ?>
<div class="content-lowongan">
    <div class="content-header">
        <a href="<?= site_url('compauth/logout'); ?>">Logout</a>
        <a href="profile"><?= $compInfo[0]['nama_perusahaan']; ?></a>
    </div>
    <div class="content-main">
        <h1>Company Information</h1>
        <div class="drag-area">
            <header>Upload Profile Picture</header>
            <span></span>
            <button><i class="fa fa-upload"></i> &nbsp;&nbsp;Browse File</button>
            <input type="file" hidden>
        </div>
    </div>

    <div id="main_content">
        <li class="selected" id="page1" onclick="change_tab(this.id);">Data Perusahaan</li>
        <li class="notselected" id="page2" onclick="change_tab(this.id);">Tentang Perusahan</li>
        <br><br>
        <p style="border-top: 1px solid #5A81BB; width: 100%; border-width: 3px;"></p>
        <br><br>
        <div class='hidden_desc' id="page1_desc">
            <form action="<?= base_url('compauth/updateCompProfile'); ?>" id="input_profile" method="post">
                <div class="row">
                    <div class="column">
                        <label>Nama</label>
                        <input type="text" name="namaPerusahaan" id="input" value="<?= $compInfo[0]['nama_perusahaan']; ?>"> <br>
                        <label>Email</label>
                        <input type="text" name="emailPerusahaan" id="input" value="<?= $compInfo[0]['email_perusahaan']; ?>" readonly> <br>
                        <label>Sektor Industri</label>
                        <input type="text" name="sektorPerusahaan" id="input" value="<?= $compInfo[0]['sektor']; ?>"><br>
                        <label>No. Telp</label>
                        <input type="text" name="telpPerusahaan" id="input" value="<?= $compInfo[0]['kontak_telf']; ?>"><br>
                    </div>
                    <div class="column">
                        <label>Website</label>
                        <input type="text" name="websitePerusahaan" id="input" value="<?= $compInfo[0]['website_perusahaan']; ?>"><br>
                        <label>Alamat</label>
                        <input type="text" name="alamatPerusahaan" id="input" value="<?= $compInfo[0]['alamat_perusahaan']; ?>"><br>
                        <input type="submit" value="Simpan" name="submit" id="simpan" style="margin-top: 50px;" />

                    </div>
                </div>
                <br>
            </form>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div><?= session()->getFlashdata('pesan'); ?></div>
            <?php endif ?>
        </div>

        <div class='hidden_desc' id="page2_desc">
            <form action="<?= base_url('compauth/updateCompDesc'); ?>" id="input_profile" method="post">
                <div class="row">
                    <div class="column" style="display:flex;">
                        <label style="text-align:left;">Tentang Perusahaan</label>
                        <textarea name="descPerusahaan" id="" cols="50" rows="10" value="anjing"><?= $compInfo[0]['deskripsi_perusahaan']; ?></textarea>
                    </div>
                    <div class="column">
                        <input type="submit" value="Simpan" name="submit" id="simpan" style="margin-top: 170px;" />
                    </div>
                </div>
                <br>
            </form>
        </div>

        <div id="page_content">
            <form action="<?= base_url('compauth/updateCompProfile'); ?>" id="input_profile" method="post">
                <div class="row">
                    <div class="column">
                        <label>Nama</label>
                        <input type="text" name="namaPerusahaan" id="input" value="<?= $compInfo[0]['nama_perusahaan']; ?>"> <br>
                        <label>Email</label>
                        <input type="text" name="emailPerusahaan" id="input" value="<?= $compInfo[0]['email_perusahaan']; ?>" readonly> <br>
                        <label>Sektor Industri</label>
                        <input type="text" name="sektorPerusahaan" id="input" value="<?= $compInfo[0]['sektor']; ?>"><br>
                        <label>No. Telp</label>
                        <input type="text" name="telpPerusahaan" id="input" value="<?= $compInfo[0]['kontak_telf']; ?>"><br>
                    </div>
                    <div class="column">
                        <label>Website</label>
                        <input type="text" name="websitePerusahaan" id="input" value="<?= $compInfo[0]['website_perusahaan']; ?>"><br>
                        <label>Alamat</label>
                        <input type="text" name="alamatPerusahaan" id="input" value="<?= $compInfo[0]['alamat_perusahaan']; ?>"><br>
                        <input type="submit" value="Simpan" name="submit" id="simpan" style="margin-top: 50px;" />
                    </div>
                </div>
                <br>
            </form>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div><?= session()->getFlashdata('pesan'); ?></div>
            <?php endif ?>
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
        document.getElementById(id).className = "selected";
    }
</script>
<?= $this->endSection('content'); ?>