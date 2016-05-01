<?php
function add_theme_dashboard_widgets() {

	wp_add_dashboard_widget(
                 'theme_dashboard_widget',         // Widget slug.
                 'Sandbox Theme',         // Title.
                 'theme_dashboard_widget_output' // Display function.
        );	
		
} add_action( 'wp_dashboard_setup', 'add_theme_dashboard_widgets' );

function theme_dashboard_widget_output() {
	echo "Hello World, I'm a great Dashboard Widget";
}