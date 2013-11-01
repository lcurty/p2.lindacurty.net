<!-- Display Post Field -->
<?php include 'v_posts_add.php' ?>

<!-- Loop through posts for user and all follows -->
<?php foreach($posts as $post): ?>

  <article>
  
      <p class="posted_by"><?=$post['first_name']?> <?=$post['last_name']?></p>
  
      <div class="user_post">
      
        <p><?=$post['content']?></p>
    
        <time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
            <?=Time::display($post['created'])?>
        </time>
        
        <?php include 'v_posts_comment.php' ?>
        
      </div>
    
  </article>

	<!-- Loop through comments for each post -->
  
    <?php foreach($comments AS $comment): ?>
    	
			<?php if($comment['post_id'] == $post['post_id']): ?>
                  
      	<article>
  
          <div class="post_comment">
    
            <p class="comment_by"><?=$comment['first_name']?> <?=$comment['last_name']?></p>
            <p><?=$comment['comment']?></p>
    
          </div>
        
        </article>

      <?php endif; ?>
		
		<?php endforeach; ?>
 

<?php endforeach; ?>
