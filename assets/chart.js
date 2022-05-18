// Variable Global
var data_created_at = [];
var data_v_sblm_bc = [];
var data_i_sblm_bc = [];
var data_i_sblm_aki = [];
var data_v_stlh_aki = [];
var data_i_stlh_aki = [];
var data_daya_aki = [];
var data_kecepatan_angin = [];
var data_intensitas_cahaya = [];

// AJAX Jquery
$(document).ready(function () {
  function resetArray() {
    window.setInterval(function () {
      if (data_created_at.length > 0) {
        data_created_at = [];
        data_v_sblm_bc = [];
        data_i_sblm_bc = [];
        data_i_sblm_aki = [];

        data_v_stlh_aki = [];
        data_i_stlh_aki = [];
        data_daya_aki = [];
        data_kecepatan_angin = [];
        data_intensitas_cahaya = [];
      }
    }, 5000);
  }

  function requestData() {
    $.ajax({
      url: "data.php",
      contentType: "application/json; charset=utf-8",
      type: "GET",
      dataType: "JSON",
      success: function (response) {
        var length = response.length;

        for (var i = 0; i < length; i++) {
          data_created_at.push(response[i].created_at);

          data_v_sblm_bc.push(response[i].v_sblm_bc);
          data_i_sblm_bc.push(response[i].i_sblm_bc);
          data_i_sblm_aki.push(response[i].i_sblm_aki);

          data_v_stlh_aki.push(response[i].v_stlh_aki);
          data_i_stlh_aki.push(response[i].i_stlh_aki);
          data_daya_aki.push(response[i].daya_aki);
          data_kecepatan_angin.push(response[i].kecepatan_angin);
          data_intensitas_cahaya.push(response[i].intensitas_cahaya);
        }

        Highcharts.chart("container1", {
          title: {
            text: "Tegangan dan Arus Sebelum Boost",
          },

          yAxis: {
            title: {
              text: "V, I",
            },
          },

          xAxis: {
            categories: data_created_at,
            title: {
              enabled: true,
              // text: "Satuan e opo ra erti",
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
              animation: false,
            },
          },

          series: [
            {
              name: "Tegangan Sebelum Boost",
              data: data_v_sblm_bc,
            },
            {
              name: "Arus Sebelum Boost",
              data: data_i_sblm_bc,
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
              text: "V, I",
            },
          },

          xAxis: {
            categories: data_created_at,
            title: {
              enabled: true,
              // text: "Satuan e opo ra erti",
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
              animation: false,
            },
          },

          series: [
            {
              name: "Tegangan",
              data: data_v_sblm_bc,
            },
            {
              name: "Arus Sebelum Charger Aki",
              data: data_i_sblm_aki,
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
              // text: "Satuan e opo ra erti",
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
              animation: false,
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
              // text: "Satuan e opo ra erti",
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
              animation: false,
            },
          },

          series: [
            {
              name: "Intensitas Cahaya",
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
        Highcharts.chart("container5", {
          title: {
            text: "Tegangan, Arus, dan daya Setelah Aki ",
          },

          yAxis: {
            title: {
              text: "V, I, Wh",
            },
          },

          xAxis: {
            categories: data_created_at,
            title: {
              enabled: true,
              // text: "Satuan e opo ra erti",
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
              animation: false,
            },
          },

          series: [
            {
              name: "Tegangan",
              data: data_v_stlh_aki,
            },
            {
              name: "Intensitas Cahaya",
              data: data_i_stlh_aki,
            },
            {
              name: "Daya Aki",
              data: data_daya_aki,
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

        // call it again after tree second
        setTimeout(requestData, 5000);
        resetArray();
      },
      cache: false,
    });
  }

  requestData();
});
