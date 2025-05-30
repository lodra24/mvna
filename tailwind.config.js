import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js', // JavaScript dosyalarınızda da Tailwind sınıfları kullanıyorsanız ekleyin
    ],

    theme: {
        extend: {
            fontFamily: {
                // Varsayılan sans fontunu Inter olarak ayarla
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            // İsterseniz özel renklerinizi veya diğer tema genişletmelerini buraya ekleyebilirsiniz
            // Örneğin, TimeSkip yeşili veya MindMetrics marka renkleri
            colors: {
                'mindmetrics-green': '#10B981',
                'mindmetrics-green-dark': '#059669',
                'mindmetrics-indigo': '#4f46e5', // Vurgu için indigo
                'mindmetrics-indigo-light': '#e0e7ff', // Butonlar için açık indigo
            }
        },
    },

    plugins: [forms],
};