<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Search <?php echo controller; ?>
            </div>
            <div class="panel-body">
                <div class="row">
                    <form role="form" action="<?php echo LINK_URL.controller?>/index" method="post">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Search By</label>
                                <select class="form-control" id="searchby" name="searchBy">
                                    <?php
                                    foreach ($model->labels() as $key => $value):
                                        ?>
                                        <option value="<?php echo $key ?>"><?php echo $value ?></option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Search Key</label>
                                <input class="form-control" id="name" name="searchKey" autocomplete="true">
                            </div>

                        </div>
                        <div class="col-lg-4">
                            <br/>
                            <button type="submit" class="btn btn-success" id="search" name="search">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>