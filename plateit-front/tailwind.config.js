/** @type {import('tailwindcss').Config} */
module.exports = {
   darkMode: 'selector',
  purge: ['./index.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
  content: [
    "./src/**/*.{html,js}",
    "./node_modules/tw-elements/js/**/*.js"
  ],
  theme: {
    extend: {
      colors:{
        main_color: '#E5E5E5',
        main_color_dark: '#4F4F4F',
        secondary_color: '#D9D9D9',
        main_text_color: '#57565B',
        sidebar_color: '#708090',
        auth_png_color: '#333333',
        btn_submit: 'rgb(63 96 128)'
      }
    },
  },
  plugins: [
    require('tailwindcss'),
    require('autoprefixer'),
    require("tw-elements/plugin.cjs")
  ],
}

