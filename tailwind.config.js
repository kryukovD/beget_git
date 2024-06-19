/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
      container:{
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
      require('flowbite/plugin')
    ]
  }
  