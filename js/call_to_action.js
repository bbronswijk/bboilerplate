(function($) {
	tinymce.PluginManager.add('call_to_action', function(editor, url) {
		
		//add popup
		editor.addCommand('call_to_action_popup', function(ui, v) {
			// saved values			
			if (v.icon)
				icon = v.icon;
			
			//open the popup
			editor.windowManager.open({
				title : 'Call to Action',
				body : [{
					type : 'container',
					html : 'Add and call to action container, this is an full width container with</br> a headline, subtitle and button</br></br>'
				},{
					type : 'textbox',
					name : 'class',
					label : 'Custom class',
					value : 'default',
					size: 14
				},{
					type : 'textbox',
					name : 'headline',
					label : 'Headline',
					value : 'This is the headline'
				},{
					type : 'textbox',
					name : 'subtitle',
					label : 'Subtitle',
					value : 'Subtitle'
				},{
					type : 'textbox',
					name : 'button_text',
					label : 'Button',
					value : 'Purchase'
				},{
					type : 'textbox',
					name : 'button_link',
					label : 'Button Link',
					value : '#'
				},{
				    type: 'textbox',
				    name: 'image',
				    label: 'Background Image',
				    id: 'my-image-box',
				    value: ''
				},
				{
				    type: 'button',
				    name: 'select-image',
				    text: 'Select background',
				    label: ' ',
				    maxWidth : 160,
				    onclick: function() {
				        window.mb = window.mb || {};
				
				        window.mb.frame = wp.media({
				            frame: 'post',
				            state: 'insert',
				            library : {
				                type : 'image'
				            },
				            multiple: false
				        });
				
				        window.mb.frame.on('insert', function() {
				            var json = window.mb.frame.state().get('selection').first().toJSON();
				
				            if (0 > $.trim(json.url.length)) {
				                return;
				            }
				
				            $('#my-image-box').val(json.url);
				        });
				
				        window.mb.frame.open();
				    }
				},{
                    type   : 'textbox',
                    name   : 'bgcolor',
                    label  : 'Background Color',
                    value : '#fff'
                },{
                    type   : 'textbox',
                    name   : 'padding',
                    label  : 'Spacing',
                    value : 100
                },{
					type : 'container',
					html : '</br><i>Customize the Call to Action container using the custom css class</i></br>'
				}],
				onsubmit : function(e) {//when the ok button is clicked
					//start the shortcode tag
					var cta_content = '<div class="inline-full-width" style="';  
					
					if ( typeof e.data.image != 'undefined' && e.data.image.length)
						cta_content += 'background-image: url(' + e.data.image + '); ';
					
					if ( typeof e.data.bgcolor != 'undefined' && e.data.bgcolor.length)
						cta_content += 'background-color: ' + e.data.bgcolor + '; ';
					
					if ( typeof e.data.padding != 'undefined' && e.data.padding.length){					
						var padding = parseInt(e.data.padding);
					
						cta_content += 'padding-top: '+ padding + 'px; padding-bottom:' + padding + 'px; ';
					}
						cta_content += '">'; // end first div
					
					if ( typeof e.data.headline != 'undefined' && e.data.headline.length)
						cta_content += '<h1>'+e.data.headline+'</h1>';
						
					if ( typeof e.data.subtitle != 'undefined' && e.data.subtitle.length)
						cta_content += '<p>'+e.data.subtitle+'</p>';
					
					if ( typeof e.data.button_text != 'undefined' && e.data.button_text.length)
						cta_content += '<a href="#" class="btn btn-primary btn-lg">'+e.data.button_text+'</a>';
						
						cta_content += '</div>'; // close inline-full-width
					
					//if ( typeof e.data.footer != 'undefined' && e.data.footer.length)
					
					//insert shortcode to tinymce
					editor.insertContent(cta_content);
				}
			});
		});
		
		//add button
		editor.addButton('call_to_action', {
			icon : 'call_to_action',
			tooltip : 'Call to Action',
			onclick : function() {
				editor.execCommand('call_to_action_popup', '', {
					header : '',
					footer : '',
					icon : 'check',
					content : ''
				});
			}
		});
		
	});
	
	
})(jQuery); 

