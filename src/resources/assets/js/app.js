
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

require('./vue');

const app = new Vue({
	el: '.container'
});


/**
 * This is some minimal jQuery and JavaScript functions :
 */

/* Smooth scroll to anchors */
$('a').click(function()
{
	$('html, body').animate({
		scrollTop: $($(this).attr('href')).offset().top
	}, 500);
});

/* Display Top-crawler */
if ($(document).height() > 1200)
{
	$('#top-crawler').show();
}