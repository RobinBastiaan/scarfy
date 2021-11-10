module.exports = {
    purge: [
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {},
    },
    variants: {
        extend: {
            padding: ['hover'],
            transitionProperty: ['responsive', 'motion-safe', 'motion-reduce'],
        },
    },
    plugins: [],
}
