<div class="form-group">
    <input type="text" class="form-control"
        id="expert_rating" name="expert_rating"
        <?php if(isset($task->expert_rating)): ?>
            value="<?php echo $task->expert_rating; ?>"
        <?php endif; ?>
    required>
</div>
