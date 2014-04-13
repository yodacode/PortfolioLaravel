$(function () {

	var App = {

	};



	App.Sidebar = {
		init: function () {

			this.UI = {};
			this.UI.tagList = $('.app-tags-list');
			this.UI.checkboxList = $('.app-list-checkbox');
			this.UI.input = $('.app-tag-input');
			this.UI.formTags = $('.app-form-tags');
			this.UI.btnSubmit = $('.app-tag-btn');

			this.bind();
		},
		bind: function () {
			var that = this;

			this.UI.formTags.submit(function (e) {
				e.preventDefault();
				that.saveTag(that.UI.input.val());
				console.log($(this));
			});

			this.UI.tagList.on('click', '.item', function () {
				var checkbox = that.UI.checkboxList.find('#checkbox-' + $(this).attr('data-id'));
				$(this).toggleClass('label-success');
				checkbox.prop("checked", !checkbox.prop("checked"));
			});
		},
		saveTag: function (tag) {
			var that = this;
			$.ajax({
			  type: "POST",
			  url: "/tags/store",
			  data: {title: tag}
			})
			.done(function(tag) {
				that.createTagLabel(tag);
		  	})
		  	.error(function (error) {
		  		console.log(error);
		  	});
		},
		createTagLabel: function (tag) {
			var span, checkbox;

			span = $('<span>')
		       	.attr({'class':'label label-default item', 'data-id':tag.id})
		       	.text(tag.title)
		       	.appendTo(this.UI.tagList);

		    checkbox = $('<input>')
		    	.attr({id: 'checkbox-' + tag.id, name: 'tag[]', type: 'checkbox', value: tag.id})
		    	.appendTo(this.UI.checkboxList);

		}
	};
	App.Sidebar.init();


});
