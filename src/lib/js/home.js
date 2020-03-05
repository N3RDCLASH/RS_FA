
// function getData() {
//     let xs = []
//     let ys = []
//     fetch('../requests/stats/get_aantal_type_projecten.php')
//         .then(body => { return body.json() })
//         .then(body => body.forEach(x => {
//             xs.push(x.type)
//             ys.push(x.aantal)
//         }))
//         .catch(error => { console.log(error) })
//     return { xs, ys }
// }

// // document.addEventListener("DOMContentLoaded", )
// ChartIt()

// async function ChartIt() {
//     const data = await getData();
//     var ctx = document.getElementById('myChart');
//     console.log(data)
//     var myChart = new Chart(ctx, {
//         type: 'line',
//         data: {
//             labels: [3, 4],
//             datasets: [{
//                 label: '# of Votes',
//                 fill: false,
//                 data: [4, 4],
//                 backgroundColor: [
//                     'rgba(255, 99, 132, 0.2)',
//                     'rgba(54, 162, 235, 0.2)',
//                     'rgba(255, 206, 86, 0.2)',
//                     'rgba(75, 192, 192, 0.2)',
//                     'rgba(153, 102, 255, 0.2)',
//                     'rgba(255, 159, 64, 0.2)'
//                 ],
//                 borderColor: [
//                     'rgba(255, 99, 132, 1)',
//                     'rgba(54, 162, 235, 1)',
//                     'rgba(255, 206, 86, 1)',
//                     'rgba(75, 192, 192, 1)',
//                     'rgba(153, 102, 255, 1)',
//                     'rgba(255, 159, 64, 1)'
//                 ],
//                 borderWidth: 1
//             }]
//         },
//         options: {
//             maintainAspectRatio: false,
//             aspectRatio: 1,
//             scales: {
//                 yAxes: [{
//                     ticks: {
//                         beginAtZero: true
//                     }
//                 }]
//             }
//         }
//     });
// }
// chart.canvas.parentNode.style.height = '128px';
// chart.canvas.parentNode.style.width = '128px';