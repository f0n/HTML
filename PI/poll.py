#!/usr/bin/env python

#pretty obvious, but you'll want these dependencies to be installed for this script to work
#import RPi.GPIO as GPIO, time, requests, os
import time, requests, os;

def cls():
    os.system(['clear','cls'][os.name == 'nt'])

DEBUG = 1

RED = 23
GREEN = 24
BLUE = 25
'''
GPIO.setmode(GPIO.BCM)
GPIO.setup(RED, GPIO.OUT)
GPIO.setup(GREEN, GPIO.OUT)
GPIO.setup(BLUE, GPIO.OUT)
'''
response = requests.get('http://gizmo-robotics.com/PI/test.php')

while response.text != 'exit':
    response = requests.get('http://gizmo-robotics.com/PI/test.php')

    colrs = response.text
    r = colrs[0]
    g = colrs[1]
    b = colrs[2]

   # cls()

    if response.text == 'exit':
        print (colrs)
    else:
        print ("R" + r + ", "),
        print ("G" + g + ", "),
        print ("B" + b)
        print
     
   # time.sleep(2) #uncomment this if you want the polling loop to be slower

'''
    if r == '1':
        GPIO.output(RED,True)
    else:
        GPIO.output(RED,False)
    if g  == '1':
        GPIO.output(GREEN,True)
    else:
        GPIO.output(GREEN,False)
    if b  == '1':
        GPIO.output(BLUE,True)
    else:
        GPIO.output(BLUE,False)
'''
   