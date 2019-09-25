<br>

    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="table">
                <table class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Medrep</th>
                        <th>Dokter</th>
                        <th>Cabang</th>
                        <th>Bulan</th>
                        <th>Minggu</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Obat</th>
                        <th>Keterangan</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 0;
                    foreach ($record->result() as $r) {
                        ?>

                        <tr class="odd gradeX">
                            <td><?php echo $no+1?> </td>
                            <td><?php echo $r->madrep_nama; ?></td>
                            <td><?php echo $r->dokter_nama; ?></td>
                            <td><?php echo $r->kunjungan_cabang; ?></td>
                            <td><?php echo $r->kunjungan_bulan; ?></td>
                            <td><?php echo $r->kunjungan_minggu; ?></td>
                            <td><?php echo $r->kunjungan_latitude; ?></td>
                            <td><?php echo $r->kunjungan_longitude; ?></td>
                            <td><?php echo $r->kunjungan_obat; ?></td>
                            <td><?php echo $r->kunjungan_keterangan; ?></td>
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
