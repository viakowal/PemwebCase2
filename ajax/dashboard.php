<?php
$name = $_POST['name'];// input username
?>
<!DOCTYPE html>
<html lang="en">
    <head>
       
        <title>AJAX Long Polling</title>
        <script type="text/javascript" src="https://code.jquery.com/jquery.min.js"></script>
        <style type="text/css">
        	body{
        		font-family: open sans;
        	}

        	#response, h1{
        		margin-top: 10px;
        		margin-right: 20px;
        		margin-left: 20px;
        	}

        	.message-area{
        		margin:100px 20px ;


        	}

        	input{
        		border: 2px solid #999;
        		padding: 10px;
        		font-size: 15px;
                display: inline-block;
        	}

            #name:read-only{
                width:15%;
            }

            #message{
                width: 75%;
            }

            .chatBox{
    position: relative;
    margin: 1%;
    padding: 10px 10px;
    border: 1px solid #ececec;
    border-radius: 1px;
    max-height: 60vh;
    min-height: 40vh;
    overflow: scroll;
}


.inputum{
    background-color: #ececec;
    padding:2%;
    
    left: 0;
    bottom: 0;
    width: 100%;
}


.w3-input{padding:10px;display:block;border:1px solid #ccc; width:100%; 
 margin: 1px auto !important;}

 .response{
    border: 1px solid #007AFF;
    background: #007AFF;
    padding:2%;
    width: 40%;
    color: #fff;
    border-radius:  20px;
 }
 .request{
    background: #00CC47;
    border: 1px solid #00CC47;
    padding:2%;
    width: 40%;
    color: #fff;
    border-radius: 20px;
    float: right;


 }
 .btun{
    position: absolute;
    right: 2.5%;
    bottom: 22%;
 }
        </style>
        <meta charset="utf-8" />
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Menyisipkan Bootstrap -->
 

    <link rel="stylesheet" type="text/css" href="res/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="res/js/bootstrap.min.js">
    </head>
    <body>
        <nav class="navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="#">C H A T App</a>
        <button class="btn btn-danger my-2 my-sm-0" onclick="window.location.href='dash/index.html'" >LOG OUT</button>

    </nav>
    <div class="container">
   
         
          <div class="panel-body">
        
         <div class="chatBox" id="chatBox">
        <div id="response">
           
        </div>
    </div>

</div>
    <div class="form-group">
        <div class="message-area">
	        <form method="post"> <!-- mengupload data !-->
                <input type="text" name="name" id="name" placeholder="Your name here" readonly="true" value= <?php echo $name?> />
	        	<input type="text"  name="message" id="message" placeholder="Type message here"/>

                 <br><hr>
                 <button type="submit" class="btn btn-outline-primary btn-lg btn-block">KIRIM</button><!-- mengirim data !-->
                 
	    	</form>
	    </div>
    </div>
</div>
        <script>
            function getContent(timestamp){
                var queryString = {'timestamp' : timestamp};

                $.ajax(
                    {
                        type: 'GET',
                        url: 'server.php', //data yang diambil adalah berasal dari halaman server.php
                        data: queryString,
                        success: function(data){
                            var obj = jQuery.parseJSON(data);
                             $('#response').append('  <br /><div class="response"><h3>'+obj.data_from_file.name + " :</h3> <hr> " +  obj.data_from_file.message + "</div>");
                            getContent(obj.timestamp);
                        }
                    }
                );
            }

            // initialize jQuery
            $(function() {
                getContent();
                $(document).on('submit', 'form', function(eve){
                    eve.preventDefault();
                    $.ajax({
                            type: 'POST',
                            url: 'write.php',
                            data: $('form').serialize(),
                            success: function(data){                    
                            }
                        }
                    );
                });

                $(document).on('keypress', 'input', function(eve){
                  if (eve.which == 13) {
                    $('form').submit();
                    $(this).val("");
                    return false;    
                  }
                });    
            });

        </script>
    </body>
</html>
