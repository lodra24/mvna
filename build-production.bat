@echo off
echo Building for Production...
echo =========================
echo.

echo Building frontend assets...
npm run build

echo.
echo Production build complete!
echo To deploy, upload all files to your server.
pause
