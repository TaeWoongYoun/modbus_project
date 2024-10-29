const labels = data.map(entry => entry.date).reverse();
const distanceData = data.map(entry => entry.distance).reverse();
const humidityData = data.map(entry => entry.humidity).reverse();
const temperatureData = data.map(entry => entry.temperature).reverse();

const ctx = document.getElementById('dataChart').getContext('2d');
let dataChart = new Chart(ctx, { type: 'line', data: {}, options: {} });

function showChart(type) {
    const datasets = {
        distance: {
            label: '거리',
            data: distanceData,
            borderColor: 'rgba(255, 99, 132, 1)',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            fill: true,
        },
        humidity: {
            label: '습도',
            data: humidityData,
            borderColor: 'rgba(54, 162, 235, 1)',
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            fill: true,
        },
        temperature: {
            label: '온도',
            data: temperatureData,
            borderColor: 'rgba(75, 192, 192, 1)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            fill: true,
        }
    };

    dataChart.destroy();
    dataChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [datasets[type]]
        },
        options: {
            scales: {
                x: { display: true, title: { display: true, text: '날짜' }},
                y: { display: true, title: { display: true, text: '값' }}
            }
        }
    });
}

showChart('distance');