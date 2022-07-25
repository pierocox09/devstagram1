module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    screens: {   
      'cel': '240px',
      // => @media (min-width: 240px) { ... }
      
      'celular': '460px',
      // => @media (min-width: 340px) { ... }

      'tablet': '640px',
      // => @media (min-width: 640px) { ... }

      'Alaptop': '720px',
      // => @media (min-width: 720px) { ... }

      'laptop': '1024px',
      // => @media (min-width: 1024px) { ... }

      'desktop': '1280px',
      // => @media (min-width: 1280px) { ... }

      'tv': '1536px',
      // => @media (min-width: 1536px) { ... }
    },
    extend: {

    },
  },
  plugins: [],
}