<?php
$messages = $this->getFlash();
if ($messages) {
    if (array_key_exists("success", $messages)):
        ?>

        <div class="alert alert-block alert-success">
            <p><?php echo $messages['success'] ?></p>
        </div>
    <?php elseif (array_key_exists("error", $messages)):
        ?>
        <div class="alert alert-block alert-danger">
            <p><?php echo $messages['error'] ?></p>
        </div>
    <?php endif;
}
?>
