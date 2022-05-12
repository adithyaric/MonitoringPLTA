$(document).ready(function () {
  selesai();
});

function selesai() {
  setTimeout(function () {
    update();
    selesai();
  }, 1000);
}

function update() {
  $.getJSON("data_lampu.php", function (data) {
    $.each(data, function () {
      const data_lampu = data;
      if (data_lampu == 0) {
        $("#lampu").attr("src", "./assets/img/off.png");
      } else {
        $("#lampu").attr("src", "./assets/img/on.png");
      }
    });
  });
}
