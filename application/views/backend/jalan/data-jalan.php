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
        <?php if ($this->data['token']['level'] == '1') { ?>
            <a href="<?= base_url('pembangunan-jalan/create') ?>" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Data</a>
        <?php } ?>
        <a class="btn btn-success mb-3 text-white" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-search"></i> Filter</a>
        <?php if (isset($filter)) { ?>
            <a class="btn btn-warning mb-3 text-white" href="<?= base_url('pembangunan-jalan') ?>"><i class="fa fa-refresh"></i> Refresh</a>
        <?php } ?>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">FIlter Data Pembangunan Jalan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" id="form-jalan" method="post" action="" enctype="multipart/form-data">
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
                                    <select class="form-control" name="kecamatan" id="kecamatan_id">
                                        <option value="0" selected>Semua Kecamatan</option>
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
                                    <select class="form-control" name="kelurahan" id="kelurahan_id">
                                        <option value="0" selected>Pilih kelurahan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tahun</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="tahun">
                                        <option value="0" disabled>Pilih Tahun</option>
                                        <?php
                                        $untilYear = date("Y");
                                        $firstYear = 2019;
                                        while ($firstYear <= $untilYear + 1) {
                                        ?>
                                            <option <?php if ($firstYear == $untilYear) echo 'selected' ?> value="<?= $firstYear; ?>"><?= $firstYear ?></option>
                                        <?php
                                            $firstYear++;
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button class="btn btn-info" name="filter" type="submit">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $this->session->flashdata('msg'); ?>
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title"><?= $title ?></div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover table-responsive" id="jalan-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Kegiatan</th>
                            <th>Provinsi</th>
                            <th>Kabupaten</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            <th>Panjang Jalan</th>
                            <th>Lebar Jalan</th>
                            <th>Tebal Jalan</th>
                            <th>Tahun</th>
                            <?php if ($this->data['token']['level'] == '1') { ?>
                                <th></th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        foreach ($pembangunan as $i) : ?>
                            <tr>
                                <td><?= $i->nama_kegiatan ?></td>
                                <td><?= $i->prov_name ?></td>
                                <td><?= $i->city_name ?></td>
                                <td><?= $i->dis_name ?></td>
                                <td><?= $i->subdis_name ?></td>
                                <td><?= $i->panjang_jalan . ' KM' ?></td>
                                <td><?= $i->lebar_jalan . ' M' ?></td>
                                <td><?= $i->tebal_jalan . ' CM' ?></td>
                                <td><?= $i->tahun ?></td>
                                <?php if ($this->data['token']['level'] == '1') { ?>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a class="btn btn-sm btn-warning" href="<?= base_url('pembangunan-jalan/edit/') . $i->id ?>" title="EDIT"><i class="fa fa-pencil"></i></a>
                                            &nbsp;
                                            <a class="btn btn-sm btn-danger" href="<?= base_url('backend/JalanController/destroy/') . $i->id ?>" onclick="javascript: return confirm('anda yakin menghapus data?')" title="HAPUS"><i class="fa fa-trash"></i></a>
                                        </div>
                                        <!-- <a class="btn btn-sm btn-warning" href="" title="EDIT"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-sm btn-danger" href="<?= base_url('backend/JalanController/destroy/') . $i->id ?>" onclick="javascript: return confirm('anda yakin menghapus data?')" title="HAPUS"><i class="fa fa-trash"></i></a> -->
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php
                            $total = $total + $i->panjang_jalan;
                        endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5" class="text-right">Total</th>
                            <th><?= $total . ' KM'; ?></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <?php if ($this->data['token']['level'] == '1') { ?>
                                <th></th>
                            <?php } ?>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#kecamatan_id').change(function() {
            var dis_is = $("#kecamatan_id").val();
            var urls = "<?php echo getenv("BASE_URL") ?>" + "get-kelurahan-by-kecamatan/" + dis_is
            $.ajax({
                url: urls,
                dataType: "json",
                type: "GET",
                success: function(data) {
                    $('#kelurahan_id').empty()
                    $('#kelurahan_id').append($('<option>', {
                        value: 0,
                        text: 'Semua Kelurahan'
                    }));
                    $.each(data, function(i, item) {
                        $('#kelurahan_id').append($('<option>', {
                            value: item.subdis_id,
                            text: item.subdis_name
                        }));
                    });
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(url);
                }
            });
        }).change();
    </script>