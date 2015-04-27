module.exports = function(grunt) {

    // 1. All configuration goes here
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        concat: {
          dist: {
             src: [
                 '../assets/js/lib/*.js', // All JS in the libs folder
                 '../assets/js/*.js', // All JS in the libs folder
                 '../assets/js/global.js'  // This specific file
             ],
             dest: 'public/js/production.js',
         }
       },
        uglify: {
            build: {
                src: 'public/js/production.js',
                dest: 'public/js/production.min.js'
            }
        },
        imagemin: {
            dynamic: {
                files: [{
                    expand: true,
                    cwd: '../assets/imgs/',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: 'public/imgs/'
                }]
            }
        },
        sass: {
            dist: {
                options: {
                    style: 'compressed'
                },
                files: {
                    '../assets/scss/global.css': '../assets/scss/global.scss'
                }
            }
        },
        autoprefixer: {
            dist: {
                files: {
                    'public/css/global.css': '../assets/scss/global.css'
                }
            }
        },
        watch: {
          options: {
              livereload: true,
          },
            scripts: {
                files: ['js/*.js'],
                tasks: ['concat', 'uglify'],
                options: {
                    spawn: false,
                },
            },
            images: {
                files: ['img/*.{png,jpg,gif}'],
                tasks: ['imagemin'],
                options: {
                    spawn: false,
                },
            },
            css: {
                files: ['../assets/scss/*.scss'],
                tasks: ['sass','autoprefixer'],
                options: {
                    spawn: false,
                }
            }
        }

    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-watch');
    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['concat', 'uglify','imagemin', 'sass', 'autoprefixer']);

};
