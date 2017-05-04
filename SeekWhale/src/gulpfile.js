/**
 *  1. 使用 gulp task-list 查看任务列表
 *  2. 使用 gulp build 构建
 *  3. 使用 gulp serve [-p 端口号] 开启web服务; 默认端口8000
 */

var gulp = require('gulp'),
	sass = require('gulp-sass'),
	cssmin = require('gulp-clean-css'),
	rename = require('gulp-rename'),//重命名
	sourcemaps = require('gulp-sourcemaps'),
	browserSync = require("browser-sync").create(),
	notify = require('gulp-notify'),//显示报错信息，不终止当前gulp任务
    plumber = require('gulp-plumber'),
    uglify = require('gulp-uglify'),
	argv = require('yargs').argv;

/* check gulp task list*/
require('gulp-task-list')(gulp);

/* build scss files */
gulp.task('build', function () {
	gulp.src('sass/**/*.scss')
		.pipe(plumber({errorHandler: notify.onError('Error: <%= error.message %>')}))//sass编译出错时提示错误位置，不停止gulp任务
		.pipe(sourcemaps.init())
		.pipe(sass({outputStyle: 'expanded'}))
		.pipe(gulp.dest('../css'))
		.pipe(cssmin())
		.pipe(rename({suffix: ".min"}))
		.pipe(sourcemaps.write())
		.pipe(gulp.dest('../css'));
});
/*js压缩*/
gulp.task('jsmin', function () {
    gulp.src('js/*.js')
        .pipe(uglify())
        .pipe(rename({suffix: ".min"}))
        .pipe(gulp.dest('../js'));
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
	gulp.watch('js/*.js', ["jsmin"]);
	gulp.watch(['../css/*.*',
		'../images/*.*',
		'../js/*.*',
		'../**/*.html'
	],
	function () {
		browserSync.reload();
	});
});