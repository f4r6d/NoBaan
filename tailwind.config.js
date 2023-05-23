/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./node_modules/flowbite/**/*.js",
  ],

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

// npx tailwindcss -i ./input.css -o ./assets/output.css --watch

