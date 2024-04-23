/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./dist/*.{html,js}",  "./node_modules/flowbite/**/*.js"],
  theme: {
      extend: {
        colors: {
          theme: "#e4a926",
          accent: "#3d1911",
          dark: "#101010",
          light: "#fafafa",
        },
        backgroundImage: {
          
          'heroImg': "url('assets/img/hero.png')",
          'aboutImg': "url('assets/img/about.jpg')",
          'courses': "url('dist/assets/img/courses.jpg')",
        },
        fontFamily: {
          'luckiest': ['Luckiest Guy', 'sans-serif'],
        },
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

