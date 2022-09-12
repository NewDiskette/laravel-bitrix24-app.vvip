<div class="form-group">
    <input type="text" class="form-control"
        id="hour_price" name="hour_price"
        <?php if(isset($task->hour_price)): ?>
            value="<?php echo $task->hour_price; ?>"
        <?php endif; ?>
    required>
</div>
