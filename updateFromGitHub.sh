#! /bin/sh

git fetch NMarkgraf/Norman-s-Acadmical-Blog
git checkout NMarkgraf/Norman-s-Acadmical-Blog/master -- public
cp -R public/* .
chown -R normansefiroth:psaserv *
rm -rf public
