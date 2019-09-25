<br>
<a style="margin-bottom: 10px" title="tambah" class="btn btn-success" href="<?php echo base_url()?>tambah_obat"> <label class="glyphicon glyphicon-plus"> Tambah Obat</label></a>
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="table">
                <table class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Rincian</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 0;
                    foreach ($record->result() as $r) {
                        $kategori = $this->Model_Kategori->get_one($r->obat_id_kategori)->row_array();
                        ?>

                        <tr class="odd gradeX">
                            <td><?php echo $no+1?> </td>
                            <td><?php echo $r->obat_nama; ?></td>
                            <td><?php echo $kategori['kategori_nama'] ?></td>
                            <td><?php echo $r->obat_rincian; ?></td>
                            <td><img src="<?php echo $r->obat_foto?>" style="width: 50px" alt = "IMG"></td>
                            <td>
                                <a href="<?php echo base_url('obat_edit/'.$r->obat_id);?>" title="Edit" class="btn btn-warning"> <span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="<?php echo base_url('obat_rincian/'.$r->obat_id);?>" title="Rincian" class="btn btn-success"> <span class="glyphicon glyphicon-eye-open"></span></a>
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
