@echo off

REM Set the path to your Laravel project
set PROJECT_PATH=C:\laragon\www\DSWD-PAYOUT

REM Change directory to your Laravel project
cd /d "%PROJECT_PATH%"

REM Execute php artisan serve
git pull

REM Pause to keep the command prompt open after execution (optional)
pause