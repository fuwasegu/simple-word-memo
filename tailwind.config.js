module.exports = {
    purge: [
        './resources/**/*.blade.php',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        colors: {
            main: {
                light: '#FBC7F7',
                DEFAULT: '#FB7AFC'
            },
            gray: {
                light: '#999999',
                DEFAULT: '#999999'
            },
            black: {
                DEFAULT: '#555555'
            },
            orange: {
                DEFAULT: '#FF6347'
            }
        },
        extend: {

        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
