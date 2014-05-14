<?php
/**
 * Body of river item
 *
 * @uses $vars['item']        ElggRiverItem
 * @uses $vars['summary']     Alternate summary (the short text summary of action)
 * @uses $vars['message']     Optional message (usually excerpt of text)
 * @uses $vars['attachments'] Optional attachments (displaying icons or other non-text data)
 * @uses $vars['responses']   Alternate respones (comments, replies, etc.)
 */

$item = $vars['item'];


$summary = elgg_extract('summary', $vars, elgg_view('river/elements/summary', array('item' => $vars['item'])));

$group_string = '';
$object = $item->getObjectEntity();
$container = $object->getContainerEntity();
$subject = $item->getSubjectEntity();

if ($container instanceof ElggGroup && $container->guid != elgg_get_page_owner_guid()) {
	$group_link = elgg_view('output/url', array(
		'href' => $container->getURL(),
		'text' => $container->name,
		'class' => 'u-url',
		'is_trusted' => true,
	));
	$group_string = elgg_echo('river:ingroup', array($group_link));
}

?>
<p style="display: none;" class="p-summary"><?= $summary; ?> <?= $group_string; ?></p>
<p style="display: none;" class="e-content"><?= elgg_extract('message', $vars, false); ?> <?= $group_string; ?></p>
<time style="display: none;" class="dt-published" datetime="<?= date(DATE_W3C, $item->getPostedTime()); ?>"><?= date('c', $item->getPostedTime()); ?></time>
    <?php if ($object) { ?><a style="display:none;" href="<?=$object->getUrl(); ?>" class="u-url object"><?= $object->name ? $object->name : $object->title; ?></a><?php } ?>
<?php if ($subject) { ?><a style="display:none;" href="<?=$subject->getUrl(); ?>" class="u-url subject"><?= $object->name ? $subject->name : $subject->title; ?></a><?php } ?>
<?php if ($container && ($container->guid != $subject->guid)) { ?><a style="display:none;" href="<?=$container->getUrl(); ?>" class="u-url target"><?= $container->name ? $container->name : $container->title; ?></a><?php } ?>

