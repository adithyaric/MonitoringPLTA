// Edit Modals
$(document).ready(function () {
  // get Edit
  $(".btn-edit").on("click", function () {
    // get data from button Edit
    const id = $(this).data("id");
    const judul = $(this).data("judul");
    const penjelasan = $(this).data("penjelasan");
    // Set data to Form Edit
    $(".id").val(id);
    $(".judul").val(judul);
    $(".penjelasan").val(penjelasan);
    // Call Modal Edit
    $("#editModal").modal("show");
  });
});

//Detail
$(document).ready(function () {
  // get detail
  $(".btn-detail").on("click", function () {
    // get data from button detail
    const id = $(this).data("id");
    const judul = $(this).data("judul");
    const penjelasan = $(this).data("penjelasan");
    // Set data to Form detail
    $(".id").val(id);
    $(".judul").val(judul);
    $(".penjelasan").val(penjelasan);
    // Call Modal detail
    $("#detailModal").modal("show");
  });
});
