## /etc/NetworkManager/dnsmasq.d/00-clockframe.conf
  # tell dnsmasq to trick clients into popping captive portal page and redirects to custom address clockframe.wifi
interface=wlan0
listen-address=10.0.0.1
domain-needed
bogus-priv
local=/wifi/
addn-hosts=/etc/hosts

dhcp-range=10.0.0.140,10.0.0.250,255.0.0.0,8h


dhcp-option-force=114,clockframe.wifi/index.php
address=/clockframe.wifi/10.0.0.1/
address=/connectivitycheck.gstatic.com/216.58.206.131
address=/www.gstatic.com/216.58.206.99
address=/www.apple.com/2.16.21.112
address=/captive.apple.com/17.253.35.204
address=/clients3.google.com/216.58.204.46
address=/www.msftconnecttest.com/13.107.4.52
dhcp-option-force=160,10.0.0.1/index.php
