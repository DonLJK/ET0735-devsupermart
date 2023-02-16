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
def read_cam():
    pass

global total
global count
total = 0
count = 0


pin = []
correctPin = {1, 2, 3, 4}

Prod1 = 948765671378
Prod2 = 137218178821
paymentCard = 584185249835 #Kopitiam card for payment
Prod1Price = 2.00
Prod2Price = 3.15


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
    lcd.lcd_display_string("SuperMart", 1)
    lcd.lcd_display_string("Version 1", 2)

    LED_on()
    sleep(1)
    LED_off()
    sleep(1)
    print("LED OK")

    RFID.init()
    rfid = RFID.init()
    print("RFID init OK\nScan cards 3x times")
    for i in range(3):
        print("Card detected: ", rfid.read_id())
        sleep(1)


def LED_on():
    LED.set_output(24, 1)


def LED_off():
    LED.set_output(24, 0)

def scanItemRFID():
    global total
    global count
    rfid = RFID.init()
    lcd = LCD.lcd()


    systemPrompt = input("Enter 'start' to begin\nPayment will prompt after 10 item scans")
    lcd.lcd_display_string("Scan on RFID", 1)

    while True:
        if systemPrompt == 'start':
            for i in range(10):
                if rfid.read_id() == Prod1:
                    lcd.lcd_display_string("Prod1 scanned",1)

                    count+=1
                    lcd.lcd_display_string("$" + str(Prod1Price) + ", Qty: " + str(count),2)
                    total+=Prod1Price
                    print("Total: ", total, "count: ", count)
                    sleep(1)
                elif rfid.read_id() == Prod2:
                    lcd.lcd_display_string("Prod2 scanned", 1)
                    count+=1
                    lcd.lcd_display_string("$" + str(Prod2Price) + ", Qty: " + str(count),2)
                    total+=Prod2Price
                    print("Total: ", total, "count: ", count)
                    sleep(1)
            payPrompt = input("Payment? (y/n)")
            if payPrompt =='y' or 'Y':
                paywave_payment()
            elif payPrompt =='n' or 'N':
                scanItemRFID()
        else:
            print("goodbye")
            break





def paywave_payment():
    lcd = LCD.lcd()
    rfid = RFID.init()
    lcd.lcd_display_string("paywave payment: ", 1)
    sleep(1)
    lcd.lcd_clear()
    lcd.lcd_display_string("Subtotal is: " + str(total), 1)
    lcd.lcd_display_string("No. items: "+ str(count), 2)
    sleep(2)
    lcd.lcd_display_string("Please tap your ", 1)
    lcd.lcd_display_string("Card on RFID: ", 2)
    if rfid.read_id() == 584185249835:
        lcd.lcd_clear()
        lcd.lcd_display_string("Thank you for", 1)
        lcd.lcd_display_string("your purchase", 2)
        sleep(200)

    else:
        lcd.lcd_clear()
        lcd.lcd_display_string("Payment failed", 1)
        lcd.lcd_display_string("Try again?", 2)
        input("Payment failed. \nTry again? (Y/N)")
        if input()=='Y' or 'y':
            paywave_payment()
        elif input()=='N'or 'n':
            lcd.lcd_clear()
            print("End")
            lcd.lcd_display_string("Goodbye!",1)


def main():
    #init()
    scanItemRFID()
    #paywave_payment()





if __name__ == "__main__":
    main()

