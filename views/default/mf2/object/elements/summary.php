<?php
/**
 * Object summary
 *
 * Sample output
 * <ul class="elgg-menu elgg-menu-entity"><li>Public</li><li>Like this</li></ul>
 * <h3><a href="">Title</a></h3>
 * <p class="elgg-subtext">Posted 3 hours ago by George</p>
 * <p class="elgg-tags"><a href="">one</a>, <a href="">two</a></p>
 * <div class="elgg-content">Excerpt text</div>
 *
 * @uses $vars['entity']    ElggEntity
 * @uses $vars['title']     Title link (optional) false = no title, '' = default
 * @uses $vars['metadata']  HTML for entity menu and metadata (optional)
 * @uses $vars['subtitle']  HTML for the subtitle (optional)
 * @uses $vars['tags']      HTML for the tags (default is tags on entity, pass false for no tags)
 * @uses $vars['content']   HTML for the entity content (optional)
 */

$entity = $vars['entity'];
if ($entity instanceof ElggUser) return true; // Don't extend users

if (isset($entity->title)) {
	$text = $entity->title;
} else {
	$text = $entity->name;
}

$metadata = elgg_extract('metadata', $vars, '');
$subtitle = elgg_extract('subtitle', $vars, '');
$content = elgg_extract('content', $vars, $entity->description);

?>
<h1 style="display: none;" class="p-name"><?= $text; ?></h1>
<a style="display: none;" href="<?= $entity->getUrl(); ?>" class="u-url"><?= $text; ?></a>
<p style="display: none;" class="p-summary"><?= $subtitle; ?></p>
<div style="display: none;" class="e-content"><?= $content; ?></div>
