var data_created_at = [];
var data_tegangan = [];
var data_arus_sebelum_bc = [];
var data_arus_sebelum_ca = [];
var data_kecepatan_angin = [];
var data_intensitas_cahaya = [];

// AJAX Jquery
$(document).ready(function () {
  $.ajax({
    url: "data.php",
    contentType: "application/json; charset=utf-8",
    type: "GET",
    dataType: "JSON",
    error: function (xhr, status) {
      alert(status);
    },
    success: function (response) {
      var length = response.length;

      for (var i = 0; i < length; i++) {
        data_created_at.push(response[i].created_at);
        data_tegangan.push(response[i].tegangan);
        data_arus_sebelum_bc.push(response[i].arus_sebelum_bc);
        data_arus_sebelum_ca.push(response[i].arus_sebelum_ca);
        data_kecepatan_angin.push(response[i].kecepatan_angin);
        data_intensitas_cahaya.push(response[i].intensitas_cahaya);
      }

      Highcharts.chart("container1", {
        title: {
          text: "Tegangan dan Arus Sebelum Boost",
        },

        yAxis: {
          title: {
            text: "Satuan e opo ra erti",
          },
        },

        xAxis: {
          categories: data_created_at,
          title: {
            enabled: true,
            text: "Satuan e opo ra erti",
          },
        },

        legend: {
          layout: "vertical",
          align: "right",
          verticalAlign: "middle",
        },

        plotOptions: {
          series: {
            label: {
              connectorAllowed: false,
            },
          },
        },

        series: [
          {
            name: "Tegangan",
            data: data_tegangan,
          },
          {
            name: "Arus Sebelum Boost",
            data: data_arus_sebelum_bc,
          },
        ],

        responsive: {
          rules: [
            {
              condition: {
                maxWidth: 500,
              },
              chartOptions: {
                legend: {
                  layout: "horizontal",
                  align: "center",
                  verticalAlign: "bottom",
                },
              },
            },
          ],
        },
      });

      Highcharts.chart("container2", {
        title: {
          text: "Tegangan dan Arus Sebelum Charger Aki",
        },

        yAxis: {
          title: {
            text: "Number of Employees",
          },
        },

        xAxis: {
          categories: data_created_at,
          title: {
            enabled: true,
            text: "Satuan e opo ra erti",
          },
        },

        legend: {
          layout: "vertical",
          align: "right",
          verticalAlign: "middle",
        },

        plotOptions: {
          series: {
            label: {
              connectorAllowed: false,
            },
          },
        },

        series: [
          {
            name: "Tegangan",
            data: data_tegangan,
          },
          {
            name: "Arus Sebelum Charger Aki",
            data: data_arus_sebelum_ca,
          },
        ],

        responsive: {
          rules: [
            {
              condition: {
                maxWidth: 500,
              },
              chartOptions: {
                legend: {
                  layout: "horizontal",
                  align: "center",
                  verticalAlign: "bottom",
                },
              },
            },
          ],
        },
      });

      Highcharts.chart("container3", {
        title: {
          text: "Kecepatan Angin",
        },

        yAxis: {
          title: {
            text: "Number of Employees",
          },
        },

        xAxis: {
          categories: data_created_at,
          title: {
            enabled: true,
            text: "Satuan e opo ra erti",
          },
        },

        legend: {
          layout: "vertical",
          align: "right",
          verticalAlign: "middle",
        },

        plotOptions: {
          series: {
            label: {
              connectorAllowed: false,
            },
          },
        },

        series: [
          {
            name: "Kecepatan Angin",
            data: data_kecepatan_angin,
          },
        ],

        responsive: {
          rules: [
            {
              condition: {
                maxWidth: 500,
              },
              chartOptions: {
                legend: {
                  layout: "horizontal",
                  align: "center",
                  verticalAlign: "bottom",
                },
              },
            },
          ],
        },
      });

      Highcharts.chart("container4", {
        title: {
          text: "Intensitas Cahaya Matahari",
        },

        yAxis: {
          title: {
            text: "Number of Employees",
          },
        },

        xAxis: {
          categories: data_created_at,
          title: {
            enabled: true,
            text: "Satuan e opo ra erti",
          },
        },

        legend: {
          layout: "vertical",
          align: "right",
          verticalAlign: "middle",
        },

        plotOptions: {
          series: {
            label: {
              connectorAllowed: false,
            },
          },
        },

        series: [
          {
            name: "Intensitas",
            data: data_intensitas_cahaya,
          },
        ],

        responsive: {
          rules: [
            {
              condition: {
                maxWidth: 500,
              },
              chartOptions: {
                legend: {
                  layout: "horizontal",
                  align: "center",
                  verticalAlign: "bottom",
                },
              },
            },
          ],
        },
      });
    },
  });
});
