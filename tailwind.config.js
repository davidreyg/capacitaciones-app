const colors = require("tailwindcss/colors");
import preset from "./vendor/filament/support/tailwind.config.preset";

/** @type {import('tailwindcss').Config} */
export default {
  presets: [preset, require("./vendor/wireui/wireui/tailwind.config.js")],
  content: [
    "./app/Containers/AppSection/**/UI/WEB/Views/**/*.blade.php",
    // "./app/Containers/AppSection/**/UI/WEB/Views/*.blade.php",
    "./app/Ship/views/**/*.blade.php",
    "./resources/views/**/*.blade.php",
    "./vendor/robsontenorio/mary/src/View/Components/**/*.php",

    "./vendor/wireui/wireui/resources/**/*.blade.php",
    "./vendor/wireui/wireui/ts/**/*.ts",
    "./vendor/wireui/wireui/src/View/**/*.php",

    "./vendor/filament/**/*.blade.php",
  ],
  darkMode: "class",
  safelist: [
    // Lista de clases que siempre se deben incluir en el CSS final
    "btn-error",
    "bg-error",
  ],
  theme: {
    extend: {
      colors: {
        primary: colors.indigo,
        secondary: colors.gray,
        positive: colors.emerald,
        negative: colors.red,
        warning: colors.amber,
        info: colors.blue,
      },
    },
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
    darkTheme: "dark", // name of one of the included themes for dark mode
    base: true, // applies background color and foreground color for root element by default
    styled: true, // include daisyUI colors and design decisions for all components
    utils: true, // adds responsive and modifier utility classes
    prefix: "", // prefix for daisyUI classnames (components, modifiers and responsive class names. Not colors)
    logs: true, // Shows info about daisyUI version and used config in the console when building your CSS
    themeRoot: ":root", // The element that receives theme color CSS variables
  },
};
