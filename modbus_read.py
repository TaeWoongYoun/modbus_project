import minimalmodbus
import time
import pymysql
import threading
import sys

port = sys.argv[1]

instrument = minimalmodbus.Instrument(port, 1)
instrument.serial.baudrate = 9600
instrument.serial.timeout = 1
instrument.serial.stopbits = 1
instrument.serial.bytesize = 8
time.sleep(3)

running = True
def check_exit():
    global running
    while True:
        user_input = input()
        if user_input.lower() == '종료':
            running = False
            print("프로그램을 종료하는 중 입니다. 잠시만 기다려주세요.")
            break
threading.Thread(target=check_exit, daemon=True).start()

try: 
    while running:
        data = instrument.read_registers(0, 3)
        print(f"거리: {data[0]} / 습도: {data[1]} / 온도: {data[2]}")
        try:
            conn = pymysql.connect(host='localhost', user='root', password='1234', db='analog_read', charset='utf8')
            cursor = conn.cursor()
            sql = "INSERT INTO program (Distance, Humidity, Temperature) VALUES (%s, %s, %s)"
            cursor.execute(sql, (data[0], data[1], data[2]))
            conn.commit()
        finally:
            cursor.close()
            conn.close()
        time.sleep(10)
finally:
    print("프로그램이 정상적으로 종료되었습니다.")
