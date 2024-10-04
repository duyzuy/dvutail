module.exports = {
    content: ["./**/*.{html,js,php}"],
    theme: {
        screens: {
            sm: "480px",
            md: "768px",
            lg: "976px",
            xl: "1280px",
        },
        fontFamily: {
            sans: ["ProductSans", "sans-serif"],
            serif: ["Merriweather", "serif"],
        },
        // fontSize: {
        //     // sm: "0.8rem",
        //     // base: "1rem",
        // },
        extend: {
            keyframes: {
                wiggle: {
                    "0%, 100%": { transform: "rotate(-3deg)" },
                    "50%": { transform: "rotate(3deg)" },
                },
                "moving-text": {
                    "0%": {
                        transform: "translateX(0)",
                    },
                    "100%": {
                        transform: "translateX(-100%)",
                    },
                },
            },

            animation: {
                wiggle: "moving-text 30s linear infinite forwards",
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        // ...
    ],
};
