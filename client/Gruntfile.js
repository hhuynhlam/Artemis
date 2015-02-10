'use strict';

 module.exports = function(grunt) {

  // Setup Grunt
  grunt.initConfig({
  
    clean: {
      dist: ['dist/*', '!dist/_env.js']
    },

    copy: {
      dist: {
        files: [{
          expand: true, 
          src: ['assets/**'], 
          dest: 'dist/',
        }, {
          expand: true, 
          src: ['components/**'], 
          dest: 'dist/',
        }, {
          expand: true, 
          src: ['core/**'], 
          dest: 'dist/',
        }, {
        expand: true, 
          src: ['pages/**'], 
          dest: 'dist/',
        }, {
        expand: true, 
          src: ['vendor/**'], 
          dest: 'dist/',
        }, {
          expand: true, 
          src: ['app.js', 'index.html'], 
          dest: 'dist/',
        }]
      }
    },

    ftpush: {
      dist: {
        auth: {
          host: 'clubs.uci.edu',
          port: 21,
          authKey: 'key'
        },
        src: 'dist',
        dest: 'Sites/beta/client',
        simple: true,
        useList: false
      }
    },

    jshint: {
      files: ['Gruntfile.js', '**/*.js', '!dist/**/*.js', '!vendor/bower_components/**/*.js', '!node_modules/**/*.js'],
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
  grunt.loadNpmTasks('grunt-ftpush');
  grunt.loadNpmTasks('grunt-shell');

  // Register Grunt tasks
  grunt.registerTask('default', ['jshint']);
  grunt.registerTask('build', ['jshint', 'clean:dist', 'copy:dist']);
  grunt.registerTask('deploy', ['jshint', 'clean:dist', 'copy:dist', 'ftpush:dist']);
  grunt.registerTask('serve', ['jshint', 'shell:serve']);  

};