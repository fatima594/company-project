// tailwind.config.js
/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/views/**/*.blade.php",  // مسارات ملفات Blade
        "./resources/js/**/*.js",            // مسارات ملفات JavaScript
        "./resources/css/**/*.css",          // مسارات ملفات CSS
        "./public/**/*.html"                 // مسارات ملفات HTML إذا كانت موجودة في مجلد public
    ],
    theme: {
        extend: {},
    },
    plugins: [],
}
