    <input type="hidden" name="taskBitrix_id" value="{{ $taskBitrix_id }}">
    <button type="submit" class="btn btn-dark"
        value="<?php if(isset($task->id)) echo $task->id; ?>"
        name="task_id">
        Изменить
    </button>
</form>
