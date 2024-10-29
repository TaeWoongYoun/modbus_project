<?php
$port = 'COM3'; // 사용하고자 하는 포트
$command = escapeshellcmd("python3 C:/xampp/htdocs/modbus_project/modbus_read.py $port");
$output = shell_exec($command);

if ($output === null) {
    echo "Python 스크립트가 정상적으로 실행되지 않았습니다.";
} else {
    echo "Output: " . nl2br(htmlspecialchars($output));
}

?>
