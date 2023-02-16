import RPi.GPIO as GPIO
from picamera import PiCamera
from hal import hal_led as LED
from hal import hal_keypad as KEYPAD
from hal import hal_lcd as LCD
from hal import hal_rfid_reader as RFID
from time import sleep as sleep
from threading import Thread


#camera
#cam = PiCamera()
#sleep(2)
#camera.capture
#========

global keypressed
pin = []
correctPin = {1, 2, 3, 4}

Prod1 = 980711205417
Prod2 = 584185249835
Prod1Price = 2.00
Prod2Price = 3.15

def readKeypad(key):
    global keypressed
    keypressed = key
    print("Here 1")
    print(key)
    print("Here 2")

def Thread_Monitor_Keypad():
    KEYPAD.get_key()

#def keypadTest():
#    global pin
#    lcd = LCD.lcd()
#    lcd.lcd_display_string("Keypad test", 1)
#    KEYPAD.init(key_pressed)
#    print("Here 5")
#    KEYPAD.get_key()
#    #print("Here 3")
#    #print(pin)
    #print("Here 4")
#    lcd.lcd_display_string(str(pin), 2)

def init():
    GPIO.setmode(GPIO.BCM)  # choose BCM mode
    GPIO.setwarnings(False)
    GPIO.setup(24, GPIO.OUT)  # set GPIO 24 as output
    lcd = LCD.lcd()

    lcd.lcd_clear()
    lcd.lcd_display_string("Testing System", 1)
    lcd.lcd_display_string("Version 1", 2)

    LED_on()
    sleep(1)
    LED_off()
    sleep(1)
    print("LED OK")

    RFID.init()
    rfid = RFID.init()
    print("RFID init OK")
    print("Card detected: ", rfid.read_id())


def LED_on():
    LED.set_output(24, 1)


def LED_off():
    LED.set_output(24, 0)

def scanItemRFID():
    rfid = RFID.init()
    lcd = LCD.lcd()
    count = 0

    lcd.lcd_display_string("Scan on RFID", 1)

    while True:
        if rfid.read_id() == Prod1:
            lcd.lcd_display_string("Prod1 scanned",1)
            count+=1
            lcd.lcd_display_string("$" + str(Prod1Price) + ", Qty: " + str(count),2)
            sleep(1)
        elif rfid.read_id() == Prod2:
            lcd.lcd_display_string("Prod2 scanned", 1)
            count+=1
            lcd.lcd_display_string("$" + str(Prod2Price) + ", Qty: " + str(count),2)
            sleep(1)





def paywave_payment():
    lcd = LCD.lcd()
    rfid = RFID.init()
    lcd.lcd_display_string("paywave payment: ", 1)
    sleep(1)
    lcd.lcd_clear()
    lcd.lcd_display_string("Please tap your ", 1)
    lcd.lcd_display_string("Card on RFID: ", 2)
    if rfid.read_id() == 17042980636:
        lcd.lcd_clear()
        lcd.lcd_display_string("Thank you for", 1)
        lcd.lcd_display_string("your purchase", 2)
        sleep(200)
    else:
        lcd.lcd_clear()
        lcd.lcd_display_string("Payment failed", 1)
        lcd.lcd_display_string("Try again?", 2)


def main():
    global keypressed
    keypressed = 'X'
    lcd = LCD.lcd()
    lcd.lcd_clear()

    t1=Thread(target = Thread_Monitor_Keypad()
    print(keypressed)
    lcd.lcd_display_string(str(keypressed),2)

    #Working functions:
    #init()
    #scanItemRFID()
    #paywave_payment()



if __name__ == "__main__":
    main()

