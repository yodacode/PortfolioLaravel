$(function () {

    var App = {
        constructors: {}, //object constructors
        screen1Settings: {sizeX: 500, sizeY: 500},
        currentScreen: null
    };

    App.Sidebar = {};

    App.Sidebar.Tags = {
        init: function () {

            this.UI = {};
            this.UI.tagList = $('.app-tags-list');
            this.UI.checkboxList = $('.app-tags-checkbox');
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
                    console.log(e,data);
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
            this.UI = {};
            this.UI.gallery = $('.gallery');
            this.UI.modalAttachMedias = $('#attachMedias');
            this.UI.checkboxList = $('.app-medias-checkbox');
            this.UI.listMediasThumbs = $('.app-list-medias-thumb');
            this.bind();

        },
        bind: function () {
            var that = this;
            this.UI.gallery.css('opacity', 0);

            // initialize Masonry after all images have loaded
            this.UI.gallery.imagesLoaded( function() {
                that.UI.gallery.masonry().animate({
                    'opacity': 1
                }, 1000);
            });

            $(".thumb").hover(
               function() {
                    $(this).find('.overlay').stop().fadeIn(300);
                },
                function() {
                    $(this).find('.overlay').stop().fadeOut(300);
                }
            );

            $('.btn-remove').click(function (e) {
                e.preventDefault();
                $(this).closest('.thumb').remove();
                that.UI.gallery.masonry();
                that.removeMedia($(this).attr('data-id'))
            });

            that.UI.modalAttachMedias.on('hidden.bs.modal', function (e) {
                that.UI.listMediasThumbs.empty();
                $(this).find('img').each(function () {
                    var cloneImg;
                    if ($(this).hasClass('selected')) {
                        cloneImg = $(this).clone();
                        that.UI.listMediasThumbs.append(cloneImg);
                    }
                })
            });

            that.UI.modalAttachMedias.find('.modal-body').on('click', 'img', function () {
                var checkbox = that.UI.checkboxList.find('#checkbox-media-' + $(this).attr('data-id'));
                checkbox.prop("checked", !checkbox.prop("checked"));
                $(this).toggleClass('selected');
            });


        },
        removeMedia: function (id) {
            $.ajax({
              type: "POST",
              url: "/medias/destroy",
              data: {id: id}
            })
            .done(function(r) {
                console.log(r);
            })
            .error(function (error) {
                console.log(error);
            });
        },

        appendMediasInModal: function (medias) {
            var img,
                media,
                container = this.UI.modalAttachMedias.find('.modal-body');

            for (var i in medias) {
                media = medias[i];

                img = $('<img>')
                    .attr({
                        'class':'img-thumbnail thumb',
                        'src': '/uploads/thumbs/' + media.name,
                        'data-id': media.id
                    })
                    .appendTo(container);
            }
        }

    }
    App.Gallery.init();

});
