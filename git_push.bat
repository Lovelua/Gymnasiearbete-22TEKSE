@echo off
cd /d "C:\Path\To\Your\Project"
git add .
git commit -m "Auto-commit: %date% %time%"
git push origin master
start "" "C:\Path\To\VSCode.exe" .  # Opens VSCode here