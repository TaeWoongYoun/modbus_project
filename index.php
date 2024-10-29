<?php $conn = new mysqli("localhost", "root", "1234", "Analog_read");?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>프로그램 데이터 조회</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $sql = "SELECT idx, Distance, Humidity, Temperature, Date FROM program";
        $result = mysqli_query($conn, $sql);
    ?>
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
</body>
</html>
