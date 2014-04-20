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


	// App.Upload = {
	// 	init: function () {
	// 		this.UI = {};
	// 		this.UI.input = $('app-input-file');

	// 		this.bind();
	// 	},
	// 	bind: function () {
	// 		console.log('bind');
	// 	},
	// 	saveUpload: function () {

	// 	}
	// };
	// App.Upload.init();



	var settings = $("#mulitplefileuploader").uploadFile({
        url: "{{ URL::to('upload') }}",
        method: "POST",
        allowedTypes:"jpg,png,gif",
        fileName: "myfile",
        autoSubmit:false,
        showStatusAfterSuccess:false,
        onSubmit:function(files)
        {
            $('<input>').attr({
                type: 'text',
                name: 'myfile[]',
                value: files
            }).appendTo('#myform');
        },
        onSuccess:function(files,data,xhr)
        {
            $('#myform').submit();
        },
        onError: function(files,status,errMsg)
        {
            $("#status").html("<font color='green'>Something Wrong</font>");
        }
    });
	 
    $('.submit_form').click(function() {

        var validate = $("#myform").validationEngine('validate');
        var has_file = $(".ajax-file-upload-statusbar").length //check if there files need upload

        if(validate){
            if(has_file != false){
                settings.startUpload();
            }else{
                $('#myform').submit();
            }
        }
    });







	

});
