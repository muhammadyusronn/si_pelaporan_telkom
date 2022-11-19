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
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Mohon untuk memasukkan data yang valid!</div>
                <div class="ibox-tools">
                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                <?php
                if (isset($data_laporan)) {
                    $url = base_url('laporan/proses/' . $data_laporan[0]->laporan_id);
                } else {
                    $url = base_url('laporan/create');
                }
                ?>
                <form class="form-horizontal" id="form-laporan" method="post" action="<?= $url ?>" novalidate="novalidate">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Laporan ID</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" readonly value="<?= isset($data_laporan) ? $data_laporan[0]->laporan_id : '' ?>" name="laporan_id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Pelapor</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" readonly value="<?= isset($data_laporan) ? $data_laporan[0]->pelanggan_nama : '' ?>" name="pelanggan_nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kontak Pelanggan</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" readonly value="<?= isset($data_laporan) ? $data_laporan[0]->pelanggan_telepon : '' ?>" name="pelanggan_telepon">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat Pelanggan</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" readonly value="<?= isset($data_laporan) ? $data_laporan[0]->pelanggan_alamat : '' ?>" name="pelanggan_alamat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Laporan Pelanggan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="laporan_text" readonly><?= $data_laporan[0]->laporan_text ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Laporan Pelanggan</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="laporan_teknisi">
                                <option selected disabled>Pilih Teknisi</option>
                                <?php foreach ($data_teknisi as $i) : ?>
                                    <option value="<?= $i->teknisi_id ?>"><?= $i->teknisi_nama ?></option>
                                <?php endforeach; ?>
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