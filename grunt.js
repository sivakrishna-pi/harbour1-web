'use strict';

var path = require('path');

function absolutePath(file) {
  return path.join(__dirname, file);
}




module.exports = function (grunt) { 
    require("matchdep").filterDev("grunt-*").forEach(grunt.loadNpmTasks); 
    // Project configuration. 
    grunt.initConfig({ 
        pkg: grunt.file.readJSON('package.json'), 
        cssmin: { 
            sitecss: { 
                options: { 
                    banner: '' 
                }, 
                files: { 
                    'css/style.min.css': [ 
                           'css/global.css',				
					  		'css/index.css',
							'css/products.css',
							'css/carousal.css',
							'css/productsinfo.css',
							'css/self-service.css',
							'css/cloud-enabledment.css',
							'css/patners.css',
							'css/knowledgeCenter.css'] 
                } 
            } 
        }, 

    }); 
    // Default task. 

    grunt.loadNpmTasks('grunt-contrib-cssmin');
    
    grunt.registerTask('default', ['uglify', 'cssmin']); 
};