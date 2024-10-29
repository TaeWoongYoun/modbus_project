<?php $conn = new mysqli("localhost", "root", "1234", "analog_read"); ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>프로그램 데이터 조회</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
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
    ?>
    <header>
        <h1>프로그램 데이터 조회</h1>
        <button><a href="index.php">돌아가기</a></button>
        <div class="tab-menu">
            <button onclick="showChart('distance')">거리 데이터</button>
            <button onclick="showChart('humidity')">습도 데이터</button>
            <button onclick="showChart('temperature')">온도 데이터</button>
        </div>
    </header>

    <div class="chart-container">
        <canvas id="dataChart"></canvas>
    </div>

    <script>
        const data = <?php echo json_encode($data); ?>;
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="chart.js"></script>
</body>
</html>
