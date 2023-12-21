/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './*.{html,php}',
    './app/vista/*.{html,php}',
    './app/vista/templates/*.{html,php}',
    './assets/js/*.{html,js}',
  ],
  theme: {
    fontFamily: {
      'roboto': "Roboto"
    },
    extend: {
      colors:{
        'formulario': 'rgba(255, 255, 255, 0.20)',
        'rosa' : '#FF2C78',
        'placeholder' : 'rgba(255, 255, 255, 0.40)',
        'input' : 'rgba(2, 5, 16, 0.70);'
      },
      maxWidth:{
        'screen-2xl':'1600px',
        'screen-xl':'1500px',
      }
    },
    fontSize: {
      sm: '14px',
      sl: '16px',
      base1: '18px',
      30: '30px',
      22: '22px',
      xl: '50px',
      60: '60px',
    },
  },
  plugins: [],
}