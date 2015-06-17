'use strict';

 module.exports = function(grunt) {

  // Setup Grunt
  grunt.initConfig({
  
    clean: {
      dist: ['_dist/*', '!_dist/env.json']
    },

    copy: {
      dist: {
        files: [{
          expand: true, 
          src: ['assets/**'], 
          dest: '_dist/',
        }, {
          expand: true, 
          src: ['components/**'], 
          dest: '_dist/',
        }, {
          expand: true, 
          src: ['core/**'], 
          dest: '_dist/',
        }, {
        expand: true, 
          src: ['pages/**'], 
          dest: '_dist/',
        }, {
        expand: true, 
          src: ['services/**'], 
          dest: '_dist/',
        }, {
        expand: true, 
          src: ['vendor/**'], 
          dest: '_dist/',
        }, {
          expand: true, 
          src: ['app.js', 'index.html'], 
          dest: '_dist/',
        }]
      }
    },

    jshint: {
      files: ['Gruntfile.js', '**/*.js', '!_dist/**/*.js', '!vendor/bower_components/**/*.js', '!node_modules/**/*.js'],
      options: {
          jshintrc: '.jshintrc'
      }
    },
    
    shell: {      
      serve: {
        command: [
          'cd ~/Git/Artemis/client',
          'node server.js'
        ].join('&&')
      }
    }

  });

  // Load Grunt plugins
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-shell');

  // Register Grunt tasks
  grunt.registerTask('default', ['jshint']);
  grunt.registerTask('build', ['jshint', 'clean:dist', 'copy:dist']);
  grunt.registerTask('serve', ['shell:serve']);  

};