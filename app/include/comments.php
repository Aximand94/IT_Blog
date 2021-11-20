<?php
include($_SERVER['DOCUMENT_ROOT']."/app/control/comments.php");
?>

<div class="col-md-12 col-12 comment">
    <div class="row all-comments">
        <h3 class="col-12">Коментарии  записи</h3>
        <?php if(count($comments)>0):?>
            <?php foreach($comments as $comment):?>
                <div class="col-12 one-comment">
                    <span><i class="far fa-user"></i><?=$comment['user_name']?></span>
                    <span id="date"><i class="far fa-calendar-check"></i><?=$comment['create_dtime']?></span>
                    <div class="col-12 text">
                        <?=$comment['comment']?>
                    </div>
                </div>
            <?php endforeach;?>
        <?php else:?>
            <div><p>К этой записи ещё никто не оставил комментариев. Будьте первым!</p></div>
        <?php endif;?>
    </div>

 <!-- Добавить коментарий -->
    <h3>Оставить комментарий</h3>
    <form action="app/control/comments.php" method="POST">
        <inpu
        <div class="mb-3">
            <label for="comment" class="form-label">Коментарий</label>
            <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
        </div>
        <input type="hidden" name="post_id" value="<?=$post['id']?>">
        <div class="d-grid gap-2 col-12 mx-auto">
            <input type="submit" class="btn btn-primary" name="add_comment" value="Добавить">
        </div>
    </form>
</div>
