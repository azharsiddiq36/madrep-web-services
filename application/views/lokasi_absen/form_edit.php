<div class="limiter">
            <span class="login100-form-title">
						Formulir Edit lokasi_absen
					</span>
            <form enctype="multipart/form-data" class="form" method="post" action="<?php echo base_url('lokasi_absen_edit/'.$record['lokasi_id'])?>">
                <table class="wrap-input100">
                    <tr>
                        <td><label class="label"><a>Nama</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "username">
                                <input class="input100" type="text" value="<?= $record['lokasi_nama']?>" name="lokasi_absen_nama" placeholder="Nama lokasi_absen">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
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