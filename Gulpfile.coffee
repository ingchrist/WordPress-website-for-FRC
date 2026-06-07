gulp = require "gulp"
watch = require "gulp-watch"
plumber = require "gulp-plumber"
shell = require "gulp-shell"

concat = require "gulp-concat"
uglify = require "gulp-uglify"

sass = require "gulp-sass"
maps = require "gulp-sourcemaps"
autoprefixer = require "gulp-autoprefixer"
coffee = require "gulp-coffee"
modernizr = require "gulp-modernizr"

# CONFIGURATION
config =
  sass: {}
  autoprefixer: {}
  coffee: {}
  modernizr: {}

# Sass
config.sass.frontend =
  outputStyle: "compressed"
  includePaths: [
    "./scss/"
    "./frontend/scss/"
  ]

config.sass.forums =
  outputStyle: "compressed"
  includePaths: [
    "./scss/"
    "./forums/scss/"
  ]

config.sass.editor =
  outputStyle: "compressed"
  includePaths: [
    "./scss/"
    "./editor/scss/"
  ]

# Autoprefixer
config.autoprefixer =
  browsers: [
    "last 2 versions"
    "firefox esr"
    "ie 8"
    "> 3%"
  ]
  cascade: true

# CoffeeScript
config.coffee =
  bare: true

# Modernizr
config.modernizr = {}

# TASKS
tasks =
  sass: {}
  coffee: {}

# Sass, frontend
tasks.sass.frontend = ->
  gulp.src "./scss/skins/*.scss"
    .pipe plumber()
    .pipe maps.init()
    .pipe sass config.sass.frontend
    .pipe autoprefixer config.autoprefixer
    .pipe maps.write()
    .pipe gulp.dest "./frontend/gen/"

# Sass, forums
tasks.sass.forums = ->
  gulp.src "./scss/skins/*.scss"
    .pipe plumber()
    .pipe maps.init()
    .pipe sass config.sass.forums
    .pipe autoprefixer config.autoprefixer
    .pipe maps.write()
    .pipe gulp.dest "./forums/gen/"

# Sass, editor
tasks.sass.editor = ->
  gulp.src "./scss/skins/*.scss"
    .pipe plumber()
    .pipe maps.init()
    .pipe sass config.sass.editor
    .pipe autoprefixer config.autoprefixer
    .pipe maps.write()
    .pipe gulp.dest "./editor/gen/"

# CoffeeScript, frontend
tasks.coffee.frontend = ->
  gulp.src [
    "./coffee/*.coffee"
    "./frontend/coffee/*.coffee"
  ]
    .pipe plumber()
    .pipe maps.init()
    .pipe concat "frontend.js"
    .pipe coffee config.coffee
    .pipe uglify()
    .pipe maps.write()
    .pipe gulp.dest "./frontend/gen/"

# CoffeeScript, forums
tasks.coffee.forums = ->
  gulp.src [
    "./coffee/*.coffee"
    "./forums/coffee/*.coffee"
  ]
    .pipe plumber()
    .pipe maps.init()
    .pipe concat "forums.js"
    .pipe coffee config.coffee
    .pipe uglify()
    .pipe maps.write()
    .pipe gulp.dest "./forums/gen/"

# Modernizr
tasks.modernizr = ->
  gulp.src [
    "bower_components/**/*.js"
    "bower_components/**/*.css"
    "frontend/**/*.js"
    "frontend/**/*.scss"
    "forums/**/*.js"
    "forums/**/*.scss"
    "editor/**/*.js"
    "editor/**/*.scss"
    "scss/**/*.scss"
  ]
    .pipe modernizr()
    .pipe uglify()
    .pipe gulp.dest "./frontend/gen/"

# Sass tasks
gulp.task "sass:frontend", tasks.sass.frontend
gulp.task "sass:forums", tasks.sass.forums
gulp.task "sass:editor", tasks.sass.editor

# Sass watch tasks
gulp.task "sass:frontend:watch", ->
  watch [
    "./scss/**/*.scss"
    "./frontend/scss/*.scss"
  ], tasks.sass.frontend

gulp.task "sass:forums:watch", ->
  watch [
    "./scss/**/*.scss"
    "./forums/scss/*.scss"
  ], tasks.sass.forums

gulp.task "sass:editor:watch", ->
  watch [
    "./scss/**/*.scss"
    "./editor/scss/*.scss"
  ], tasks.sass.editor

# General Sass watch task
gulp.task "sass:watch", ->
  watch [
    "./scss/**/*.scss"
    "./frontend/scss/*.scss"
    "./forums/scss/*.scss"
    "./editor/scss/*.scss"
  ], ->
    tasks.sass.frontend()
    tasks.sass.forums()
    tasks.sass.editor()

# CoffeeScript tasks
gulp.task "coffee:frontend", tasks.coffee.frontend
gulp.task "coffee:forums", tasks.coffee.forums

# CoffeeScript watch tasks
gulp.task "coffee:frontend:watch", ->
  watch [
    "./coffee/*.coffee"
    "./frontend/coffee/*.coffee"
  ], tasks.coffee.frontend

gulp.task "coffee:forums:watch", ->
  watch [
    "./coffee/*.coffee"
    "./forums/coffee/*.coffee"
  ], tasks.coffee.forums

# General CoffeeScript watch task
gulp.task "coffee:watch", ->
  watch [
    "./coffee/*.coffee"
    "./frontend/coffee/*.coffee"
    "./forums/coffee/*.coffee"
  ], ->
    tasks.coffee.frontend()
    tasks.coffee.forums()

# Modernizr
# Scans development files for references to modernizr classes
# and builds modernizr for them.
gulp.task "modernizr", tasks.modernizr

# General tasks
gulp.task "sass", ["sass:frontend", "sass:forums", "sass:editor"]
gulp.task "skins", ["sass"]
gulp.task "coffee", ["coffee:frontend", "coffee:forums"]

# Install task
# Installs all dependencies
gulp.task "install", shell.task [
  "npm install"
  "echo npm install finished"
  "bower install"
  "echo bower install finished"
  "composer install"
  "echo composer install finished"
]

# Build task
# Builds Sass, CoffeeScript, and Modernizr assets
gulp.task "build", [
  "sass"
  "coffee"
  "modernizr"
]

# Setup task
# Sets up the development environment
gulp.task "setup", [
  "install"
  "build"
]

# Watch task
# Watches all assets and compiles on change
# Is slow, not recommended
gulp.task "watch", ->
  watch [
    "./scss/**/*.scss"
    "./frontend/scss/*.scss"
    "./forums/scss/*.scss"
    "./editor/scss/*.scss"
    "./coffee/*.coffee"
    "./forums/coffee/*.coffee"
  ], ->
    tasks.sass.frontend()
    tasks.sass.forums()
    tasks.sass.editor()
    tasks.coffee.frontend()
    tasks.coffee.forums()


gulp.task "default", ["build"]
