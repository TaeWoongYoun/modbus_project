function startProgram() {
    const port = prompt("포트를 입력하세요 (예: COM1):");
    if (port) {
        // Ajax 요청으로 PHP에 포트를 전달
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "start_program.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function () {
            if (this.status === 200) {
                alert(this.responseText);
            }
        };
        xhr.send("port=" + encodeURIComponent(port));
    }
}

function stopProgram() {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "stop_program.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (this.status === 200) {
            alert(this.responseText);
        }
    };
    xhr.send();
}
