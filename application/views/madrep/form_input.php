<div class="limiter">
            <span class="login100-form-title">
						Formulir Tambah Medrep
					</span>
            <form enctype="multipart/form-data" class="form" method="post" action="<?php echo base_url()?>tambah_madrep">
                <table class="wrap-input100">
                    <?php if($this->session->flashdata('alert') == "gagal"){
                        ?>
                        <p align="center" style="background: #ff734c;color:white;border-radius: 5px;margin: 10px">
                            Username telah tersedia
                        </p>
                        <?php
                    }?>
                    <tr>
                        <td><label class="label"><a>Username</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "username">
                                <input class="input100" type="text" name="pengguna_username" placeholder="Username">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="label"><a>Nama</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "Nama tidak boleh kosong">
                                <input class="input100" type="text" name="madrep_nama" placeholder="Nama">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="label"><a>Email</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "Nama tidak boleh kosong">
                                <input class="input100" type="text" name="pengguna_email" placeholder="Email">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="label"><a>Alamat</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "Tempat Lahir Tidak Boleh Kosong">
                                <input class="input100" type="text" name="madrep_alamat" placeholder="alamat">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-location-arrow" aria-hidden="true"></i>
						</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="label"><a>Nomor HP</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "Tempat Lahir Tidak Boleh Kosong">
                                <input class="input100" type="text" name="madrep_nomor" placeholder="nomor">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="label"><a>Jenis Kelamin</a></label></td>
                        <td>:</td>
                        <td>
                            <label class="radio-inline">
                                <input type="radio" name="madrep_jk" value="Pria" checked><span style="font-size: 15px">Pria</span>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="madrep_jk" value="Wanita"><span style="font-size: 15px">Wanita</span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="label"><a>Tanggal Lahir</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "Pangkat tidak boleh kosong">
                                <input class="input100" type="text" id="datepicker" name="madrep_tgl_lahir" placeholder="Tanggal Lahir">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-birthday-cake" aria-hidden="true"></i>
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