<?php

/**
 *
 * Please see single-event.php in this directory for detailed instructions on how to use and modify these templates.
 *
 */

?>

<script type="text/html" id="tribe_tmpl_tooltip">
	<div id="tribe-events-tooltip-[[=eventId]]" class="tribe-events-tooltip">
		[[ if(imageTooltipSrc.length) { ]]
		<div class="tribe-events-event-thumb">
			<img width="100%" src="[[=imageTooltipSrc]]" alt="[[=title]]" />
		</div>
		[[ } ]]
		<div class="tool-tip-body">
			<h4 class="tribe-event-title">[[=raw title]]</h4>
			<div class="tribe-event-duration">
				<abbr class="tribe-events-abbr tribe-event-date-start">[[=dateDisplay]] </abbr>
			</div>
			<div class="tribe-events-event-body">
				[[ if(excerpt.length) { ]]
				<p class="tribe-event-description">[[=raw excerpt]]</p>
				[[ } ]]
				<span class="tribe-events-arrow"></span>
			</div>
		</div>
	</div>
</script>