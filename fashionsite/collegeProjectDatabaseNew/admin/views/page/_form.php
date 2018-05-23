<div class="box">
    <div class="box-header">
        <i class="icon-bookmark"></i>
        <h5><?php echo isset($editData) ? "Update:" . $editData->title : "Add New" . ucfirst(controller); ?></h5>
    </div>
    <div class="box-content">
        <div class="btn-group-box">
        </div>

        <form id="create" class="form-horizontal" action="" method="post">
            <div class="container">
                <div class="row">
                    <div id="acct-verify-row" class="span12">
                        <fieldset>
                            <legend><?php echo isset($editData) ? "Update " . ucfirst(controller) : "Enter " . ucfirst(controller) ?> Details</legend>
                            <div class="control-group">
                                <div class="control-group ">
                                    <label class="control-label">Title</label>
                                    <div class="controls">
                                        <input id="name" name="Page[title]" class="span5" type="text" value="<?php echo isset($editData) ? $editData->title : "Full Name"; ?>" autocomplete="true"></div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">URL</label>
                                    <div class="controls">
                                        <input id="username" name="Page[url]" class="span5" type="text" value="<?php echo isset($editData) ? $editData->url : "Username"; ?>" autocomplete="false"></div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">SEO-Title</label>
                                    <div class="controls">
                                        <input id="email" name="Page[seoTitle]" class="span5" type="text" value="<?php echo isset($editData) ? $editData->seoTitle : "E-Mail"; ?>" autocomplete="false"></div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">SEO-Decsription</label>
                                    <div class="controls">
                                        <input id="password" name="Page[seoDesc]" class="span5" type="text" value="<?php echo isset($editData) ? $editData->seoDesc : "Password"; ?>" autocomplete="false">

                                    </div>
                                </div>
                                <label class="control-label">Status</label>
                                <div class="controls">
                                    <select id="status" class="span5" name="Page[status]">
                                        <?php
                                        $active='selected="selected"';
                                        $inactive='';
                                        
                                        if(isset($editData) and !$editData->status)
                                        {
                                        $inactive='selected="selected"';
                                        $active='';    
                                        }
                                        ?>
                                        <option value="1" <?php echo $active; ?> >Active</option>
                                        <option value="0" <?php echo $inactive; ?>>In-Active</option>

                                    </select>
                                </div>
                                <br/>
                                <label class="control-label"></label><button id="submit-button" type="submit" class="btn btn-primary" name="<?php echo isset($editData)?"update":"create"?>" value="CONFIRM"><?php echo isset($editData)?"Update":"Create";?></button>
                                <a href="#" type="submit" class="btn" name="reset" value="CANCEL">Cancel</a>
                            </div>
                        </fieldset>
                    </div>
                </div>

            </div>
        </form>