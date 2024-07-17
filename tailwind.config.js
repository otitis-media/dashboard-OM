/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#F6F6F6",
                secondary: {
                    default: "#FFFFFF",
                    100: "#E2E2D5",
                    200: "#888883",
                },
                hover_btn: "#161D6F",
                primary_btn: "#7B66FF",
            },
            fontFamily: {
                body: ["Nunito"],
            },
        },
    },
    plugins: [],
};
