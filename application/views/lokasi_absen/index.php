﻿<br>
<a style="margin-bottom: 10px" title="tambah" class="btn btn-success" href="<?php echo base_url()?>tambah_lokasi_absen"> <label class="glyphicon glyphicon-plus"> Tambah Lokasi Absen</label></a>
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="table">
                <table class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
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
                            <td><?php echo $r->lokasi_nama; ?></td>
                            <td>
                                <a href="<?php echo base_url('lokasi_absen_edit/'.$r->lokasi_id);?>" title="Edit" class="btn btn-warning"> <span class="glyphicon glyphicon-pencil"></span></a>
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
