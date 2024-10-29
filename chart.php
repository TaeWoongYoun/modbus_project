<?php
$conn = new mysqli("localhost", "root", "1234", "analog_read");
if ($conn->connect_error) {
    die("연결 실패: " . $conn->connect_error);
}

$sql = "SELECT * FROM program ORDER BY idx DESC LIMIT 100";
$result = mysqli_query($conn, $sql);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = [
        'idx' => $row["idx"],
        'distance' => $row["Distance"],
        'humidity' => $row["Humidity"],
        'temperature' => $row["Temperature"],
        'date' => $row["Date"]
    ];
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>프로그램 데이터 조회</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <header>
        <h1>프로그램 데이터 조회</h1>
        <button onclick="startProgram()">프로그램 시작</button>
        <button onclick="stopProgram()">프로그램 종료</button>
    </header>

    <!-- 탭 메뉴 -->
    <div class="tab-menu">
        <button onclick="showChart('distance')">거리</button>
        <button onclick="showChart('humidity')">습도</button>
        <button onclick="showChart('temperature')">온도</button>
    </div>

    <!-- 차트 컨테이너 -->
    <div class="chart-container">
        <canvas id="dataChart"></canvas>
    </div>

    <script>
        const data = <?php echo json_encode($data); ?>;

        // 데이터 추출
        const labels = data.map(entry => entry.date).reverse();
        const distanceData = data.map(entry => entry.distance).reverse();
        const humidityData = data.map(entry => entry.humidity).reverse();
        const temperatureData = data.map(entry => entry.temperature).reverse();

        // Chart.js 초기 설정
        const ctx = document.getElementById('dataChart').getContext('2d');
        let dataChart = new Chart(ctx, { type: 'line', data: {}, options: {} });

        // 차트 업데이트 함수
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

            dataChart.destroy(); // 기존 차트를 제거
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

        // 기본으로 거리 차트를 표시
        showChart('distance');
    </script>
</body>
</html>
