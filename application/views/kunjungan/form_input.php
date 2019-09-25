<div class="limiter">
            <span class="login100-form-title">
						Formulir Tambah Obat
					</span>
            <form enctype="multipart/form-data" class="form" method="post" action="<?php echo base_url()?>tambah_obat">
                <table class="wrap-input100">
                    <tr>
                        <td><label class="label"><a>Nama</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "username">
                                <input class="input100" type="text" name="obat_nama" placeholder="Nama Obat">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="label"><a>Kategori</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "Hak Akses tidak boleh kosong">
                                <select class="input100" name="obat_id_kategori">
                                    <?php
                                        foreach ($record->result() as $row){
                                            ?>
                                            <option value="<?= $row->kategori_id?>"><?= $row->kategori_nama?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                                <!--                                <input class="input100" type="text" name="tingkatijazah" placeholder="Tingkat Ijazah">-->
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="label"><a>Rincian</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "Tempat Lahir Tidak Boleh Kosong">
                                <input class="input100" type="text" name="obat_rincian" placeholder="Rincian Obat">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-location-arrow" aria-hidden="true"></i>
						</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="label"><a>Foto</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="form-group">
                                <input type="file" name="obat_foto" class="dropify" data-height="200">
                            </div>
                        </td>
                    </tr>

                </table>

                <div class="container-login100-form-btn">
                    <table width="100%">
                        <tr>
                            <td align="center" class="login100">
                                <button style="width: 90%" class="btn btn-danger" name="submit" type="submit" value="submit">
                                    Batal
                                </button>
                            </td>
                            <td align="center">
                                <button style="width: 80%" class="btn btn-success" name="submit" type="submit" value="submit">
                                    Simpan
                                </button>
                            </td>
                        </tr>
                    </table>

                </div>


            </form>
</div>