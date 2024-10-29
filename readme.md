## 📑 프로젝트 소개
`modbus_project`는 모드버스를 이용한 데이터 수집과 시각화를 목적으로 하며, 웹 인터페이스를 통해 데이터를 실시간으로 모니터링할 수 있습니다.

## ✨ 주요 기능
- 실시간 데이터 수집 및 저장
- 꺾은선 그래프를 이용한 데이터 시각화
- 프로그램 시작/종료 버튼으로 데이터 수집 관리

## 🛠 사용된 기술 스택
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?logo=javascript&logoColor=black)
![PHP](https://img.shields.io/badge/PHP-777BB4?logo=php&logoColor=white)
![Python](https://img.shields.io/badge/Python-3776AB?logo=python&logoColor=white)
![Chart.js](https://img.shields.io/badge/Chart.js-FF6384?logo=chart-dot-js&logoColor=white)
![Arduino](https://img.shields.io/badge/Arduino-00979D?logo=arduino&logoColor=white)

## 📂 프로젝트 구조
- `modbus_project/`
  - `index.php` : 웹 인터페이스 파일로, 데이터를 조회하고 시각화하는 메인 화면
  - `modbus_read.py` : Python 데이터 읽기 스크립트로, 모드버스 데이터를 수집
  - `start_program.php` : 프로그램을 시작하여 데이터를 수집하는 스크립트
  - `stop_program.php` : 프로그램을 중지하여 데이터 수집을 멈추는 스크립트
  - `index.js` : 버튼 클릭 시 프로그램을 시작하거나 종료하는 기능을 제어하고, 데이터 시각화를 위한 JavaScript 코드
  - `images/` : 이미지 저장 폴더
  - `style.css` : 스타일을 정의하는 CSS 파일
  - `chart.php` : 수집한 데이터를 시각화시킨 화면 (수정중)

아두이노 이미지
<p align="center">
  <img src="images/modbus.jpg" alt="image" width="600">
</p>