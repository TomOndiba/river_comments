
elgg.ui.widgets.saveSettings = function(event) {
	$(this).parent().slideToggle('medium');
	var $widgetContent = $(this).parent().parent().children('.elgg-widget-content');

	// stick the ajax loader in there
	var $loader = $('#elgg-widget-loader').clone();
	$loader.attr('id', '#elgg-widget-active-loader');
	$loader.removeClass('hidden');
	$widgetContent.html($loader);

	var default_widgets = $("input[name='default_widgets']").val() || 0;
	if (default_widgets) {
		$(this).append('<input type="hidden" name="default_widgets" value="1">');
	}

	elgg.action('widgets/save', {
		data: $(this).serialize(),
		success: function(json) {
			$widgetContent.html(json.output);
			if (typeof(json.title) != "undefined") {
				var $widgetTitle = $widgetContent.parent().parent().find('.elgg-widget-title');
				$widgetTitle.html(json.title);
			}
			rcPrepareItems();
		}
	});
	event.preventDefault();
};

