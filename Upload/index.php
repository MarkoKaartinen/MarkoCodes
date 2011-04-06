<!--
Upload script for me.
fileuplaoder.js by https://github.com/valums/file-uploader
-->
<!DOCTYPE html>
<html> 
<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<link href="fileuploader.css" rel="stylesheet" type="text/css">	
</head> 
<body>		
	<div id="fileUP">		
		<noscript>			
			<p>Please enable JavaScript to use file uploader.</p>
			<!-- or put a simple form for upload here -->
		</noscript>         
	</div> 
    
    <script src="fileuploader.js" type="text/javascript"></script> 
    <script>        
        function createUploader(){            
            var uploader = new qq.FileUploader({
                element: document.getElementById('fileUP'),
                action: './upload.php',
                debug: true
            });           
        }
        
        // in your app create uploader as soon as the DOM is ready
        // don't wait for the window to load  
        window.onload = createUploader;     
    </script>    
</body> 
</html>