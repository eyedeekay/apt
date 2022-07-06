#! /usr/bin/env sh
#rm -f deb.i2p2.de.tar.gz
rm -fr dists/unstable \
 dists/oldoldstable \
 dists/oldstable \
 dists/stable
wget -c -O deb.i2p2.de.tar.gz https://deb.i2p2.de/deb.i2p2.de.tar.gz
tar --strip-components=4 --keep-directory-symlink -xvzf deb.i2p2.de.tar.gz
docker run -it -w /home  --name php7-cli -v $(pwd):/home/ --rm phpdockerio/php71-cli php /home/index.php > index.html
./fakeod