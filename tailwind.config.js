import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            spacing: {
                fit: "fit-content",
                fill: "-webkit-fill-available",
                10: "10%",
                30: "30%",
                40: "40%",
                50: "50%",
                60: "60%",
                70: "70%",
                80: "80%",
                85: "85%",
                90: "90%",
            },
            colors: {
                primary: "#40513B",
                secondary: "#7d8f85",
            },
        },
    },
    plugins: [forms],
};
