@echo off
echo Starting Laravel Development Servers...
echo =====================================
echo.
echo Starting PHP development server on http://localhost:8000
echo Starting Vite development server for hot-reloading
echo.
echo Press Ctrl+C to stop the servers
echo.

start "Laravel Server" cmd /k "php artisan serve"
start "Vite Dev Server" cmd /k "npm run dev"

echo.
echo Servers are starting...
echo Laravel: http://localhost:8000
echo Vite: http://localhost:5173 (for hot-reloading)
echo.
echo You can now open http://localhost:8000 in your browser
pause
