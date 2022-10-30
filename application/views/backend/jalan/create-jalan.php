<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title"><?= $title ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php"><i class="fa fa-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item"><?= $title ?></li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox col-lg-10">
            <div class="ibox-head">
                <div class="ibox-title">Mohon untuk memasukkan data yang valid!</div>
                <div class="ibox-tools">
                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                <?php
                if (isset($jalan)) {
                    $url = base_url('pembangunan-jalan/edit/') . $jalan[0]->id;
                } else {
                    $url = base_url('pembangunan-jalan/create');
                }
                ?>
                <form class="form-horizontal" id="form-jalan" method="post" action="<?= $url ?>" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Kegiatan</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?= isset($jalan) ? $jalan[0]->nama_kegiatan : '' ?>" name="kegiatan" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Provinsi</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="provinsi">
                                <option value="6" selected>Sumatera Selatan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kabupaten</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="kabupaten">
                                <option value="107" selected>OGAN KOMERING ULU</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kecamatan</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="kecamatan">
                                <option value="0" disabled>Pilih Kecamatan</option>
                                <?php foreach ($kecamatan as $i) : ?>
                                    <option <?php if (isset($jalan)) {
                                                if ($jalan[0]->dis_id == $i->dis_id) {
                                                    echo 'selected';
                                                }
                                            }  ?> value="<?= $i->dis_id ?>"><?= $i->dis_name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kelurahan</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="kelurahan">
                                <option value="0" selected>Pilih kelurahan</option>
                                <?php foreach ($kelurahan as $i) : ?>
                                    <option <?php if (isset($jalan)) {
                                                if ($jalan[0]->subdis_id == $i->subdis_id) {
                                                    echo 'selected';
                                                }
                                            }  ?> value="<?= $i->subdis_id ?>"><?= $i->subdis_name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Ukuran Jalan</label>
                        <div class="form-group col-lg-4">
                            <div class="input-group">
                                <div class="input-group-addon bg-white">Panjang</div>
                                <input class="form-control" type="text" value="<?= isset($jalan) ? $jalan[0]->panjang_jalan : '' ?>" name="panjang" required>
                                <div class="input-group-addon bg-white">KM</div>
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <div class="input-group">
                                <div class="input-group-addon bg-white">Lebar</div>
                                <input class="form-control" type="text" value="<?= isset($jalan) ? $jalan[0]->lebar_jalan : '' ?>" name="lebar" required>
                                <div class="input-group-addon bg-white">M</div>
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <div class="input-group">
                                <div class="input-group-addon bg-white">Tebal</div>
                                <input class="form-control" type="text" value="<?= isset($jalan) ? $jalan[0]->lebar_jalan : '' ?>" name="tebal" required>
                                <div class="input-group-addon bg-white">CM</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tahun</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="tahun">
                                <option value="0" disabled>Pilih Tahun</option>
                                <?php
                                $untilYear = date("Y");
                                $firstYear = $untilYear - 3;
                                while ($firstYear <= $untilYear + 1) {
                                ?>
                                    <option value="<?= $firstYear; ?>"><?= $firstYear ?></option>
                                <?php
                                    $firstYear++;
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 ml-sm-auto">
                            <button class="btn btn-info" name="submit" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->