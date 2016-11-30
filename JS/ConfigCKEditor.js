function ConfigCKEditor()
{	
	CKEDITOR.replace( 'TAInfoContacte',
		{
		toolbar : 
			[
            		['Styles', 'Format'],
            		['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', '-', 'About']
        		]
		
 
    		} );
			
	CKEDITOR.replace( 'TAInfoContacte',
	 {
 	filebrowserBrowseUrl : '/ckfinder/ckfinder.html',
 	filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?type=Images',
 	filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?type=Flash',
 	filebrowserUploadUrl : 
 	   '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&currentFolder=/Documents/',
 	filebrowserImageUploadUrl : 
 	   '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&currentFolder=/Imatges/',
 	filebrowserFlashUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	 } 
	 );
 
 
}