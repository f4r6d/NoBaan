/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./views/**/*.php",
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

// run this code to update css
// npx tailwindcss -i ./input.css -o ./assets/css/output.css --watch

