<?php include "header.php"; ?>
<?php include "koneksi.php"; ?>

<div class="mt-3 jumbotron text-center">

    <h1 class="display-4">Monitoring PLTA</h1>
    <p class="lead">
        <a href="crud.php"><button type="button" class="btn btn-primary">Edit Artikel</button></a>
        <a href="#"><button type="button" class="btn btn-danger">Buttons</button></a>
    </p>
    <img src="" alt="lampu" id="lampu" class="rounded mx-auto d-block" width="10%">
</div>

<div class="container-fluid mt-5">
    <div class="row">
        <?php
        $no = 1;
        $data_statistik = $koneksiMonitoring->query("SELECT * FROM tb_artikel ORDER BY id ASC");
        $jumlah_data = $data_statistik->num_rows;

        if ($jumlah_data > 0) {
            while ($pecah = $data_statistik->fetch_assoc()) {
        ?>
                <div class="col-sm-6 mb-5">
                    <div class="card">
                        <div class="card-body text-center">
                            <div id="<?php echo 'container' . $no; ?>"></div>
                            <a href="#" class="btn btn-primary btn-detail" data-id="<?= $pecah['id']; ?>" data-judul="<?= $pecah['judul']; ?>" data-penjelasan="<?= $pecah['penjelasan']; ?>">Detail</a>
                        </div>
                    </div>
                </div>
        <?php $no++;
            }
        } else {
            echo "Data tidak ditemukan !";
        } ?>
    </div>
</div>
<!-- highcharts.js -->
<script src="assets/chart.js"></script>
<!-- Modal  detail-->
<form enctype="multipart/form-data" class="needs-validation" novalidate>
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control judul" name="judul" readonly>
                    </div>
                    <div class="form-group">
                        <label>Penjelasan</label>
                        <textarea class="form-control penjelasan" name="penjelasan" rows="20" readonly></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal  detail-->
<?php include "footer.php"; ?>