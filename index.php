<?php
// 데이터베이스 연결 정보
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "Analog_read";

// MySQL 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 오류 확인
if ($conn->connect_error) {
    die("데이터베이스 연결 실패: " . $conn->connect_error);
}

// SELECT 쿼리 작성 및 실행
$sql = "SELECT idx, Distance, Humidity, Temperature, Date FROM program";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>프로그램 데이터 조회</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>프로그램 데이터 조회</h1>
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
            // 데이터가 있으면 각 행을 출력
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["idx"] . "</td>";
                    echo "<td>" . $row["Distance"] . "</td>";
                    echo "<td>" . $row["Humidity"] . "</td>";
                    echo "<td>" . $row["Temperature"] . "</td>";
                    echo "<td>" . $row["Date"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>데이터가 없습니다</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <?php
    // 데이터베이스 연결 종료
    $conn->close();
    ?>
</body>
</html>
