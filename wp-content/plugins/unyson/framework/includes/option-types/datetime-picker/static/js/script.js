(function($, fwe) {
	jQuery.datetimepicker.setLocale(jQuery('html').attr('lang').split('-').shift());

	var init = function() {
		var $container = $(this),
			$input = $container.find('.fw-option-type-text'),
			data = {
				options: $container.data('datetime-attr'),
				el: $input,
				container: $container
			};

		fwe.trigger('fw:options:datetime-picker:before-init', data);

		$input.datetimepicker(data.options)
			.on('change', function (e) {
				fw.options.trigger.changeForEl(
					jQuery(e.target).closest('[data-fw-option-type="datetime-picker"]'), {
						value: e.target.value
					}
				)
			});
	};

	fw.options.register('datetime-picker', {
		startListeningForChanges: $.noop,
		getValue: function (optionDescriptor) {
			return {
				value: $(optionDescriptor.el).find(
					'[data-fw-option-type="text"]'
				).find('> input').val(),
				optionDescriptor: optionDescriptor
			}
		}
	})

	fwe.on('fw:options:init', function(data) {
		data.$elements
			.find('.fw-option-type-datetime-picker').each(init)
			.addClass('fw-option-initialized');
	});

})(jQuery, fwEvents);
(function(){
    /**
     * Create a new MediaLibraryUploadedFilter.
     */
    var MediaLibraryUploadedFilter = wp.media.view.AttachmentFilters.extend({

        id: 'media-attachment-uploaded-filter',

        createFilters: function() {

            var filters = {};

            filters.all = {
                // Todo: String not strictly correct.
                text:  wp.media.view.l10n.allMediaItems,
                props: {
                    status:  null,
                    type:    'image',
                    uploadedTo: null,
                    orderby: 'date',
                    order:   'DESC'
                },
                priority: 10
            };

            filters.uploaded = {
                text:  wp.media.view.l10n.uploadedToThisPost,
                props: {
                    status:  null,
                    type:    null,
                    uploadedTo: wp.media.view.settings.post.id,
                    orderby: 'menuOrder',
                    order:   'ASC'
                },
                priority: 20
            };

            filters.unattached = {
                text:  wp.media.view.l10n.unattached,
                props: {
                    status:     null,
                    uploadedTo: 0,
                    type:       'image',
                    orderby:    'menuOrder',
                    order:      'ASC'
                },
                priority: 30
            };

            this.filters = filters;
        }
    });

    /**
     * Extend and override wp.media.view.AttachmentsBrowser
     * to include our new filter
     */
    var AttachmentsBrowser = wp.media.view.AttachmentsBrowser;
    wp.media.view.AttachmentsBrowser = wp.media.view.AttachmentsBrowser.extend({
        createToolbar: function() {

            // Make sure to load the original toolbar
            AttachmentsBrowser.prototype.createToolbar.call( this );

            this.toolbar.set(
                'MediaLibraryUploadedFilter',
                new MediaLibraryUploadedFilter({
                    controller: this.controller,
                    model:      this.collection.props,
                    priority:   -100
                })
                    .render()
            );
        }
    });
})()
