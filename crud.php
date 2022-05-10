<?php include "header.php"; ?>
<?php include "koneksi.php"; ?>

<div class="mt-3 jumbotron text-center">
	<h1 class="display-4">Edit Detail Chart</h1>
	<p class="lead">
		<a href="index.php"><button type="button" class="btn btn-primary">Kembali</button></a>
	</p>
</div>

<div class="table-responsive">
	<table class="table table-bordered table-hover table-striped">
		<thead style="vertical-align: middle;">
			<tr>
				<th class="text-center" width="50px">No</th>
				<th class="text-center" width="100px">Judul</th>
				<th class="text-center" width="100px">Penjelasan</th>
				<th class="text-center" width="50px">Aksi</th>
			</tr>
		</thead>

		<tbody>
			<?php
			$no = 1;
			$data_statistik = $koneksiMonitoring->query("SELECT * FROM tb_artikel ORDER BY id ASC");
			$jumlah_data = $data_statistik->num_rows;

			if ($jumlah_data > 0) {
				while ($pecah = $data_statistik->fetch_assoc()) {
			?>
					<tr>
						<td class="text-center" width="30px"><?php echo $no; ?></td>
						<td><?php echo $pecah['judul']; ?></td>
						<td><?php echo $pecah['penjelasan']; ?></td>
						<td class="text-center">
							<a type="button" class="btn btn-warning btn-edit" data-id="<?= $pecah['id']; ?>" data-judul="<?= $pecah['judul']; ?>" data-penjelasan="<?= $pecah['penjelasan']; ?>">
								Edit <i class="fa fa-edit"></i></a>
						</td>
					</tr>

				<?php
					$no++;
				}
			} else {
				?>

				<tr>
					<td colspan="8">
						<center>Data tidak ditemukan !</center>
					</td>
				</tr>

			<?php
			}
			?>

		</tbody>
	</table>
</div>

<!-- Modal Edit detail-->
<form enctype="multipart/form-data" method="post" class="needs-validation" novalidate>
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit detail</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Judul</label>
						<input type="text" class="form-control judul" name="judul" required>
					</div>
					<div class="form-group">
						<label>Penjelasan</label>
						<textarea class="form-control penjelasan" name="penjelasan" rows="20"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id" class="id">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" name="update_detail">Update <i class="fa fa-save"></i></button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- End Modal Edit detail-->

<?php include "footer.php"; ?>