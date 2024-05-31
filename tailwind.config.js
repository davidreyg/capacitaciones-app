import preset from "./vendor/filament/support/tailwind.config.preset";

/** @type {import('tailwindcss').Config} */
export default {
  presets: [preset],
  content: [
    "./app/Containers/AppSection/**/UI/WEB/Views/**/*.blade.php",
    // "./app/Containers/AppSection/**/UI/WEB/Views/*.blade.php",
    "./app/Ship/views/**/*.blade.php",
    "./resources/views/**/*.blade.php",
    "./vendor/robsontenorio/mary/src/View/Components/**/*.php",
    "./vendor/filament/**/*.blade.php",
  ],
  darkMode: "class",
  safelist: [
    // Lista de clases que siempre se deben incluir en el CSS final
    "btn-error",
    "bg-error",
  ],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui"), require("@tailwindcss/typography")],
  daisyui: {
    themes: [
      "light",
      "dark",
      "cupcake",
      "bumblebee",
      "emerald",
      "corporate",
      "synthwave",
      "retro",
      "cyberpunk",
      "valentine",
      "halloween",
      "garden",
      "forest",
      "aqua",
      "lofi",
      "pastel",
      "fantasy",
      "wireframe",
      "black",
      "luxury",
      "dracula",
      "cmyk",
      "autumn",
      "business",
      "acid",
      "lemonade",
      "night",
      "coffee",
      "winter",
      "dim",
      "nord",
      "sunset",
    ],
  },
};
