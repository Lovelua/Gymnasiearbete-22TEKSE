@echo off
:: Auto Git Push + VS Code Opener
:: -----------------------------------

:: 1. Navigate to your project (escape spaces & special chars)
cd /d "C:\Users\Chiril\OneDrive - Academedia\Documents\mina studier\Gymnasiearbete 22TEKSE & databas\Gymnasiearbete 22TEKSE"

:: 2. Git operations
git add . 
if %errorlevel% neq 0 (
    echo ERROR: Git add failed! Check for unstaged changes.
    pause
    exit /b
)

git commit -m "Auto-commit: %date% %time%"
if %errorlevel% neq 0 (
    echo ERROR: Commit failed! No changes detected?
    pause
    exit /b
)

git push origin master
if %errorlevel% neq 0 (
    echo ERROR: Push failed! Check network/GitHub access.
    pause
    exit /b
)

:: 3. Auto-launch VS Code (dynamic path)
set "vscode_path=%LOCALAPPDATA%\Programs\Microsoft VS Code\Code.exe"
if exist "%vscode_path%" (
    start "" "%vscode_path%" .
) else (
    echo WARNING: VS Code not found at default location.
    echo Install it or update the path in this script.
)

echo SUCCESS: All changes pushed and VS Code opened!
timeout /t 3