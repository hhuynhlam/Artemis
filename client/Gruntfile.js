'use strict';

 module.exports = function(grunt) {

  // Setup Grunt
  grunt.initConfig({
    
    // grunt variable
    _config: {
      today: new Date().toString()
    },

    clean: {
      dist: ['dist/*','!dist/.git*', '!dist/Procfile']
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
          src: ['.bowerrc', 'app.js', 'bower.json', 'index.html', 'package.json', 'server.js'], 
          dest: 'dist/',
        }]
      }
    },
    
    // less: {
    //   defaults: {
    //     options: {
    //       paths: ["assets/css"]
    //     },
    //     files: {
    //       "assets/css/**/*.css": "assets/css/**/*.less"
    //     }
    //   }
    // },

    jshint: {
      files: ['Gruntfile.js', '**/*.js', '!dist/**/*.js', '!vendor/bower_components/**/*.js', '!node_modules/**/*.js'],
      options: {
          jshintrc: '.jshintrc'
      }
    },
    
    shell: {
      deploy: {
        command: [
          // 'cd ~/Git/Chiron/dist',
          // 'git add --all',
          // 'git commit -m \' BUILD: <%= _config.today %>\'',
          // 'git push origin master',
          // 'heroku logs'
          'echo \' BUILD: <%= _config.today %>\''
        ].join('&&')
      },
      
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
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-shell');

  // Register Grunt tasks
  grunt.registerTask('default', ['jshint']);
  grunt.registerTask('build', ['jshint', 'clean:dist', 'copy:dist']);
  grunt.registerTask('deploy', ['shell:deploy']);
  grunt.registerTask('serve', ['jshint', 'shell:serve']);  

};