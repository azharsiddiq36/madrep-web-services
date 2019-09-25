<br>
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="table">
                <table class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Pengguna</th>
                        <th>Jabatan</th>
                        <th>Kota</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Jalan</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 0;
                    foreach ($record->result() as $r) {
                        $pengguna = $this->Model_Pengguna->get_one($r->absensi_id_pengguna)->row_array();
                        $nama = null;
                        if ($pengguna['pengguna_hak_akses'] == "dokter"){
                            $dokter = $this->Model_Dokter->getByDokter($pengguna['pengguna_id'])->row_array();
                            $nama = $dokter['dokter_nama'];
                        }
                        else{
                            $madrep = $this->Model_Madrep->getByIdPengguna($pengguna['pengguna_id'])->row_array();
                            $nama = $madrep['madrep_nama'];
                        }
                        ?>

                        <tr class="odd gradeX">
                            <td><?php echo $no+1?> </td>
                            <td><?php echo $nama; ?></td>
                            <td><?php echo $pengguna['pengguna_hak_akses']; ?></td>
                            <td><?php echo $r->absensi_kota; ?></td>
                            <td><?php echo $r->absensi_kecamatan; ?></td>
                            <td><?php echo $r->absensi_kelurahan; ?></td>
                            <td><?php echo $r->absensi_jalan; ?></td>
                            <td><?php echo $r->absensi_tanggal; ?></td>
                            <td><?php echo $r->absensi_jam; ?></td>
                            <td><?php echo $r->absensi_latitude; ?></td>
                            <td><?php echo $r->absensi_longitude; ?></td>
                            <td><?php echo $r->absensi_status; ?></td>
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
