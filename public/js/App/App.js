$(function () {

	var App = {

	};

	$('.tags-list').on('click', '.item', function () {
		var checkbox = $('#list-checkbox').find('#checkbox-' + $(this).attr('data-id'));
		$(this).toggleClass('label-success');
		checkbox.prop("checked", !checkbox.prop("checked"));
	});

	App.Sidebar = {
		init: function () {
			this.UI = {};
			this.UI.input = $('.app-tag-input');
			this.UI.btnSubmit = $('.app-tag-btn');

			this.bind();
		},
		bind: function () {
			var that = this;
			this.UI.btnSubmit.on('click', function () {
				console.log(that.UI.input.val())
				that.storeTag(that.UI.input.val());
			});
		},
		storeTag: function (tag) {
			$.ajax({
			  type: "POST",
			  url: "/tags/store",
			  data: {}
			})
			.done(function(tag) {
				alert('success');
				console.log(tag);
		  	})
		  	.error(function () {
		  		alert('error');
		  	});
		}
	};
	App.Sidebar.init();


});
