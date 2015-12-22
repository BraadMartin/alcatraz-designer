module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		jshint: {
			files: ['Gruntfile.js', 'js/alcatraz-designer-public.js', 'js/alcatraz-designer-customizer.js']
		},
		watch: {
			js: {
				files: ['<%= jshint.files %>'],
				tasks: ['jshint']
			}
		},
		wp_readme_to_markdown: {
			your_target: {
				files: {
					'readme.md': 'readme.txt'
				}
			}
		},
		makepot: {
			target: {
				options: {
					cwd: '',
					domainPath: '/languages',
					mainFile: '',
					potFilename: 'alcatraz-designer.pot',
					type: 'wp-plugin'
				}
			}
		}
	});

	// Load the plugins.
	grunt.loadNpmTasks( 'grunt-contrib-jshint' );
	grunt.loadNpmTasks( 'grunt-contrib-watch' );
	grunt.loadNpmTasks( 'grunt-wp-readme-to-markdown' );
	grunt.loadNpmTasks( 'grunt-wp-i18n' );

	// Default task(s).
	grunt.registerTask( 'build', [
		'jshint',
		'wp_readme_to_markdown',
		'makepot'
	] );

};