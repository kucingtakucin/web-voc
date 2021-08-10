$(document).ready(function(){
	// Smart Wizard
	$('#smartwizard').smartWizard({
		selected: 0,
		theme: 'default', // default, arrows, dots, progress
		// darkMode: true,
		transition: {
			animation: 'slide-horizontal', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
		},
		toolbarSettings: {
			toolbarPosition: 'bottom', // both bottom
		}
	});
});
