
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="table table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Hak akses</th>
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
                            <td><?php echo $r->pengguna_username; ?></td>
                            <td><?php echo $r->pengguna_hak_akses; ?></td>
                            <td>
                                <a href="<?php echo site_url('PenggunaController/edit/'.$r->pengguna_id);?>" title="Edit" class="btn btn-warning"> <span class="glyphicon glyphicon-pencil"></span></a>
                                <a title="Delete" class="btn btn-danger" href="<?php echo site_url('PenggunaController/delete/'.$r->pengguna_id)?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"> <span class="glyphicon glyphicon-trash"></span></a>
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

