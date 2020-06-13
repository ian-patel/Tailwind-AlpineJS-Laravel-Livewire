module.exports = {
    purge: ["./resources/views/**/*.blade.php"],
    theme: {
        filter: {
            none: "none",
            grayscale: "grayscale(1)",
            invert: "invert(1)",
            sepia: "sepia(1)"
        },
        backdropFilter: {
            none: "none",
            blur: "blur(20px)"
        },
        extend: {}
    },
    variants: {
        filter: ["responsive", "hover", "focus", "group-hover"],
        backdropFilter: ["responsive", "hover", "focus", "group-hover"]
    },
    plugins: [
        require("@tailwindcss/ui"),
        require("@tailwindcss/custom-forms"),
        require("tailwindcss-filters")
    ]
};
