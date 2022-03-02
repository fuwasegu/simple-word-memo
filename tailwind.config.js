module.exports = {
    purge: [
        './resources/**/*.blade.php',
    ],
    darkMode: false, // or 'media' or 'class'
    variants: {
        extend: {},
    },
    plugins: [],
    theme: {
        extend: {
            fontFamily: {
                kingdom: ["Kingdom"],
            },
        },
        fontSize: {
            '8px': '8px',
            '16px': '16px',
            '24px': '24px',
            '32px': '32px',
            '40px': '40px',
            '48px': '48px',
            '64px': '64px',
            '128px': '128px',
            '256px': '256px',
        }
    },
}
