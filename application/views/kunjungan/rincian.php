<div class="limiter">
            <span class="login100-form-title">
						Obat
					</span>
    <p align="center">
        <label class="label"><a><img src="<?= base_url().$record['obat_foto']?>" style="width: 200px;margin-bottom: 20px;border-radius: 20px"></a></label>
    </p>
        <table class="wrap-input100">
            <tr>
                <td><label class="label"><a>Nama</a></label></td>
                <td>:</td>
                <td>
                    <label class="label"><a><?= $record['obat_nama']?></a></label>
                </td>
            </tr>
            <tr>
                <td><label class="label"><a>Kategori</a></label></td>
                <td>:</td>
                <td>
                    <?php $kategori = $this->Model_Kategori->get_one($record['obat_id_kategori'])->row_array();?>
                    <label class="label"><a><?= $kategori['kategori_nama']?></a></label>
                </td>
            </tr>

            <tr>
                <td><label class="label"><a>Rincian</a></label></td>
                <td>:</td>
                <td>
                    <label class="label"><a><?= $record['obat_rincian']?></a></label>
                </td>
            </tr>



        </table>
        <div class="container-login100-form-btn">
        <a href="<?php echo site_url('PenjaminController/edit/'.$this->uri->segment(3));?>" style="width: 100%" title="Edit" class="btn btn-success"> Edit</a>
        </div>

</div>