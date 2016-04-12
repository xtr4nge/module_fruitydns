#!/bin/bash

echo "installing FruityDNS..."

apt-get -y install python-ipy python-flask python-configobj
pip install dnslib

wget https://github.com/xtr4nge/dnschef/archive/master.zip -O dnschef-master.zip
unzip dnschef-master.zip

echo ""

echo "patching dnschef..."
patch dnschef-master/dnschef.py < patch/dnschef.py.patch

cp patch/fruitydns.conf dnschef-master/

echo "..DONE.."
exit

