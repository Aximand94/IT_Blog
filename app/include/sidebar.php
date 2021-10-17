<?php
include($_SERVER['DOCUMENT_ROOT'].'\app\control\topics.php');?>
<aside class="section topics">
    <h3>Категории статей</h3>
    <ul>
        <?php foreach($queryTopicsName as $row):?>
        <li>
            <a href="#"><?=$row['topic_name'];?></a>
        </li>
        <?php endforeach;?>
    </ul>
</aside>




<!--
            <aside class="section topics">
                <h3>Категории статей</h3>
                <ul>
                    <li><a href="#">Новости</a></li>
                    <li><a href="#">Гайды</a></li>
                    <li><a href="#">Обзоры</a></li>
                    <li><a href="#">Железо</a></li>
                    <li><a href="#">Топ постов</a></li>
                </ul>
            </aside>
        -->
