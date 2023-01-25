#LCD Commands
#lcd.lcd_clear() < clears LCD screen
#lcd.lcd_write("TEXT", LINE 1 or 2) < write to LCD

#LED Command
#led.set_output(24, level)

from hal import hal_led as LED
from hal import hal_keypad as KEYPAD
from hal import hal_lcd as LCD
from hal import hal_rfid_reader as RFID
from time import sleep as sleep

pin = [1, 2, 3, 4]

def LED_on():
    LED.set_output(24,1)

def LED_off():
    LED.set_output(24,0)

def LCDinit():
    lcd = LCD.lcd()
    lcd.lcd_clear()
    print("check LCD")
    sleep(1)
    LED_on()
    print("check LED ON")
    sleep(1)
    LED_off()
    print("check LED OFF")
    sleep(1)

def camera():
    counter = 0
    lcd = LCD.lcd()
    #scan = camera read
    print("Scan items using Pi camera")
    #<camera read funtion>

    if scan == True: #<------------------------------change scan variable
        counter+1
        lcd.lcd_write("Item scanned", 1)
        lcd.lcd_write("Items: " + counter, 2)

    elif (input() == 2) or (KEYPAD.get_key() == '*'):
        payment()

    else:
        LED_on()
        print("invalid item, scan again")
        sleep(1)

def payment():
    selector = input("Select payment method: \n1. Paywave\n2. NETS")
    if selector == 1:
        RFIDpayment()
    elif selector == 2:
        NETSpayment()
    else:
        print("Please select valid payment method")

def RFIDpayment():
    lcd = LCD.lcd()
    lcd.lcd_write("Tap card on reader", 1)
    if RFID == True:#                        <----------------------------Change accordingly
        lcd.lcd_write("Success", 2)
        print("Payment successful")
        sleep(1)
    else:
        lcd.lcd_write("Failed", 2)
        print("Payment failed")
        sleep(1)

def NETSpayment():
    lcd = LCD.lcd()
    lcd.lcd_write("Enter Pin", 1)
    lcd.lcd_write(KEYPAD.get_key(), 2)
    if (KEYPAD.get_key() == '#'):
        if(KEYPAD.get_key() != pin):
            lcd.lcd_write("failed", 2)
        else:
            lcd.lcd_write("success", 2)



def main():
    LCDinit()
    lcd = LCD.lcd()
    start = input("Welcome to SP Supermarket \n------------------------------------------- \nPlease enter 1 to start")

    if start == 1:
        camera()

if __name__ == "__main__":
    main()
