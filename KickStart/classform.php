<form role="form" method="post" action="uploadvideo.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Enter Instructor Name</label>
    <input type="text" class="form-control" name="t1" id="exampleInputEmail1" placeholder="Instructor Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Enter Subject Topic</label>
    <input type="text" name="t8" class="form-control" id="exampleInputEmail1" placeholder="Class or subject topic.">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Meeting Password</label>
    <input type="password" name="t3" class="form-control" id="exampleInputPassword1" placeholder="Meeting Password">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile" name="file" multiple/>
    <p class="help-block">Upload .mp4 .avi .mkv files</p>
  </div>
  <div class="form-group">
    <label for="YTlink">Select Date Time</label>
    <input type="datetime-local" class="form-control" id="birthdaytime" name="t4">
</div>
  <button type="submit" name="submit" class="btn btn-danger">Submit</button>

</form>