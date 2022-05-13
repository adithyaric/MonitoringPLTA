</div>
<!-- End of container-fluid -->
</div>
<!-- End of wrapper -->
</body>

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