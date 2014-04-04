$(function () {
	$('.tags-list').on('click', '.item', function () {
		
		var label = $(this).find('.label'),
			checkbox = label.find('input[type=checkbox]');

		label.toggleClass('label-info');
		checkbox.prop("checked", !checkbox.prop("checked"));
		
		
	});
});