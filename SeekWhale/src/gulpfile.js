/**
 *  1. 使用 gulp task-list 查看任务列表
 *  2. 使用 gulp build 构建
 *  3. 使用 gulp serve [-p 端口号] 开启web服务; 默认端口8000
 */

var gulp = require('gulp'),
	sass = require('gulp-sass'),
	cssmin = require('gulp-clean-css'),
	sourcemaps = require('gulp-sourcemaps'),
	browserSync = require("browser-sync").create(),
	argv = require('yargs').argv;

/* check gulp task list*/
require('gulp-task-list')(gulp);

/* build scss files */
gulp.task('build', function () {
	gulp.src('sass/**/*.scss')
		.pipe(sass())
		.pipe(cssmin())
		.pipe(sourcemaps.write())
		.pipe(gulp.dest('../css'));
});

/* serve project over a specific port */
gulp.task('serve', function () {
	browserSync.init({
		server: {
			baseDir: "../",
			directory: true
		},
		port: argv.p ? argv.p : 8000
	});
	gulp.watch('sass/**/*.scss', ["build"]);
	gulp.watch(['../css/*.*',
			'../images/*.*',
			'../js/*.*',
			'../*.html'
		],
		function () {
			browserSync.reload();
		});
});