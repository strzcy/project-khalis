/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'mcd-red': '#DA291C',
        'mcd-yellow': '#FFCC00',
        'mcd-dark': '#27251F',
        'mcd-gray': '#D9D9D9',
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}