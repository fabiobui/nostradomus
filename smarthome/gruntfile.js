'use strict';

module.exports = function (grunt) {
    // load all grunt tasks
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.initConfig({
        watch: {
            // if any .less file changes in directory "public/css/" run the "less"-task.
            files: ["less/sb-admin-2.less","less/bootstrap/*.less"],
            tasks: ["less:dev"]
        },
        // "less"-task configuration
        less: {
            dev: {
                options: {
                    paths: ["less/"]
                },
                files: {
                    "public/css/sb-admin-2.css": "less/sb-admin-2.less"
                }
            },
            dist:{
                options: {
                    paths: ["less/"],
                    cleancss: true
                },
                files: {
                    "public/css/sb-admin-2.css": "less/sb-admin-2.less"
                }
            }
        },
        copy: {
            less: {
                cwd: 'bower_components/bootstrap/less',
                src: '**/*',
                dest: 'less/bootstrap',
                expand: true
            },
            less2: {
                cwd: 'bower_components/startbootstrap-sb-admin-2/less',
                src: '**/*',
                dest: 'less',
                expand: true
            },            
            js: {
                cwd: 'bower_components/bootstrap/dist/js',
                src: 'bootstrap.min.js',
                dest: 'public/js',
                expand: true
            },
            fonts: {
                cwd: 'bower_components/font-awesome/fonts',
                src: '**/*',
                dest: 'public/fonts',
                expand: true
            },
            jquery: {
                cwd: 'bower_components/jquery/dist',
                src: 'jquery.min.js',
                dest: 'public/js',
                expand: true
            }

        }
    });
    grunt.registerTask('default', ['watch']);
    grunt.registerTask('dist', ['less:dist']);
    grunt.registerTask('bootstrap',['copy:less','copy:less2','copy:js','copy:fonts','copy:jquery'])
};