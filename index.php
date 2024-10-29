<?php $conn = new mysqli("localhost", "root", "1234", "analog_read");?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>프로그램 데이터 조회</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>프로그램 데이터 조회</h1>
        <div class="btn-box">
            <button onclick="startProgram()">프로그램 시작</button>
            <button onclick="stopProgram()">프로그램 종료</button>
            <button><a href="chart.php">데이터 차트화</a></button>
        </div>
    </header>
    <div class="table-box">
        <table>
            <thead>
                <tr>
                    <th>번호</th>
                    <th>거리</th>
                    <th>습도</th>
                    <th>온도</th>
                    <th>날짜</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM program order by idx desc";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>" . $row["idx"] . "</td>
                                <td>" . $row["Distance"] . "</td>
                                <td>" . $row["Humidity"] . "</td>
                                <td>" . $row["Temperature"] . "</td>
                                <td>" . $row["Date"] . "</td>
                            </tr>";
                        }
                ?>
            </tbody>
        </table>
    </div>
    <script src="index.js"></script>
</body>
</html>
