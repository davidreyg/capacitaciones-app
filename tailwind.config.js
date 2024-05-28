/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./app/Containers/AppSection/**/UI/WEB/views/**/*.blade.php",
    "./app/Ship/views/**/*.blade.php",
    "./resources/views/**/*.blade.php",
    "./vendor/robsontenorio/mary/src/View/Components/**/*.php",
  ],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui"), require("@tailwindcss/typography")],
};
