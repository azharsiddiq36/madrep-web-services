<div class="limiter">
            <span class="login100-form-title">
						Dokter
					</span>
    <p align="center">
        <label class="label"><a><img src="<?= base_url().$record['dokter_foto']?>" style="width: 200px;margin-bottom: 20px;border-radius: 20px"></a></label>
    </p>
        <table class="wrap-input100">
            <tr>
                <td><label class="label"><a>Nama</a></label></td>
                <td>:</td>
                <td>
                    <label class="label"><a><?= $record['dokter_nama']?></a></label>
                </td>
            </tr>
            <tr>
                <td><label class="label"><a>Alamat</a></label></td>
                <td>:</td>
                <td>
                    <label class="label"><a><?= $record['dokter_alamat']?></a></label>
                </td>
            </tr>
            <tr>
                <td><label class="label"><a>Bidang</a></label></td>
                <td>:</td>
                <td>
                    <label class="label"><a><?= $record['dokter_bidang']?></a></label>
                </td>
            </tr>
            <tr>
                <td><label class="label"><a>Tanggal Lahir</a></label></td>
                <td>:</td>
                <td>
                    <label class="label"><a><?= $record['dokter_tgl_lahir']?></a></label>
                </td>
            </tr>



        </table>
        <div class="container-login100-form-btn">
        <a href="<?php echo site_url('PenjaminController/edit/'.$this->uri->segment(3));?>" style="width: 100%" title="Edit" class="btn btn-success"> Edit</a>
        </div>

</div>