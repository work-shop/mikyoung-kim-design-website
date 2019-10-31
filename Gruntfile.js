module.exports = function(grunt) {

	grunt.initConfig({
		sass: {
			dev: {
				src: ['./wp-content/themes/mikyoung/_/css/main.scss'],
				dest: './wp-content/themes/mikyoung/_/css/main.css',
			},
		},
		watch: {
			sass: {
      // We watch and compile sass files as normal but don't live reload here
      files: ['./wp-content/themes/mikyoung/_/css/*.scss'],
      tasks: ['sass'],
    },
    livereload: {
      // Here we watch the files the sass task will compile to
      // These files are sent to the live reload server after sass compiles to them
      options: { 
      	livereload: true 
      },
      files: ['./wp-content/themes/mikyoung/_/css/*.css','./wp-content/themes/mikyoung/**/*.php','./wp-content/themes/mikyoung/_/js/*.js'],
    },
  },
});

	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.registerTask('default', ['watch']);

};