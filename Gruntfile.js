module.exports = function(grunt) { 

	grunt.initConfig({ 
		pkg: grunt.file.readJSON('package.json'), 

		exec: {
  			get_grunt_sitemap: {
     			command: 'curl --silent --output sitemap.json http://localhost/RJRStudios/?show_sitemap'
  			}
		},

		imagemin: {
			dist: {
				options: {
					optimizationLevel: 5
				},
				files: [{
					expand: true,
					cwd: 'wp-content/themes/rjrstudios/src/images',
					src: ['*.{png,jpg,gif}'],
					dest: 'wp-content/themes/rjrstudios/dist/img/'
				}]
			}
		},

		phplint: {
			options: {
				phpArgs : {
					'-lf' : null
				},
				spawnLimit: 5
			},
			files: 'wp-content/themes/rjrstudios/*.php'
		},

		jshint: {
			files: { 
				src: ['Gruntfile.js', 'wp-content/themes/rjrstudios/src/js/rjr_theme.js' ]
			},
			options: {
				reporter: require('jshint-stylish'),
        		curly : true,
		        eqeqeq : true,
		        immed : true,
		        latedef : true,
		        newcap : false,
		        noarg : true,
		        sub : true,
		        undef : true,
		        unused : true,
		        boss : true,
		        eqnull : true,
		        browser : true,
		        jquery : true,
		        devel: true,
				globals: { 
					'module' : false,
					'require' : false,
					$ : false

				}
	  		}
		},

		uglify: {
			dist: {
				options: {
					sourceMap: true,
					banner: '/*! theme.js 1.0.0 | Rob J Randell (@RJRan) */',
				},
				files: {
					'wp-content/themes/rjrstudios/dist/js/rjr_theme.min.js': ['wp-content/themes/rjrstudios/src/js/rjr_theme.js']
				}
			}
		},

		sass: {
    		dist: {
    			options: {
	    			style: 'expanded'
	  			},
      			files: {
      				'wp-content/themes/rjrstudios/src/css/rjr_theme.css': 'wp-content/themes/rjrstudios/src/scss/rjr_theme.scss'
              	}
    		}
  		},

		uncss: {
			dist: {
				options: {
					ignore : ['.hidden-xs'],
					stylesheets : ['wp-content/themes/rjrstudios/src/css/bootstrap.css', 'wp-content/themes/rjrstudios/src/css/rjr_theme.css'],
					ignoreSheets : [/fonts.googleapis/],
					urls : [],
				},
				files: {
					'wp-content/themes/rjrstudios/dist/css/rjr_theme.clean.css': ['http://localhost/RJRStudios/']
				}
			}
		},

		cssmin: {
			dist: {
				options: {
					banner: '/*! theme.css 1.0.0 */'
				},
				files: {
					'wp-content/themes/rjrstudios/dist/css/rjr_theme.min.css': ['wp-content/themes/rjrstudios/dist/css/rjr_theme.clean.css'],
					'wp-content/themes/rjrstudios/dist/css/ie_theme.min.css': ['wp-content/themes/rjrstudios/src/css/ie_theme.css']
				}
			}
		},

		watch: {
	  		files: ['wp-content/themes/rjrstudios/src/js/rjr_theme.js', 'Gruntfile.js'],
	  		tasks: ['jshint']
		}

	});

	grunt.loadNpmTasks('grunt-exec');
	grunt.loadNpmTasks('grunt-contrib-imagemin');
	grunt.loadNpmTasks('grunt-phplint');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-uncss');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-watch');

	grunt.registerTask('sitemap', function() {
  		var sitemap_urls = grunt.file.readJSON('./sitemap.json');
  		grunt.config.set('uncss.dist.options.urls', sitemap_urls);
  		grunt.config.set('uncss.dist.files', {'wp-content/themes/rjrstudios/dist/css/rjr_theme.clean.css' : ['http://localhost/RJRStudios/', sitemap_urls] });
	});

	grunt.registerTask('test', ['phplint', 'jshint']);

	grunt.registerTask('deploy', ['exec:get_grunt_sitemap', 'sitemap', 'imagemin', 'phplint', 'jshint', 'uglify', 'sass', 'uncss', 'cssmin']);
};
