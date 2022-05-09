<?php

if (isset($_POST['simpan_barang'])) {
	$nama_barang = $_POST['nama_barang'];
	$jumlah_barang = $_POST['jumlah_barang'];
	$satuan_barang = $_POST['satuan_barang'];
	$rak_baris = $_POST['rak_baris'];
	$rak_kolom = $_POST['rak_kolom'];
	$kode_rak = $rak_kolom . $rak_baris;

	if (!empty($nama_barang) || !empty($jumlah_barang) || !empty($satuan_barang) || !empty($rak_baris) || !empty($rak_kolom)) {

		$data = $koneksi->query("SELECT * FROM tb_statistik WHERE nama_barang='$nama_barang'");
		$jmldata = $data->num_rows;

		if (!$jmldata > 0) {
			$koneksi->query("INSERT INTO tb_statistik (status_update, nama_barang, jumlah_barang, satuan_barang, kode_rak) VALUES ('Baru', '$nama_barang', '$jumlah_barang', '$satuan_barang', '$kode_rak')");
			$_SESSION["sukses"] = 'Data Berhasil Ditambah';
			//redirect ke halaman index.php
			echo "<script>window.location.href='index.php';</script>";
			exit;
		} else {
			$_SESSION["sukses"] = 'Barang sudah ada !!!';
			echo "<script>window.location.href='index.php';</script>";
			exit;
		}
	} else {
		echo "<script>alert('Mohon lengkapi semua data !');</script>";
	}
} else if (isset($_POST['update_barang'])) {
	$id = $_POST['id'];
	$nama_barang = $_POST['nama_barang'];
	$jumlah_barang = $_POST['jumlah_barang'];
	$satuan_barang = $_POST['satuan_barang'];
	$kode_rak = $_POST['kode_rak'];

	if (!empty($nama_barang) || !empty($jumlah_barang) || !empty($satuan_barang) || !empty($rak_baris) || !empty($rak_kolom)) {
		$koneksi->query("UPDATE tb_statistik SET status_update = 'Perbarui Data', nama_barang = '$nama_barang', jumlah_barang = '$jumlah_barang', satuan_barang = '$satuan_barang', kode_rak = '$kode_rak' WHERE id = '$id'");

		$_SESSION["sukses"] = 'Data Berhasil Diedit';
		//redirect ke halaman index.php
		echo "<script>window.location.href='index.php';</script>";
		exit;
	} else {
		echo "<script>alert('Mohon lengkapi semua data !');</script>";
		echo "<script>window.location.href='index.php';</script>";
		exit;
	}
} else if (isset($_POST['hapus_barang'])) {
	$id = $_POST['id'];
	$koneksi->query("DELETE FROM tb_statistik WHERE id = '$id'");

	$_SESSION["sukses"] = 'Data Berhasil Dihapus';
	//redirect ke halaman index.php
	echo "<script>window.location.href='index.php';</script>";
	exit;
}

?>
</div>
</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

<script>
	// Edit Modals
	$(document).ready(function() {
		// get Edit Product
		$('.btn-edit').on('click', function() {
			// get data from button Edit
			const id = $(this).data('id');
			const nama_barang = $(this).data('nama_barang');
			const jumlah_barang = $(this).data('jumlah_barang');
			const satuan_barang = $(this).data('satuan_barang');
			const kode_rak = $(this).data('kode_rak');
			// Set data to Form Edit
			$('.id').val(id);
			$('.nama_barang').val(nama_barang);
			$('.jumlah_barang').val(jumlah_barang);
			$('.satuan_barang').val(satuan_barang);
			$('.kode_rak').val(kode_rak);
			// Call Modal Edit
			$('#editModal').modal('show');
		});
	});

	// Delete Modals
	$(document).ready(function() {
		// get Delete Product
		$('.btn-delete').on('click', function() {
			// get data from button Delete
			const id = $(this).data('id');
			const nama_barang = $(this).data('nama_barang');
			// Set data to Form Delete
			$('.id').val(id);
			$('.nama_barang').val(nama_barang);
			// Call Modal Delete
			$('#deleteModal').modal('show');
		});
	});
</script>

<?php if (@$_SESSION['sukses']) : ?>
	<script>
		swal("Good job!", "<?php echo $_SESSION['sukses']; ?>", "success");
	</script>
<?php unset($_SESSION['sukses']);
endif; ?>

</html>