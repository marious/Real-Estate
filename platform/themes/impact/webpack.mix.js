let mix = require("laravel-mix");
const purgeCss = require("@fullhuman/postcss-purgecss");

const path = require("path");
let directory = path.basename(path.resolve(__dirname));
let execSync = require('child_process').execSync;

const source = "platform/themes/" + directory;
const dist = "public/themes/" + directory;

mix.sass(source + "/assets/sass/styles.scss", dist + "/css", {}, [])

    // .sass(source + '/assets/sass/rtl-style.scss', dist + '/css')


    mix.js(source + "/assets/js/script.js", dist + "/js")
        .js(source + "/assets/js/map-style2.js", dist + "/js")
    .js(source + "/assets/js/components.js", dist + "/js")
    .vue()

    .copyDirectory(dist + "/css/styles.css", source + "/public/css")
    // .copyDirectory(dist + '/css/rtl-style.css', source + '/public/css')
    .copyDirectory(dist + "/js", source + "/public/js");
