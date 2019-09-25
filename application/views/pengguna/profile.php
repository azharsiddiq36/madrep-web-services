<!--<a title="Edit" class="btn btn-default"> <span class="glyphicon glyphicon-plus">Tambah</span></a>-->

<div class="panel panel-primary">
    <div class="panel-body">
        <div class="table">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                <form method="post" action="<?php echo base_url()?>ubah_password">
                    <div id="biodatanapi">
                        <span class="login100-form-title">Profile</span>
                        <?php if($this->session->flashdata('alert') == "berhasil"){
                            ?>
                            <p align="center" style="background: #0dff00;color:white;border-radius: 5px">
                                Berhasil Merubah Password
                            </p>
                            <?php
                        }?>
                        <?php
                        $pengguna = $this->Model_pengguna->get_one($this->session->userdata('id_pengguna'))->row_array();


                        if ($pengguna['id_pegawai'] == 0){
                            ?>
                            <img class='tengah' alt='Tidak ada gambar' src="<?= base_url().$pengguna['foto']?>">
                            <table class="wrap-input100">
                                <tr>
                                    <td><label class="label"><a>Nama</a></label></td>
                                    <td>:</td>
                                    <td><label class="label"><a><?= $pengguna['username']?></a></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="label"><a>Hak Akses</a></label></td>
                                    <td>:</td>
                                    <td><label class="label"><a><?= $pengguna['hak_akses']?></a></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="label"><a>Status</a></label></td>
                                    <td>:</td>
                                    <td><label class="label"><a><?= $pengguna['status']?></a></label>
                                    </td>
                                </tr>
                            </table>
                            <button style="width: 100%" class="btn btn-success" name="submit" type="submit" value="submit">
                                Ubah Password
                            </button>
                        <?php
                        }
                        else{
                            $pegawai = $this->Model_Pegawai->get_one(1)->row_array();
                            ?>
                            <img class='tengah' alt='Tidak ada gambar' src="<?= base_url().$pengguna['foto']?>">
                            <table class="wrap-input100">
                                <tr>
                                    <td><label class="label"><a>username</a></label></td>
                                    <td>:</td>
                                    <td><label class="label"><a><?= $pengguna['username']?></a></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="label"><a>Nama</a></label></td>
                                    <td>:</td>
                                    <td><label class="label"><a><?= $pegawai['nama']?></a></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="label"><a>Hak Akses</a></label></td>
                                    <td>:</td>
                                    <td><label class="label"><a><?= $pengguna['hak_akses']?></a></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="label"><a>Status</a></label></td>
                                    <td>:</td>
                                    <td><label class="label"><a><?= $pengguna['status']?></a></label>
                                    </td>
                                </tr>
                            </table>

                                <button style="width: 100%" class="btn btn-success" name="submit" type="submit" value="submit">
                                    Ubah Password
                                </button>

                        <?php

                        }


                        ?>

                    </div
                </form>

        </div>
    </div>
</div>



