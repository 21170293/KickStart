<button onclick="playVid()" type="button">Play Video</button>
  <button onclick="pauseVid()" type="button">Pause Video</button><br> 
  
  <video id="myVideo" width="850" height="500">
    <source src="video1.mp4" type="video/mp4">
    <source src="mov_bbb.ogg" type="video/ogg">
    Your browser does not support HTML5 video.
  </video>
  
  <script> 
  var vid = document.getElementById("myVideo"); 
  
  function playVid() { 
    vid.play(); 
  } 
  
  function pauseVid() { 
    vid.pause(); 
  } 
  </script> 