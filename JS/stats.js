const ctx = document.getElementById("overall-stats-chart");

var xValues = ["Day 1", "Day 2", "Day 3", "Day 4", "Day 5"];
var yValues = [5, 6, 5.5, 7, 6.2];

var gradient = ctx.getContext("2d").createLinearGradient(0, 0, 0, 250);
gradient.addColorStop(0, "rgba(25,25,25,1)");
gradient.addColorStop(1, "rgba(25,25,25,0)");

const myChart = new Chart(ctx, {
  type: "line",
  data: {
    labels: xValues,
    datasets: [
      {
        labels: 'Sales',
        backgroundColor: gradient,
        borderColor: "rgba(25,25,25,0)",
        fill: true,
        data: yValues,
        pointRadius: 0,
      },
    ],
  },
  options: {
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
            family: "'Rubik', 'sans-serif'"
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
