<?php

// Lets show user detail every time we show a user icon (most generic way to show user details)

    $user = elgg_extract('entity', $vars, elgg_get_logged_in_user_entity());
    $size = 'medium';
    
    if (!($user instanceof ElggUser)) 
	return true;

?>
<div class="h-card" style="display: none;">
    <img class="u-photo" src="<?= elgg_format_url($user->getIconURL($size)); ?>" />
    <a class="p-name u-url fn" href="<?= $user->getUrl(); ?>"><?= htmlspecialchars($user->name, ENT_QUOTES, 'UTF-8', false); ?></a>
    <?php if ($user->email) { ?><a class="email u-email" href="mailto:<?= $user->email;?>"><?= $user->email;?></a><?php } ?>
    <span class="nickname p-nickname"><?= $user->username; ?></span>
</div>
