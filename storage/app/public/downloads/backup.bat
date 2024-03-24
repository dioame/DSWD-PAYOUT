@echo off


REM Set the path to your Laravel project
set PROJECT_PATH=C:\laragon\www\DSWD-PAYOUT

REM Change directory to your Laravel project
cd /d "%PROJECT_PATH%"

REM Execute php artisan serve
for /f "tokens=2 delims==" %%I in ('wmic os get localdatetime /value') do set "datetime=%%I"
set "timestamp=%datetime:~0,4%-%datetime:~4,2%-%datetime:~6,2%_%datetime:~8,2%-%datetime:~10,2%-%datetime:~12,2%"


mysqldump -u root -p dswd-payout > dswd-payout_%timestamp%.sql
echo "Backup Successful"

REM Pause to keep the command prompt open after execution (optional)
pause