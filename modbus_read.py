import minimalmodbus
import time
import pymysql
import sys

port = sys.argv[1]

instrument = minimalmodbus.Instrument(port, 1)
instrument.serial.baudrate = 9600
instrument.serial.timeout = 1
instrument.serial.stopbits = 1
instrument.serial.bytesize = 8
time.sleep(3)

running = True

while running:
    data = instrument.read_registers(0, 3)
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
