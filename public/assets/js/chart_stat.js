console.log('deb')

var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet","Aôut", "Septembre", "Octobre", "Novembre", "Décembre"],
          datasets: [{
            data: [35,20,57,68, 26,47],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });