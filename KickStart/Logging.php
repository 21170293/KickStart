<div class="modal fade" id="LOG">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Welcome to KickStart</h4>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#signin" data-toggle="tab">SignIn</a></li>
            <li><a href="#signup" data-toggle="tab">SignUp</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
            <div class="tab-pane active" id="signin">
            <div class="panel panel-default">
            <div class="panel-body">
            <form class="form-horizontal" role="form" method="post" action="signin.php" >
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                    <input type="email" class="form-control" name="t4" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                    <input type="password" class="form-control" name="t5" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label>
                        <input type="checkbox"> Remember me
                        </label>
                        <label>
                          <a  class=" link" href="forget.php">Forget Password</a>
                        </label>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="bt2" class="btn btn-sm btn-primary">Sign in</button>
                    </div>
                </div>
            </form>
            </div>
            </div>
            </div>
            <div class="tab-pane" id="signup">
            <div class="panel panel-default">
            <div class="panel-body">
            <form class="form-horizontal" role="form" method="post" action="signup.php">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Name of Instructor</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="t1" placeholder="Instructor Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                    <input type="email" class="form-control" name="t2" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">New Password</label>
                    <div class="col-sm-10">
                    <input type="password" class="form-control" name="t3-1" placeholder="New Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Confirm Password</label>
                    <div class="col-sm-10">
                    <input type="password" class="form-control"  name="t3" placeholder="Confirm Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-sm btn-primary" name="bt1">Sign Up</button>
                    </div>
                </div>
            </form>
            </div>
            </div>
            </div>
            </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
