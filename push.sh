#!/bin/bash
commit_message=$(date +"%Y-%m-%d")
git add .
git commit -m "$commit_message"
git push -u origin main