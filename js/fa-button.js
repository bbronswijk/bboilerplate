(function($) {
	tinymce.PluginManager.add('fa_includer', function(editor, url) {
		
		//add popup
		editor.addCommand('fa_includer_popup', function(ui, v) {
						
			if (v.icon)
				icon = v.icon;
			
			//open the popup
			editor.windowManager.open({
				title : 'Insert Font Awesome Icons',
				body : [{
					type : 'container',
					html : '<i class="fa fa-check"></i><i class="fa fa-euro"></i><i class="fa fa-facebook"></i><i class="fa fa-twitter"></i>'+
							'<i class="fa fa-linkedin"></i><i class="fa fa-instagram"></i><i class="fa fa-vimeo"></i><i class="fa fa-briefcase"></i></br>'+
							'<i class="fa fa-calendar"></i><i class="fa fa-camera"></i><i class="fa fa-map-marker"></i><i class="fa fa-globe"></i>'+
							'<i class="fa fa-location-arrow"></i><i class="fa fa-font"></i><i class="fa fa-paper-plane"></i><i class="fa fa-heart"></i></br>'+
							'<i class="fa fa-thumb-tack"></i><i class="fa fa-tag"></i><i class="fa fa-trash"></i><i class="fa fa-trophy"></i>'+
							'<i class="fa fa-thumbs-up"></i><i class="fa fa-file-text-o"></i><i class="fa fa-paperclip"></i><i class="fa fa-apple"></i></br>'
				},{
					type : 'container',
					html : '</br><i>Example: map-marker</i>'
				},{
					type : 'textbox',
					name : 'icon',
					label : 'icon',
					value : icon,
					minWidth: 300,
					tooltip : 'Select the type of panel you want'
				},{
					type : 'container',
					html : 'Go to <a href="http://fontawesome.io/icons" target="_blank">http://fontawesome.io/icons</a> for a complete list.'
				}],
				onsubmit : function(e) {//when the ok button is clicked
					//start the shortcode tag
					var icon_str = '&nbsp;<i class="fa fa-' + e.data.icon + '"></i>&nbsp;';
					
					//insert shortcode to tinymce
					editor.insertContent(icon_str);
				}
			});
		});
		
		//add button
		editor.addButton('fa_includer', {
			icon : 'fa_includer',
			tooltip : 'FontAwesome Icon',
			onclick : function() {
				editor.execCommand('fa_includer_popup', '', {
					header : '',
					footer : '',
					icon : 'check',
					content : ''
				});
			}
		});
		
	});
	
	$('.mce-container-body i.fa').live('click', function(){
		var faClass = $(this).attr('class').replace('fa','').replace('fa-','').trim();
		$('.mce-container-body input').val(faClass);
	});
	
})(jQuery); 

