<?php include 'v_posts_add.php' ?>

<?php foreach($posts as $post): ?>

<article>

    <p class="posted_by"><?=$post['first_name']?> <?=$post['last_name']?></p>

    <div class="user_post">
    
      <p><?=$post['content']?></p>
  
      <time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
          <?=Time::display($post['created'])?>
      </time>
    
    </div>
    
</article>

<?php endforeach; ?>
