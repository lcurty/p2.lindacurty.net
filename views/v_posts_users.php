<?php foreach($users as $user): ?>

        <?=$user['first_name']?> <?=$user['last_name']?>
        
        <?php if(isset($connections[$user['user_id']])): ?>
                <a class='follow_button' href='/posts/unfollow/<?=$user['user_id']?>'>Unfollow</a>
        <?php else: ?>
                <a class='follow_button' href='/posts/follow/<?=$user['user_id']?>'>Follow</a>
        <?php endif; ?>        
        
        <br><br>

<?php endforeach ?>