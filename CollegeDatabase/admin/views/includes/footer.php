 <!-- /.panel-footer -->
            </div>
            <!-- /.panel .chat-panel -->
        </div>
        <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?php echo PUBLIC_URL; ?>/bower_components/jquery/dist/jquery.min.js"></script>
<script>
$(document).ready(function(){

  $("#title").keyup(function(){
    var Text = $(this).val();
    Text = Text.toLowerCase();
    Text = Text.replace(/ /g,'-').replace(/[^\w-]+/g,'')
    $("#url").val(Text);    
});

});
</script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo PUBLIC_URL; ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo PUBLIC_URL; ?>/bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="<?php echo PUBLIC_URL; ?>/bower_components/raphael/raphael-min.js"></script>
<script src="<?php echo PUBLIC_URL; ?>/bower_components/morrisjs/morris.min.js"></script>
<script src="<?php echo PUBLIC_URL; ?>/js/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo PUBLIC_URL; ?>/dist/js/sb-admin-2.js"></script>
<script>
// tooltip demo
    $('.td-actions').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
 
    // popover demo
    $("[data-toggle=popover]")
        .popover()
    </script> 
</body>

</html>

