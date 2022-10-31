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
        <?php echo $this->session->flashdata('msg');
        unset($_SESSION['msg']); ?>
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title"><?= $title ?></div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover table-responsive" id="example-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Pelapor</th>
                            <th>Laporan</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Pelapor</th>
                            <th>Laporan</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($laporan as $i) :
                            if ($i->laporan_status === "Menunggu") {
                                $badges = 'warning';
                            } else if ($i->laporan_status === "Proses") {
                                $badges = 'info';
                            } else if ($i->laporan_status === "Selesai") {
                                $badges = 'success';
                            } else {
                                $badges = 'danger';
                            }
                        ?>
                            <tr>
                                <td><?= $i->pelanggan_nama; ?></td>
                                <td><?= $i->laporan_text; ?></td>
                                <td><span class="badge badge-<?= $badges ?>"><?= $i->laporan_status ?></span></td>
                                <td>
                                    <a href="" class="btn btn-warning" title="PROSES" onclick="javascript: return alert('Fitur belum tersedia')"><i class="fa fa-pencil"></i></a>
                                    <a href="" class="btn btn-danger" title="TOLAK" onclick="javascript: return alert('Fitur belum tersedia')"><i class="fa fa-ban"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>