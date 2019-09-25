
<!-- Button trigger modal -->
<?php
$pengguna = $this->Model_Pengguna->get_all()->num_rows();
$dokter = $this->Model_Dokter->get_all()->num_rows();
$obat = $this->Model_Obat->get_all()->num_rows();
$madrep = $this->Model_Madrep->get_all()->num_rows();
$kunjungan = $this->Model_Kunjungan->get_all()->num_rows();
$lokasi = $this->Model_Lokasi_Absen->get_all()->num_rows();
$absen = $this->Model_Absensi->get_all()->num_rows();
$kategori = $this->Model_Kategori->get_all()->num_rows();
?>

<ul>
    <li class="dash-li">
        <a href="<?= base_url() ?>daftar_kunjungan">
            <div class="content-box card-box card-dash" style="background: #23f4ef;width: 200px">
                <div class="container_card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTO2PAtqZgbNeyDAOwTaejXKvJ_W2d5XtWQpdiUQLcdsSjRps18" alt="Avatar" style="width:100%;height: 200px">
                    <h3 align="center"><b>Kunjungan</b></h3>
                    <hr><label>Jumlah Kunjungan : <?php echo $kunjungan?></label>
                </div>
            </div>
        </a>
    </li>
<li class = "dash-li">
        <a href="<?= base_url() ?>daftar_pengguna"><div class="content-box card-box card-dash" style="width: 200px" >
            <div class="container_card">
                <img src="<?php echo base_url()?>upload/people.png" alt="Avatar" style="width:100%;height: 200px">

                <h3 align="center"><b>Pengguna</b></h3>
                <hr>
                <label>Jumlah Pengguna : <?php echo $pengguna?></label>
            </div>
        </div>
        </a>
</li>

    <li class = "dash-li">
        <a href="<?= base_url() ?>daftar_madrep">
        <div class="content-box card-box card-dash" style="background: #B39DDB;width: 200px">
            <div class="container_card">
                <img src="<?php echo base_url()?>assets/images/logo.png" alt="Avatar" style="width:100%;height: 200px">
                <h3 align="center"><b>Medrep</b></h3>
                <hr>
                <label>Jumlah Medrep : <?php echo $madrep?></label>
            </div>
        </div>
        </a>
    </li>

    <li class = "dash-li">
        <a href="<?= base_url() ?>daftar_dokter">
        <div class="content-box card-box card-dash" style="background: #FFE57F;width: 200px">
            <div class="container_card" >
                <img src="https://i1.wp.com/rsupelitahusada.com/wp-content/uploads/2018/04/doctor-icon.png?ssl=1" alt="Avatar" style="width:100%;height: 200px">
                <h3 align="center"><b>Dokter</b></h3>
                <hr>
                <label>Jumlah : <?php echo $dokter?></label>
            </div>
        </div>
        </a>
    </li>
<li class="dash-li">
    <a href="<?= base_url() ?>daftar_obat">
    <div class="content-box card-box card-dash" style="background: #FFE57F;width: 200px">
    <div class="container_card">
        <img src="https://cdn0.iconfinder.com/data/icons/sports-and-fitness/512/pharmacy_tablet_vitamin_medicine_pill_steroid_vitamins_pills_health_supply_medication_painkiller_capsule_care_medical_drug_pharmacology_supplement_healthcare_flat_design_icon-512.png" alt="Avatar" style="width:100%;height: 200px">
        <h3 align="center"><b>Obat</b></h3>

        <hr><label>Jumlah Obat : <?php echo $obat?></label>
    </div>
    </div>
    </a>
</li>
    <li class="dash-li">
        <a href="<?= base_url() ?>kategori">
            <div class="content-box card-box card-dash" style="background: #B39DDB;width: 200px">
                <div class="container_card">
                    <img src="http://www.stealth.co.id/wp-content/uploads/fingerprint-icon.png" alt="Avatar" style="width:100%;height: 200px">
                    <h3 align="center"><b>Absen</b></h3>

                    <hr><label>Jumlah absen : <?php echo $absen?></label>
                </div>
            </div>
        </a>
    </li>
    <li class="dash-li">
        <a href="<?= base_url() ?>daftar_obat">
            <div class="content-box card-box card-dash" style="width: 200px">
                <div class="container_card">
                    <img src="https://img.icons8.com/cotton/2x/worldwide-location--v1.png" alt="Avatar" style="width:100%;height: 200px">
                    <h3 align="center"><b>Lokasi</b></h3>

                    <hr><label>Jumlah Lokasi : <?php echo $lokasi?></label>
                </div>
            </div>
        </a>
    </li>
    <li class="dash-li">
        <a href="<?= base_url() ?>daftar_obat">
            <div class="content-box card-box card-dash" style="background: #23f4ef;width: 200px">
                <div class="container_card">
                    <img src="http://olimpiade.psma.kemdikbud.go.id/olimpiade/fiksi/assets/dist/img/icon/icon-rintisan-usaha.png" alt="Avatar" style="width:100%;height: 200px">
                    <h3 align="center"><b>Kategori</b></h3>

                    <hr><label>Jumlah Kategori : <?php echo $kategori?></label>
                </div>
            </div>
        </a>
    </li>
</ul>
