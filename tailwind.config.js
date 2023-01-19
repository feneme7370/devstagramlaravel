/** @type {import('tailwindcss').Config} */
module.exports = {
  //donde se van a aplicar estilos tailwind
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php"
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
