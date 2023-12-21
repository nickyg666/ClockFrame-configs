#!/bin/bash

python3 /home/clockframe/max17040.py;
while :; do
        cmd=$(($(cat /sys/class/thermal/thermal_zone0/temp) / 1000 * 9 / 5 + 32)); #read temp from system, convert to fahrenheit
        str2=" °F";
        echo "$cmd$str2" > /var/www/html/temp.txt;
        sleep 5; #don't update temp too fast, it doesnt change that quickly
        #Volts=$(($(i2cget -y 0 0x76 0x02) * 5 / 4 / 1000 / 16)); #need to convert command output to decimal first, this won't work
        #V=" V";
        #echo "$Volts$V" > /var/www/html/vbatt.txt;
        #sleep 1; # battery installed is very poor, only for failsafe
        c=i2cget -y 0 0x76 0x03 word;        capacity=$((c*5/4/1000/16));
        str3=" %";
        echo "$capacity$str3" > /var/www/html/battery.txt;

        #Capacity=$(($(i2cget -y 0 0x76 0x03) / 256 * 100));
        #Percentage="% Remaining";
        #echo "$Capacity$Percentage" > /var/www/html/batt_capacity.txt;
        #sleep 1;


done
