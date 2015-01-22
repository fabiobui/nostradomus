#!/bin/bash
ipme="$(curl v4.ident.me)"
if [ -z "$ipme" ]
then 
  ipme="$(wget -qO- ifconfig.me/ip)"
fi
if [ -z "$ipme" ]
then 
  ipme="$(wget -qO- http://ipecho.net/plain)"
fi
if [ -z "$ipme" ]
then 
  echo "Nessun IP pubblico disponibile!"
else
  curl -i -H "Content-type: application/json" -b cookies.txt -X POST http://www.nostradomus.it:8080/ws -d '
  {  
    "email":"fabio.bui@libero.it", 
    "key":"mypersonalkey",
     "myip":"'"$ipme"'"
  }' > /dev/null 2>&1
fi