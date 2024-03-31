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
        // body colors 
        main_color: '#E5E5E5',
        main_color_dark: '#4F4F4F',
        secondary_color: '#D9D9D9',
        secondary_color_dark: '#999',
        sidebar_color: '#708090',
        sidebar_color_dark: '#333',
        // text colors 
        main_text_color: '#585050',
        sidebar_text_color: '#fff',


        auth_png_color: '#333333',
        // btn colors
        btn_submit_hover: 'rgb(63 96 128)',
        btn_primary_color: '#1A5DB4'
      }
    },
  },
  plugins: [
    require('tailwindcss'),
    require('autoprefixer'),
    require("tw-elements/plugin.cjs")
  ],
}

