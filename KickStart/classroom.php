<?php 
session_start();
//error_reporting(0);



if(isset($_GET['que'])){
  $que=$_GET['que'];
  echo '<script type="text/JavaScript"> 
  var ans=prompt('.$que.'); 
 </script>';
}

$type=$_REQUEST['type'];
if($type==''){
    header('Location:index.php');
}
else{
    $sub=$_REQUEST['sub'];
    $vlink=$_REQUEST['vlink'];
    $video_id = explode("?v=", $vlink);

}
?>

<?php  

     
 
?>
<?php

$user=$_SESSION['user'];
/**
 * Simple chat example by Stephan Soller
 * See http://arkanis.de/projects/simple-chat/
 */

// Name of the message buffer file. You have to create it manually with read and write permissions for the webserver.
$messages_buffer_file = 'messages.json';
// Number of most recent messages kept in the buffer
$messages_buffer_size = 10;

if ( isset($_POST['content']) and isset($_POST['name']) )
{
    // Open, lock and read the message buffer file
    $buffer = fopen($messages_buffer_file, 'r+b');
    flock($buffer, LOCK_EX);
    $buffer_data = stream_get_contents($buffer);
    
    // Append new message to the buffer data or start with a message id of 0 if the buffer is empty
    $messages = $buffer_data ? json_decode($buffer_data, true) : array();
    $next_id = (count($messages) > 0) ? $messages[count($messages) - 1]['id'] + 1 : 0;
    $messages[] = array('id' => $next_id, 'time' => time(), 'name' => $_POST['name'], 'content' => $_POST['content']);
    
    // Remove old messages if necessary to keep the buffer size
    if (count($messages) > $messages_buffer_size)
        $messages = array_slice($messages, count($messages) - $messages_buffer_size);
    
    // Rewrite and unlock the message file
    ftruncate($buffer, 0);
    rewind($buffer);
    fwrite($buffer, json_encode($messages));
    flock($buffer, LOCK_UN);
    fclose($buffer);
    
    // Optional: Append message to log file (file appends are atomic)
    //file_put_contents('chatlog.txt', strftime('%F %T') . "\t" . strtr($_POST['name'], "\t", ' ') . "\t" . strtr($_POST['content'], "\t", ' ') . "\n", FILE_APPEND);
    
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php require 'header-links.php'; ?>
        <style>
            
.iframe-wrap {
  position: relative;
}
.iframe-wrap::after {
  content: "";
  display:block;
  height: 100%;
  width: 100%;
  position: absolute;
  top: 0;
  left: 0;
}
</style>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 200px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
.text{
  align:center;
 
  height: 40px;
  margin:10px;
  float: left;
}
div.scroll { 
                margin:4px, 4px; 
                padding:4px; 
                background-color: green; 
                width: inherit; 
                height: inherit; 
                overflow-x: hidden; 
                overflow-x: auto; 
                text-align:justify; 
            } 
</style>
<script type="text/javascript" src="jquery-1.4.2.min.js"></script>
    <script type="text/javascript">
        // <![CDATA[
        $(document).ready(function(){
            // Remove the "loading…" list entry
            $('div#messages > ul > li').remove();
            
            $('form').submit(function(){
                var form = $(this);
                var name =  form.find("input[name='name']").val();
                var content =  form.find("input[name='content']").val();
                
                // Only send a new message if it's not empty (also it's ok for the server we don't need to send senseless messages)
                if (name == '' || content == '')
                    return false;
                
                // Append a "pending" message (not yet confirmed from the server) as soon as the POST request is finished. The
                // text() method automatically escapes HTML so no one can harm the client.
                $.post(form.attr('action'), {'name': name, 'content': content}, function(data, status){
                    $('<li class="pending" />').text(content).prepend($('<small />').text(name)).appendTo('div#messages');
                    $('div#messages').scrollTop( $('div#messages').get(0).scrollHeight );
                    form.find("input[name='content']").val('').focus();
                });
                return false;
            });
            
            // Poll-function that looks for new messages
            var poll_for_new_messages = function(){
                $.ajax({url: 'messages.json', dataType: 'json', ifModified: true, timeout: 2000, success: function(messages, status){
                    // Skip all responses with unmodified data
                    if (!messages)
                        return;
                    
                    // Remove the pending messages from the list (they are replaced by the ones from the server later)
                    $('div#messages > li.pending').remove();
                    
                    // Get the ID of the last inserted message or start with -1 (so the first message from the server with 0 will
                    // automatically be shown).
                    var last_message_id = $('div#messages').data('last_message_id');
                    if (last_message_id == null)
                        last_message_id = -1;
                    
                    // Add a list entry for every incomming message, but only if we not already inserted it (hence the check for
                    // the newer ID than the last inserted message).
                    for(var i = 0; i < messages.length; i++)
                    {
                        var msg = messages[i];
                        if (msg.id > last_message_id)
                        {
                            var date = new Date(msg.time * 1000);
                            $('<li class="list-group-item" />').text(msg.content).
                                prepend( $('<small />').text( ' ' + msg.name+' : ') ).
                                appendTo('div#messages');
                            $('div#messages').data('last_message_id', msg.id);
                        }
                    }
                    
                    // Remove all but the last 50 messages in the list to prevent browser slowdown with extremely large lists
                    // and finally scroll down to the newes message.
                    $('div#messages > li').slice(0, -50).remove();
                    $('div#messages').scrollTop( $('div#messages').get(0).scrollHeight );
                }});
            };
            
            // Kick of the poll function and repeat it every two seconds
            poll_for_new_messages();
            setInterval(poll_for_new_messages, 2000);
        });
        // ]]>
    </script>
    <style type="text/css">
      
        
        h1 { margin: 0; padding: 0; font-size: 2em; }
        p.subtitle { margin: 0; padding: 0 0 0 0.125em; font-size: 0.77em; color: gray; }
        
        ul#messages { overflow: auto; height: 15em; margin: 1em 0; padding: 0 3px; list-style: none; border: 1px solid gray; }
        ul#messages li { margin: 0.35em 0; padding: 0; }
        ul#messages li small { display: block; font-size: 0.59em; color: gray; }
        ul#messages li.pending { color: #aaa; }
        
        form { font-size: 1em; margin: 1em 0; padding: 0; }
        form p { position: relative; margin: 0.5em 0; padding: 0; }
        form p input { font-size: 1em; }
      
        form p button { position: absolute; top: 0; right: -0.5em; }
        
        ul#messages, form p, input#content { width: inherit; }
        
        pre { font-size: 0.77em; }
    </style>
    <meta name="author" content="Stephan Soller" />
</head>
<body>
<?php require 'classNavbar.php'; ?>
    <div class="container-fluid">
  
        <div class="row">
            <div class="col-md-4">
            <?php switch($type){
              case 'y':
                require 'youtubeplayer.php';
              break;
              case 'v':
                require 'video.php';
              break;
              case 'l':
                require 'live.php';
              break;
            } ?>
            </div>
            <div class="col-md-5">
                
            </div>
            <div class="col-md-1">
            
            </div>
            
        </div>
    </div>



   
<button class="open-button" onclick="openForm()">Chat</button>

<div class="chat-popup " id="myForm">
<div class="scroll">
<div id="messages">
    <ul class="list-group">
    <li class="list-group-items">
        loading...
    </li>
    </ul>
</div>
      </div>
  
  <form action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_COMPAT, 'UTF-8'); ?>" method="post"" class="form-container">
    <input type="hidden" name="name" id="name" value="<?php echo $user;?>" />

    
    <input  class="text" type="text" name="content" id="content" placeholder="Type message here...." />
    <button type="submit" class="btn">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>

</div>
<script>
</script>

<script>

function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

</body>
</html>
