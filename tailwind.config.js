/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./views/*.php",
    "./node_modules/flowbite/**/*.js",
  ],
  
  darkMode: 'class',
  
  theme: {
    extend: {},
  },

  corePlugins: {
    aspectRatio: false,
  },
  
  plugins: [
    require('flowbite/plugin'),
    require('@tailwindcss/aspect-ratio'),
  ],

}

// npx tailwindcss -i ./input.css -o ./assets/css/output.css --watch

