let ctx = document.getElementById('graph1').getContext('2d')

let data = {
  labels: dates, /* abscisse (dates) */
  datasets: [{
    label: 'Score',
    borderColor: '#FF544D',
    backgroundColor: 'rgba(0, 0, 0, 0)',
    pointBackgroundColor: '#FF544D',
    data: resultats /* Scores */
  }] /*tableau qui contient toutes les lignes et 1 objet = 1 ligne */
}

let options = {
  scales: {
    yAxes: [{
      ticks: {
        max: 100,
        min: 0,
        stepSize: 10
      }
    }]
  }
}

let config = {
  type: 'line',
  data: data,
  options: options
}
let graph1 = new Chart(ctx, config);