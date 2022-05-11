// Line Chart

const ctx = document.getElementById("myChart1");
const myChart1 = new Chart(ctx, {
  type: "line",
  data: {
    labels: [
      "2005",
      "2006",
      "2007",
      "2008",
      "2009",
      "2010",
      "2011",
      "2012",
      "2013",
      "2014",
      "2015",
      "2016",
      "2017",
      "2018",
      "2019",
      "2020",
      "2021",
    ],
    datasets: [
      {
        label: "Average FICO Score",
        backgroundColor: "rgb(117, 177, 219)",
        borderColor: "rgb(45, 124, 180)",
        data: [
          688, 690, 689, 689, 686, 687, 689, 689, 690, 694, 695, 699, 701, 705,
          706, 713, 716,
        ],
      },
    ],
  },
});

// Pie Chart

let data = [
  {
    data: [35, 30, 15, 10, 10],
    backgroundColor: [
      "rgb(231, 76, 60)",
      "rgb(241, 196, 15)",
      "rgb(39, 174, 96)",
      "rgb(52, 152, 219)",
      "rgb(155, 89, 182)",
    ],
    hoverOffset: 3,
  },
];

let options = {
  plugins: {
    datalabels: {
      formatter: (value, ctx2) => {
        const datapoints = ctx2.chart.data.datasets[0].data;
        const total = datapoints.reduce(
          (total, datapoint) => total + datapoint,
          0
        );
        const percentage = (value / total) * 100;
        return percentage.toFixed(1) + "%";
      },
      color: "#fff",
    },
    tooltip: {
      enabled: false,
    },
    labels: {
      render: "percentage",
    },
  },
};

let ctx2 = document.getElementById("myChart2");
let myChart2 = new Chart(ctx2, {
  type: "pie",
  data: {
    labels: [
      "Payment History",
      "Amounts owed",
      "Length of credit history",
      "Credit mix",
      "New credit",
    ],
    datasets: data,
  },
  options: options,
  plugins: [ChartDataLabels],
});

// Bar Chart
let ctx3 = document.getElementById("myChart3");
let myChart3 = new Chart(ctx3, {
  type: "bar",
  data: {
    labels: [
      "Age 18 to 23",
      "Age 24 to 39",
      "Age 40 to 55",
      "Age 56 to 74",
      "Age 75+",
    ],
    datasets: [
      {
        label: ["Average Fico Score By Age"],
        data: [679, 686, 705, 740, 760],
        backgroundColor: [
          "rgba(255, 99, 132, 0.2)",
          "rgba(255, 159, 64, 0.2)",
          "rgba(255, 205, 86, 0.2)",
          "rgba(75, 192, 192, 0.2)",
          "rgba(54, 162, 235, 0.2)",
        ],
        borderColor: [
          "rgb(255, 99, 132)",
          "rgb(255, 159, 64)",
          "rgb(255, 205, 86)",
          "rgb(75, 192, 192)",
          "rgb(54, 162, 235)",
        ],
        borderWidth: 1,
      },
    ],
  },
});

//Table
new gridjs.Grid({
  columns: [
    {
      name: "State",
      sort: {
        enabled: true,
      },
    },
    {
      name: "Average Credit Score 2020",
    },
    {
      name: "Average Credit Score 2021",
    },
  ],
  sort: true,
  fixedHeader: true,
  height: "400px",
  data: [
    ["Alabama", "686", "691"],
    ["Alaska", "714", "717"],
    ["Arizona", "706", "710"],
    ["Arkansas", "690", "694"],
    ["California", "716", "721"],
    ["Colorado", "725", "728"],
    ["Connecticut", "723", "728"],
    ["Delaware", "710", "714"],
    ["District of Columbia", "713", "717"],
    ["Florida", "701", "706"],
    ["Georgia", "689", "693"],
    ["Hawaii", "727", "732"],
    ["Idaho", "720", "725"],
    ["Illinois", "716", "719"],
    ["Indiana", "707", "712"],
    ["Iowa", "726", "729"],
    ["Kansas", "717", "721"],
    ["Kentucky", "698", "702"],
    ["Louisiana", "684", "679"],
    ["Maine", "721", "727"],
    ["Maryland", "712", "716"],
    ["Massachusetts", "729", "732"],
    ["Michigan", "714", "719"],
    ["Minnesota", "739", "742"],
    ["Mississippi", "675", "681"],
    ["Missouri", "707", "711"],
    ["Montana", "726", "730"],
    ["Nebraska", "728", "731"],
    ["Nevada", "695", "701"],
    ["New Hampshire", "729", "734"],
    ["New Jersey", "721", "725"],
    ["New Mexico", "694", "699"],
    ["New York", "718", "722"],
    ["North Carolina", "703", "707"],
    ["North Dakota", "730", "733"],
    ["Ohio", "711", "715"],
    ["Oklahoma", "690", "692"],
    ["Oregon", "727", "731"],
    ["Pennsylvania", "720", "723"],
    ["Rhode Island", "719", "723"],
    ["South Carolina", "689", "693"],
    ["South Dakota", "731", "733"],
    ["Tennessee", "697", "701"],
    ["Texas", "688", "692"],
    ["Utah", "723", "727"],
    ["Vermont", "731", "736"],
    ["Virginia", "717", "721"],
    ["Washington", "730", "734"],
    ["West Virginia", "695", "699"],
    ["Wisconsin", "732", "735"],
    ["Wyoming", "719", "722"],
  ],
}).render(document.getElementById("table-wrapper"));

// Bar Chart
let ctx4 = document.getElementById("myChart4");
let myChart4 = new Chart(ctx4, {
  type: "bar",
  data: {
    labels: ["Low income", "Moderate income", "Middle income", "High income"],
    datasets: [
      {
        label: ["Average Fico Score By Income"],
        data: [658, 692, 735, 774],
        backgroundColor: [
          "rgba(255, 99, 132, 0.2)",
          "rgba(255, 159, 64, 0.2)",
          "rgba(255, 205, 86, 0.2)",
          "rgba(75, 192, 192, 0.2)",
        ],
        borderColor: [
          "rgb(255, 99, 132)",
          "rgb(255, 159, 64)",
          "rgb(255, 205, 86)",
          "rgb(75, 192, 192)",
        ],
        borderWidth: 1,
      },
    ],
  },
});
