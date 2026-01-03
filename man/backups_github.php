Password to github.com sernuzh:comoN111++
Opencart sernuzh@gmail.com BfOnxlNOF2bZ PIN 4289
Admin dashboard - http://localhost/tennis/serhii
admin - comon111
b56bhjlhb@!fd ppl
comon111 pnr

rsync -azP --delete --exclude '.git/' --exclude 'error.html' /var/www/serhicart/ /mnt/ARCHIVE/SERHICART
----------------
push.sh

#!/bin/bash
commit_message=$(date +"%Y-%m-%d")
git add .
git commit -m "$commit_message"
git push -u origin main

chmod +x push.sh
terminal> ./push.sh
-----------------------------------
TERMINAL
git init
git remote add origin https://github.com/sernuzh/serhicart.git
git add .
git config --global user.email "sernuzh@gmail.com"
git config --global user.name "sernuzh"
git commit -m "Initial commit with local files"
git branch
* master
ssh-keygen -t ed25519 -C "sernuzh@gmail.com"
eval "$(ssh-agent -s)"
ssh-add ~/.ssh/id_ed25519
cat ~/.ssh/id_ed25519.pub    
(зявиться наступне його скопіювати і вставити отам в https://github.com/settings/keys там натиснути NEW SSH key і вставити)
ssh-ed25519 AAAAC3NzaC1lZDI1NTE5AAAAIPJUpbjcFhs9kStVxnzQuXcFBTXfkKpKySE4yDLNVJG3

git remote set-url origin git@github.com:sernuzh/tennis.git

далі все має працювати по цьому ключу SSH

git push -u origin main
