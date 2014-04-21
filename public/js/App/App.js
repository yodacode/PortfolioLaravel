$(function () {

	var App = {
	    constructors: {}, //object constructors
	    screen1Settings: {sizeX: 500, sizeY: 500},
	    currentScreen: null
	};

	App.constructors.TagsManager = function (settings) {
		init
	};

	App.Sidebar = {

	};


	App.Sidebar.Tags = {
		init: function () {

			this.UI = {};
			this.UI.tagList = $('.app-tags-list');
			this.UI.checkboxList = $('.app-list-checkbox');
			this.UI.input = $('.app-tag-input');
			this.UI.formTags = $('.app-form-tags');

			this.bind();
		},
		bind: function () {
			var that = this;

			this.UI.formTags.submit(function (e) {
				e.preventDefault();
				that.saveTag(that.UI.input.val());
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
				that.UI.input.val('');
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
	App.Sidebar.Tags.init();

	App.Sidebar.Categories = {
		init: function () {

			this.UI = {};
			this.UI.select = $('.app-select');
			this.UI.formCategories = $('.app-form-categories');
			this.UI.input = $('.app-category-input');

			this.bind();
		},
		bind : function () {
			var that = this;
			this.UI.formCategories.submit(function (e) {

				e.preventDefault();
				that.saveCategory(that.UI.input.val());
			});
		},
		saveCategory: function (cat) {
			var that = this;
			$.ajax({
			  type: "POST",
			  url: "/categories/store",
			  data: {title: cat}
			})
			.done(function(cat) {
				that.createCatOption(cat);
				that.UI.input.val('');
				that.UI.select.find('option:last').attr('selected', 'selected');
		  	})
		  	.error(function (error) {
		  		console.log(error);
		  	});
		},
		createCatOption: function (cat) {
			var option = $('<option>')
		       	.attr('value', cat.id)
		       	.text(cat.title)
		       	.appendTo(this.UI.select);
		}
	};
	App.Sidebar.Categories.init();


	App.Upload = {
		init: function () {
			this.UI = {};
			this.UI.input = $('.app-input-file');
			this.UI.progress = $('.app-progress-bar');
			this.UI.modal = $('#mediaUpload');
			this.UI.preview = $('.app-preview')
			this.bind();
		},
		bind: function () {
			var that = this;

			this.fileUpload();
			this.UI.modal.on('hidden.bs.modal', function (e) {
  				that.resetModal();
  				window.location.reload();
			});
		},
		resetModal: function () {
			this.UI.progress.css(
			    'width',
			    0 + '%'
			);
			this.UI.preview.empty();
		},
		fileUpload: function () {
			var that = this;

			this.UI.input.fileupload({
				url: '/medias/upload',
				dataType: 'json',
				done: function (e, data) {
					$('<img/>')
						.attr({
							'src': '/uploads/' + data.result.filename,
							'class': 'img-thumbnail'
						})
						.appendTo(that.UI.preview);
				},
				progressall: function (e, data) {
					// Update the progress bar while files are being uploaded
					var progress = parseInt(data.loaded / data.total * 100, 10);
					console.log(progress);
					that.UI.progress.css(
					    'width',
					    progress + '%'
					);
 				}
			});
		}
	};
	App.Upload.init();


	App.Gallery = {
		init: function () {
			//this.UI.gallery = $('.gallery');
			this.build();
		},
		build: function () {
			$('.gallery').masonry({
				columnWidth: 10,
				itemSelector: '.item'
			});
		}
	}
	App.Gallery.init();

});
