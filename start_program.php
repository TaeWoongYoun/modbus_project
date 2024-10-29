<?php
if (isset($_POST['port'])) {
    $port = escapeshellarg($_POST['port']); // 사용자 입력 포트 가져오기
    $command = escapeshellcmd("python C:/xampp/htdocs/modbus_project/modbus_read.py $port");
    shell_exec($command);
} else {
    echo "포트가 설정되지 않았습니다.";
}
?>