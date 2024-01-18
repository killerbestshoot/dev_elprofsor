/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Roboto', 'sans-serif'],
                serif: ['Merriweather', 'serif'],
                gloria: ['Gloria Hallelujah', 'cursive','Merienda'],
                merienda: ['Merienda', 'cursive'],
                rock:['Rock Salt','cursive'],
                damion:['Damion','cursive']
                // Ajoutez d'autres familles de polices personnalisées au besoin
            },
            backgroundImage: {
                'bodypic': "url('/public/img/elprofsor.jpg')",
                'bodypic2':"url('/public/img/1136x640_money_heist_team_illustration.jpg')",
                'bglogin':"url('/public/img/1280x1280_money_heist_2019_1578252302.jpg')",


                // Remplacez '/path/to/your/image.jpg' par le chemin réel de votre image
            },
        },
    },
    plugins: [],
}
