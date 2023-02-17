import RPi.GPIO as GPIO
from hal import hal_lcd as LCD
from hal import hal_rfid_reader as RFID
from time import sleep as sleep

pin = []
lcd = LCD.lcd()

Prod1 = 647204679662
Prod2 = 584156699171
paymentCard = 584185249835 #Kopitiam card for payment
Prod1Price = 2.00
Prod2Price = 3.15

def scanItemRFID(): #REQ-01 - REQ-03
    lcd.lcd_clear()

    total = 0
    count = 0

    rfid = RFID.init()

    systemPrompt = input("Enter 'start' to begin\nPayment will prompt after 5 item scans")
    lcd.lcd_display_string("Scan on RFID", 1)

    if systemPrompt == 'start':
        while True:
            for i in range(5):
                if rfid.read_id() == Prod1:
                    lcd.lcd_display_string("Prod1 scanned ", 1)

                    count += 1
                    lcd.lcd_display_string("$" + str(Prod1Price) + ", Qty: " + str(count), 2)
                    total += Prod1Price
                    print("Total: ", total, "count: ", count)
                    sleep(1)

                elif rfid.read_id() == Prod2:
                    lcd.lcd_display_string("Prod2 scanned ", 1)
                    count += 1
                    lcd.lcd_display_string("$" + str(Prod2Price) + ", Qty: " + str(count), 2)
                    total += Prod2Price
                    print("Total: ", total, "count: ", count)
                    sleep(1)
            payPrompt = input("Payment? (y/n)")

            if payPrompt == 'y' or payPrompt == 'Y':
                payment_popup(total,count)

            elif payPrompt == 'n' or payPrompt == 'N':
                scanItemRFID()

    else:
        print("goodbye")
        main()

def nets_payment(a,t,c):
    var1 = t
    var2 = c
    correctPin = 123456
    if a == correctPin:
        lcd.lcd_display_string("Thank you for", 1)
        lcd.lcd_display_string("your purchase", 2)
        print("payment success")
        sleep(2)
        main()
    else:
        lcd.lcd_clear()
        lcd.lcd_display_string("Payment failed", 1)
        lcd.lcd_display_string("Try again?", 2)
        retry = input("Payment failed. \nTry again? (Y/N)")
        if retry == "Y" or "y":
            print("nets if y")
            payment_popup(var1,var2)


def paywave_payment(card_found, paymentCard,t,c): #REQ-04
    var1 = t
    var2 = c
    rfid = RFID.init()
    if card_found == paymentCard:
        lcd.lcd_clear()
        lcd.lcd_display_string("Thank you for", 1)
        lcd.lcd_display_string("your purchase", 2)
        print("payment success")
        sleep(2)
        main()

    else:
        lcd.lcd_clear()
        lcd.lcd_display_string("Payment failed", 1)
        lcd.lcd_display_string("Try again?", 2)
        print("paywave else")
        retry = input("Payment failed. \nTry again? (y/m)")

        if retry == "Y" or "y":
            print("paywave if y")
            payment_popup(var1,var2)

def payment_popup(t,c):
    rfid = RFID.init()
    lcd.lcd_clear()
    lcd.lcd_display_string("Subtotal: " + str(t) + "               ", 1)
    lcd.lcd_display_string("No. items: " + str(c) + "               ", 2)
    prompt = input("1. Paywave\n2. NETS")
    if prompt =="1":
        lcd.lcd_clear()
        print("tap card on RFID")
        lcd.lcd_display_string("Please tap your ", 1)
        lcd.lcd_display_string("Card on RFID: ", 2)

        paywave_payment(rfid.read_id(), paymentCard,t,c)

    elif prompt == "2":
        lcd.lcd_clear()
        nets_input = int(input("Please enter your pin"))
        lcd.lcd_display_string("Please enter ", 1)
        lcd.lcd_display_string("your NETS pin ", 2)
        nets_payment(nets_input,t,c)

    else:
        print("invalid input!")

def init():

    GPIO.setmode(GPIO.BCM)  # choose BCM mode
    GPIO.setwarnings(False)
    GPIO.setup(24, GPIO.OUT)  # set GPIO 24 as output
    lcd = LCD.lcd()

    lcd.lcd_clear()
    lcd.lcd_display_string("SuperMart", 1)
    lcd.lcd_display_string("Version 1", 2)

    print("LED OK")

    RFID.init()
    rfid = RFID.init()
    print("RFID init OK\nScan cards 2x times")
    for i in range(2):
        print("Card detected: ", rfid.read_id())
        sleep(1)


def main():
    #init()
    scanItemRFID()
    #payment_popup()


if __name__ == "__main__":
    main()

