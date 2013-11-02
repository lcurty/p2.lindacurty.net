<!-- Display Post Field -->
<?php include 'v_posts_add.php' ?>

<hr class="clear" />

<!-- Loop through posts for user and all follows -->
<?php foreach($posts as $post): ?>


  <article class="posts<?php foreach($comment_count AS $this_count): ?><?php if($this_count['post_id'] == $post['post_id']): ?> has_comment<?php endif ?><?php endforeach; ?>">
  
      <p class="posted_by"><?=$post['first_name']?> <?=$post['last_name']?></p>
  
      <div class="user_post">
      
        <p><?=$post['content']?></p>
    
        <time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
            <?=Time::display($post['created'])?>
        </time>
        
        <?php include 'v_posts_comment.php' ?>
        
      </div>
    
  </article>
 


  <div class="comment_box">
  
		<!-- Loop through comments for each post -->
  
    <?php foreach($comments AS $comment): ?>
      
      <?php if($comment['post_id'] == $post['post_id']): ?>
                  
        <article class="comments">
  
          <div class="post_comment">
    
            <p><span class="comment_by"><?=$comment['first_name']?> <?=$comment['last_name']?></span> &ndash; <?=$comment['comment']?></p>

            <time datetime="<?=Time::display($comment['created'],'Y-m-d G:i')?>">
                <?=Time::display($comment['created'])?>
            </time>
    
          </div>
        
        </article>
  
      <?php endif; ?>
    
    <?php endforeach; ?>
  
  </div>
  
  <hr class="clear" />

<?php endforeach; ?>
