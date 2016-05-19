(function($) {
	tinymce.PluginManager.add('call_to_action', function(editor, url) {
		
		var sh_tag = 'call_to_action';
		
		//helper functions 
		function getAttr(s, n) {
			n = new RegExp(n + '=\"([^\"]+)\"', 'g').exec(s);
			return n ?  window.decodeURIComponent(n[1]) : '';
		};

		function html( cls, data ,con) {
			// these two function prevent problems with " or '
			data = window.encodeURIComponent( data );
			content = window.encodeURIComponent( con );
			attr = con;
			
			var placeholder = {
		            custom_class : getAttr(attr,'custom_class'),
					image: getAttr(attr,'image'),
					bgcolor :  getAttr(attr,'bgcolor'),
					padding : getAttr(attr,'padding'),
					headline : getAttr(attr,'headline'),
					subtitle : getAttr(attr,'subtitle'),
					button_text : getAttr(attr,'button_text'),
					button_link : getAttr(attr,'button_link')
				};
			
			return '<p><div class="' + cls + ' '+placeholder.custom_class+'" ' + 'data-sh-attr="' + data + '" data-sh-content="'+ 
						content + '" ' + 
					'style="background-image: url('+placeholder.image+'); ' + 
					'background-color:'+placeholder.bgcolor + '; ' +
					'padding-top: '+placeholder.padding+'px; '+
					'padding-bottom: '+placeholder.padding+'px;">'+
					'<h1>' + placeholder.headline +'</h1>' + 
					'<h2>' + placeholder.subtitle +'</h2>' + 
					'<a href="#" class="btn btn-lg btn-primary">' + placeholder.button_text +'</a>' + 
					'</div></p>&nbsp;';
		}

		function replaceShortcodes( content ) {
			return content.replace( /\[call_to_action[^\]].*?\]/g, function( all,attr,con) {
				return html( 'inline-full-width', attr , con);
			});
		}

		function restoreShortcodes( content ) {
			
			//content.replace(/(\r\n|\n|\r)/gm,"");
			return content.replace( /(?:<p(?: [^>]+)?>)*<div[^\]].*?\>[^\]].*?\<\/div>(?:<\/p>)*/g, function( match, attr, con ) {
				
				var data = getAttr( con, 'data-sh-content' );
				var con = getAttr( con, 'data-sh-content' );

				if ( data ) {
					return con;
				}
				
				return match;
			});
		}
		
		
		//add popup
		editor.addCommand('call_to_action_popup', function(ui, v) {
			// saved values		
			if (v.custom_class)
				custom_class = v.custom_class;
			if (v.image)
				image = v.image;
			if (v.bgcolor)
				bgcolor = v.bgcolor;
			if (v.padding)
				padding = v.padding;
			if (v.headline)
				headline = v.headline;
			if (v.subtitle)
				subtitle = v.subtitle;
			if (v.button_text)
				button_text = v.button_text;
			if (v.button_link)
				button_link = v.button_link;
			
			//open the popup
			editor.windowManager.open({
				title : 'Call to Action',
				buttons: [{
			          text: 'Insert',
			          classes: 'btn primary',
			          onclick: 'submit'
			      }, {
			          text: 'Remove',
			          onclick: 'close',
			      }],
				body : [{
					type : 'container',
					html : 'Add and call to action container, this is an full width container with</br> a headline, subtitle and button</br></br>'
				},{
					type : 'textbox',
					name : 'custom_class',
					label : 'Custom class',
					value : custom_class,
					size: 14
				},{
					type : 'textbox',
					name : 'headline',
					label : 'Headline',
					value : headline
				},{
					type : 'textbox',
					name : 'subtitle',
					label : 'Subtitle',
					value : subtitle
				},{
					type : 'textbox',
					name : 'button_text',
					label : 'Button',
					value : button_text
				},{
					type : 'textbox',
					name : 'button_link',
					label : 'Button Link',
					value : button_link
				},{
				    type: 'textbox',
				    name: 'image',
				    label: 'Background Image',
				    id: 'my-image-box',
				    value: image
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
                    value : bgcolor
                },{
                    type   : 'textbox',
                    name   : 'padding',
                    label  : 'Spacing',
                    value : padding
                },{
					type : 'container',
					html : '</br><i>Customize the Call to Action container using the custom css class</i></br>'
				}],
				onsubmit : function(e) {//when the ok button is clicked
					//start the shortcode tag
					var cta_content = '[' + sh_tag;  
					
					if ( typeof e.data.custom_class != 'undefined' && e.data.custom_class.length)
						cta_content += ' custom_class="'+e.data.custom_class+'" ';
										
					if ( typeof e.data.image != 'undefined' && e.data.image.length)
						cta_content += 'background-image="' + e.data.image + '" ';
					
					if ( typeof e.data.bgcolor != 'undefined' && e.data.bgcolor.length)
						cta_content += 'bgcolor="' + e.data.bgcolor + '" ';
					
					if ( typeof e.data.padding != 'undefined' && e.data.padding.length)					
						cta_content += 'padding="' + parseInt(e.data.padding)+ '" ';
										
					if ( typeof e.data.headline != 'undefined' && e.data.headline.length)
						cta_content += 'headline="' + e.data.headline + '" ';
						
					if ( typeof e.data.subtitle != 'undefined' && e.data.subtitle.length)
						cta_content += 'subtitle="' + e.data.subtitle + '" ';
					
					if ( typeof e.data.button_text != 'undefined' && e.data.button_text.length)
						cta_content += 'button_text="' + e.data.button_text + '" ';
						
					if ( typeof e.data.button_link != 'undefined' && e.data.button_link.length)
						cta_content += 'button_link="' + e.data.button_link + '" ';
						
						cta_content += ']'; // close inline-full-width
										
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
					// set default values
					custom_class : 'custom_css',
					image: ' ',
					bgcolor :  '#f1f1f1',
					padding : '45',
					headline : 'headline',
					subtitle : 'subtitle',
					button_text : 'purchase',
					button_link : '#'
				});
			}
		});
		
		//open popup on placeholder double click
		editor.on('click',function(e) {
			
			$placeholder = $(e.target).closest('.inline-full-width');
						
			//$placeholder.nodeName == 'DIV' &&
		    if ( $placeholder.length && typeof $placeholder != 'undefined'  ) {
		    			    	
		        var attr = $placeholder.data('sh-content');
		        attr = window.decodeURIComponent(attr);
		        
		        editor.execCommand('call_to_action_popup','',{
		        	// update values with values from content
		            custom_class : getAttr(attr,'custom_class'),
					image: getAttr(attr,'image'),
					bgcolor :  getAttr(attr,'bgcolor'),
					padding : getAttr(attr,'padding'),
					headline : getAttr(attr,'headline'),
					subtitle : getAttr(attr,'subtitle'),
					button_text : getAttr(attr,'button_text'),
					button_link : getAttr(attr,'button_link'),
					content: content
		        });
		        
		        $placeholder.remove();
		    }
		});
		
		
		//replace from shortcode to an image placeholder
		editor.on('BeforeSetcontent', function(event){ 
			event.content = replaceShortcodes( event.content );
		});
		
		//replace from image placeholder to shortcode
        editor.on('GetContent', function(event){
            event.content = restoreShortcodes(event.content);
        });
		
	});
	
	
})(jQuery); 

