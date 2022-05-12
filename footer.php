<?php

if (isset($_POST['update_detail'])) {
	$id = $_POST['id'];
	$judul = $_POST['judul'];
	$penjelasan = $_POST['penjelasan'];

	if (!empty($judul) || !empty($penjelasan)) {
		$koneksiMonitoring->query("UPDATE tb_artikel SET judul = '$judul', penjelasan = '$penjelasan' WHERE id = '$id'");

		$_SESSION["sukses"] = 'Data Berhasil Diedit';
		//redirect ke halaman crud.php
		echo "<script>window.location.href='crud.php';</script>";
		exit;
	} else {
		echo "<script>alert('Mohon lengkapi semua data !');</script>";
		echo "<script>window.location.href='crud.php';</script>";
		exit;
	}
}

?>
</div>
<!-- End of container-fluid -->
</div>
<!-- End of wrapper -->
</body>

<script src="assets/lampu.js"></script>
<script src="assets/modal.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

<?php if (@$_SESSION['sukses']) : ?>
	<script>
		swal("Good job!", "<?php echo $_SESSION['sukses']; ?>", "success");
	</script>
<?php unset($_SESSION['sukses']);
endif; ?>

</html>