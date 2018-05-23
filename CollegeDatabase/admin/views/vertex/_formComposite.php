
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<?php  //echo '<pre>';print_r($refStops);exit;?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<thead>Create Composite Reference</thead>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-6">
						<form role="form" action="" method="post">
							<div class="form-group">
								<label>Name</label> <input class="form-control" type="text"
									id="name"
									placeholder="Name"
									name="Vertex[name]">
						<div class="form-group">

								<label>Reference Point 1</label> <select class="form-control"
								id="source_stop" name="Vertex[ref1]">

                                    <?php
                                    foreach ($refStops as $row):
                                        ?>
                                        <option
									value="<?php echo $row->id; ?>"> <?php echo $row->name ?></option>
                                    <?php endforeach; ?>
                                </select>
						</div>

						<div class="form-group">

								<label>Reference Point 2</label> <select class="form-control"
								id="source_stop" name="Vertex[ref2]">

                                    <?php
                                    foreach ($refStops as $row):
                                        ?>
                                        <option
									value="<?php echo $row->id; ?>" ><?php echo $row->name ?></option>
                                    <?php endforeach; ?>
                                </select>
						</div>
							<button type="submit" class="btn btn-success"
								name=<?php echo isset($editData)?"update":"create"?> id="create"><?php echo isset($editData)?"Update":"Create"?></button>
							<a href="<?php echo LINK_URL.controller; ?>/index"
								class="btn btn-danger">Cancel</a>
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