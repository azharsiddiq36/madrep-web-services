

<!-- Button trigger modal -->
<?php
$napi = $this->Model_Napi->tampilkan_data()->num_rows();
$pengguna = $this->Model_pengguna->tampilkan_data()->num_rows();
$penjamin = $this->Model_Penjamin->getByPembimbing($this->session->userdata('id_pegawai'))->num_rows();
$pegawai = $this->Model_Pegawai->tampilkan_data()->num_rows();
$setuju = 0;
$menunggu = 0;
foreach ($record->result() as $a) {
    if ($a->status ==='Disetujui') {
        $setuju+=1;
    }
    else{
        $menunggu +=1;
    }
}
?>

<ul>

<li class = "dash-li">
        <a href="<?= base_url() ?>persetujuan_penjamin"><div class="content-box card-box card-dash" style="width: 200px" >
            <div class="container_card">
                <img src="<?php echo base_url()?>upload/people.png" alt="Avatar" style="width:100%;height: 200px">

                <h3 align="center"><b>Daftar Penjamin</b></h3>
                <hr>
                <label>Jumlah Penjamin : <?php echo $penjamin?></label>


            </div>
        </div>
        </a>
</li>

    <li class = "dash-li">
        <a href="<?= base_url() ?>persetujuan_penjamin">
        <div class="content-box card-box card-dash" style="background: #FFE57F;width: 200px">
            <div class="container_card" >
                <img src="<?php echo base_url()?>upload/police.png" alt="Avatar" style="width:100%;height: 200px">
                <h3 align="center"><b>Telah Di Setujui</b></h3>
                <hr>
                <label>Disetujui : <?php echo $setuju?></label>
            </div>
        </div>
        </a>
    </li>
<li class="dash-li">
    <a href="<?= base_url() ?>persetujuan_penjamin">
    <div class="content-box card-box card-dash" style="background: #F44336;width: 200px">
    <div class="container_card">
        <img src="<?php echo base_url()?>upload/user.png" alt="Avatar" style="width:100%;height: 200px">
        <h3 align="center"><b>Belum Disetujui</b></h3>

        <hr>                <label>Menunggu : <?php echo $menunggu?></label>
    </div>
    </div>
    </a>
</li>
</ul>

<a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
</a>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>