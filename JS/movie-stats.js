const ctx = document.getElementById("stats-graph");

var xValues = [
  1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22,
  23, 24, 25, 26, 27, 28, 29, 30,
];
var yValues = [
  7, 6.5, 6.2, 6.7, 6.2, 6, 6.5, 6.2, 6.7, 6.5, 7, 7.5, 7.2, 7.7, 7.5, 8, 8.5,
  8.2, 8.7, 8.5, 9, 9.5, 9.2, 9.7, 9.5, 10, 10.5, 10.2, 10.7, 10.5, 11,
];

var gradient = ctx.getContext("2d").createLinearGradient(0, 0, 0, 500);
gradient.addColorStop(0, "rgba(25,25,25,1)");
gradient.addColorStop(1, "rgba(25,25,25,0)");

const myChart = new Chart(ctx, {
  type: "line",
  data: {
    labels: xValues,
    datasets: [
      {
        labels: "Sales",
        backgroundColor: gradient,
        borderColor: "rgba(25,25,25,0)",
        fill: true,
        data: yValues,
        pointRadius: 0,
      },
    ],
  },
  options: {
    maintainAspectRatio: false,
    datasetFill: true,
    interaction: {
      mode: "index",
      intersect: false,
    },
    plugins: {
      legend: {
        display: false,
        labels: {
          font: {
            size: 14,
            family: "'Rubik', 'sans-serif'",
          },
        },
      },
    },
    scales: {
      y: {
        beginAtZero: true,
        display: false,
      },
      x: {
        display: false,
      },
    },
  },
});

var loadFile = function(event) {
  var output = document.getElementById('info-image');
  output.src = URL.createObjectURL(event.target.files[0]);
  output.onload = function() {
    URL.revokeObjectURL(output.src) // free memory
  }
};