<?php
// Python 스크립트를 종료하는 기능
// Windows에서 Python 프로세스를 강제 종료합니다.
exec('taskkill /F /IM python.exe', $output, $return_var);

if ($return_var === 0) {
    echo "프로그램이 종료되었습니다.";
} else {
    echo "프로그램 종료에 실패했습니다. (오류 코드: $return_var)";
}
?>
