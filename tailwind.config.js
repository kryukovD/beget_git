/** @type {import('tailwindcss').Config} */
const plugin = require('tailwindcss/plugin')
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    screens: {
      "xs": '460px',
      'sm': '640px',
      // => @media (min-width: 640px) { ... }

      'md': '768px',
      // => @media (min-width: 768px) { ... }

      'lg': '1024px',
      // => @media (min-width: 1024px) { ... }

      'xl': '1280px',
      'xxl': '1600px'
    },
    colors: {

      "primary": "#F5F5F5",
      "accent":"#007AFF",
      "m-color":"#333333",
      "accent-second": "#AAAAAA",

    },
    container: {
      screens: {
        'sm': '100%',
        'md': '100%',
        'lg': '100%',
        'xl': '1240px',
        '2xl': '1400px',
    
      },
    },
    fontFamily: {
      "roboto": "Roboto_G",

    },
    extend: {
      backgroundImage: {
        'circle': "url('/resources/assets/images/rectangle.png')",
        'line': "url('/resources/assets/images/line.png')",
      },

    },
  },
  plugins: [
    plugin(function ({ addUtilities }) {
      const newUtilities = {
        '.clip-path-rect': {
          clipPath: "polygon(95% 0, 100% 10%, 100% 100%, 0 100%, 0 0);"
        },
        '.clip-path-square': {
          clipPath: "polygon(85% 0, 100% 10%, 100% 100%, 0 100%, 0 0);"
        },
        '.box-shadow-primary': {
          boxShadow: "0px 0px 5px #AAAAAA;"
        },
        '.box-shadow-theme':{
           boxShadow: "0px 0px 5px #007AFF;"
        }


      }

      addUtilities(newUtilities, ['responsive', 'hover'])
    }),
    require('flowbite/plugin')
  ]
}
