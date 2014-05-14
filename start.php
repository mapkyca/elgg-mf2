<?php

/**
 * MF2 support for Elgg.
 * 
 * Adds basic microformats support, as unobtrusively as possible, to existing elgg objects, so that they can
 * be easily parsed by various other Indieweb projects.
 *
 * @licence GNU Public License version 2
 * @link https://github.com/mapkyca/elgg-mf2
 * @link http://www.marcus-povey.co.uk
 * @link http://microformats.org/wiki/microformats-2
 * @author Marcus Povey <marcus@marcus-povey.co.uk>
 */


elgg_register_event_handler('init', 'system', function() {
    
    // Extend user icon (most generic way of adding author h-card to things)
    elgg_extend_view('icon/user/default', "mf2/icon/user/default");
    
    // Make h-card elements behave
    elgg_extend_view('object/elements/summary', "mf2/object/elements/summary");
    
    // Now, do some generic post processing to image block to make some elements behave correctly - the most generic way of adding h-entry details
    elgg_register_plugin_hook_handler('view', 'page/components/image_block', function($hook, $type, $return, $params) {
	return str_replace('<div class="elgg-image-block', '<div class="h-entry elgg-image-block ', $return);
    });
    
});
