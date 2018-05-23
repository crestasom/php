        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <thead><?php echo isset($editData)?"Update Details":"Enter Details"; ?></thead>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="" method="post">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input class="form-control" type="text" id="name" value="<?php echo isset($editData)?$editData->fullname:"Full Name"?>" name="User[fullname]">
                                   
                                </div>
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input class="form-control" type="text" id="username" value="<?php echo isset($editData)?$editData->username:"User Name"?> " name="User[username]">
                                   
                                </div>
                                <div class="form-group">
                                    <label>E-Mail</label>
                                    <input class="form-control" type="text" id="email" value="<?php echo isset($editData)?$editData->email:"E_mail"?> " name="User[email]">
                                   
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="password" id="password" value="<?php echo isset($editData)?$editData->password:"password"?> " name="User[password]">
                                   
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Status</label>
                                    <select class="form-control" id="status" class="span5" name="User[status]">
                                        <?php
                                        $active='selected="selected"';
                                        $inactive='';
                                        
                                        if(isset($editData) and !$editData->status)
                                        {
                                        $inactive='selected="selected"';
                                        $active='';    
                                        }
                                        ?>
                                        <option value=""1" <?php echo $active; ?> >Active</option>
                                        <option value=""0" <?php echo $inactive; ?>>In-Active</option>

                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success" name=<?php echo isset($editData)?"update":"create"?> id="create"><?php echo isset($editData)?"Update":"Create"?></button>
                                <a href="<?php echo LINK_URL.controller; ?>/index" class="btn btn-danger" >Cancel</a>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>