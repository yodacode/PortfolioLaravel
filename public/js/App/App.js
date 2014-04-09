$(function () {
	$('.tags-list').on('click', '.item', function () {
		var checkbox = $('#list-checkbox').find('#checkbox-' + $(this).attr('data-id'));

		$(this).toggleClass('label-success');
		checkbox.prop("checked", !checkbox.prop("checked"));

	});
});