<?php
include_once($_SERVER['DOCUMENT_ROOT'].'\app\control\topics.php');
include_once($_SERVER['DOCUMENT_ROOT'].'\app\control\post.php');
?>
<aside class="section topics">
    <h3>Категории статей</h3>
    <ul>
        <?php foreach($queryTopicsName as $row):?>
        <li>
            <a href="search_page.php?topic_id=<?=$row['id']?>"><?=$row['topic_name'];?></a>
        </li>
        <?php endforeach;?>
    </ul>
</aside>

<!-- топ-3 постов по рейтингу -->

<aside class="section topics">
    <h3>Лучшие посты за всё время</h3>
    <ul>
    <?php foreach($topPosts as $topPost):?>
        <li><a href="single_post.php?id=<?=$topPost['id']?>"><?=mb_substr($topPost['title'],0,16).'..';?></a></li>
    <?php endforeach;?>
    </ul>
</aside>


