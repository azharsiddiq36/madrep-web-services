<br>
<a style="margin-bottom: 10px" title="tambah" class="btn btn-success" href="<?php echo base_url()?>tambah_dokter"> <label class="glyphicon glyphicon-plus"> Tambah Dokter</label></a>
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="table">
                <table class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Bidang</th>
                        <th>Nomor</th>
                        <th>Tanggal Lahir</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 0;
                    foreach ($record->result() as $r) {
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $no+1?> </td>
                            <td><?php echo $r->dokter_nama; ?></td>
                            <td><?php echo $r->dokter_alamat; ?></td>
                            <td><?php echo $r->dokter_jk; ?></td>
                            <td><?php echo $r->dokter_bidang; ?></td>
                            <td><?php echo "0".$r->dokter_nomor; ?></td>
                            <td><?php echo $r->dokter_tgl_lahir; ?></td>
                            <td><img src="<?php echo $r->dokter_foto?>" style="width: 50px" alt = "IMG"></td>
                            <td>
                                <a href="<?php echo base_url('dokter_rincian/'.$r->dokter_id);?>" title="Rincian" class="btn btn-success"> <span class="glyphicon glyphicon-eye-open"></span></a>

                            </td>
                        </tr>
                        <?php
                        $no++;
                    }
?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
