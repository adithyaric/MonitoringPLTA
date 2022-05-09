<?php include "header.php"; ?>
<?php include "koneksi.php"; ?>

<h1 class="text-center">Material Gudang PT. PLN (Persero)</h1>
<h3 class="text-center">By : Mantab Jiwa</h3>
<hr>

<div class="table-responsive">
	<table class="table table-bordered table-hover table-striped">
		<thead style="vertical-align: middle;">
			<tr>
				<th class="text-center" width="50px">No</th>
				<th class="text-center" width="50px">ID</th>
				<th class="text-center" width="150px">Tanggal</th>
				<th class="text-center" width="100px">Status</th>
				<th class="text-center" width="100px">Nama barang</th>
				<th class="text-center" width="100px">Jumlah</th>
				<th class="text-center" width="100px">Kode Rak</th>
				<th class="text-center" width="100px">
					<a type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#addModal">Tambah <i class="fa fa-plus"></i></a>
				</th>
			</tr>
		</thead>

		<tbody>
			<?php
			$no = 1;
			$data_statistik = $koneksi->query("SELECT * FROM tb_statistik ORDER BY tgl_update ASC");
			$jumlah_data = $data_statistik->num_rows;

			if ($jumlah_data > 0) {
				while ($pecah = $data_statistik->fetch_assoc()) {
			?>
					<tr>
						<td class="text-center" width="30px"><?php echo $no; ?></td>
						<td class="text-center" width="30px"><?php echo $pecah['id']; ?></td>
						<td><?php echo $pecah['tgl_update']; ?></td>
						<td><?php echo $pecah['status_update']; ?></td>
						<td><?php echo $pecah['nama_barang']; ?></td>
						<td><?php echo $pecah['jumlah_barang'] . " " . $pecah['satuan_barang']; ?></td>
						<td><?php echo $pecah['kode_rak']; ?></td>
						<td class="text-center">
							<a type="button" class="btn btn-sm btn-warning mb-1 btn-edit" data-id="<?= $pecah['id']; ?>" data-nama_barang="<?= $pecah['nama_barang']; ?>" data-jumlah_barang="<?= $pecah['jumlah_barang']; ?>" data-satuan_barang="<?= $pecah['satuan_barang']; ?>" data-kode_rak="<?= $pecah['kode_rak']; ?>">
								Edit <i class="fa fa-edit"></i></a>
							<a type="button" class="btn btn-sm btn-danger mb-1 btn-delete" data-id="<?= $pecah['id']; ?>" data-nama_barang="<?= $pecah['nama_barang']; ?>">
								Hapus <i class="fa fa-trash"></i></a>
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

<!-- Modal Add Barang-->
<form enctype="multipart/form-data" method="post" class="needs-validation" novalidate>
	<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Material</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nama Material</label>
						<input type="text" class="form-control nama_barang" name="nama_barang" placeholder="Nama Barang" required>
					</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Jumlah Material</label>
						<input type="text" class="form-control jumlah_barang" name="jumlah_barang" placeholder="Jumlah Material" required>
					</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Satuan Material</label>
						<input type="text" class="form-control satuan_barang" name="satuan_barang" placeholder="Satuan Material" required>
					</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Kode Rak Material</label>
						<div class="input-group">
							<input type="text" class="form-control mr-5" name="rak_baris" placeholder="Baris" required>
							<input type="text" class="form-control" name="rak_kolom" placeholder="Kolom" required>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" name="simpan_barang">Simpan <i class="fa fa-save"></i></button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- End Modal Add Barang-->

<!-- Modal Edit Barang-->
<form enctype="multipart/form-data" method="post" class="needs-validation" novalidate>
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nama Barang</label>
						<input type="text" class="form-control nama_barang" name="nama_barang" required>
					</div>
					<div class="form-group">
						<label>Jumlah Barang</label>
						<input type="text" class="form-control jumlah_barang" name="jumlah_barang" required>
					</div>
					<div class="form-group">
						<label>Satuan Barang</label>
						<input type="text" class="form-control satuan_barang" name="satuan_barang" required>
					</div>
					<div class="form-group">
						<label>Kode Rak</label>
						<input type="text" class="form-control kode_rak" name="kode_rak" required>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id" class="id">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" name="update_barang">Update <i class="fa fa-save"></i></button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- End Modal Edit Barang-->

<!-- Modal Hapus Barang-->

<form enctype="multipart/form-data" method="post" class="needs-validation" novalidate>
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Delete Barang</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Data yang dihapus tidak akan bisa dikembalikan.</label>
					</div>
					<div class="form-group">
						<label>Id Barang</label>
						<input type="text" class="form-control id" name="id" readonly>
					</div>
					<div class="form-group">
						<label>Nama Barang</label>
						<input type="text" class="form-control nama_barang" name="nama_barang" readonly>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="id" class="id">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" name="hapus_barang">Delete <i class="fa fa-trash"></i></button>
					</div>
				</div>
			</div>
		</div>
</form>
<!-- End Modal Hapus Barang-->

<?php include "footer.php"; ?>