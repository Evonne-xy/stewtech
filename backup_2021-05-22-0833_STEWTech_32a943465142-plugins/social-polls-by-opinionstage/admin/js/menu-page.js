jQuery(document).ready(function ($) {
	var OpinionstageMyItems = {
		cacheElements: function() {
			this.cache = {
				$messageLoading: $('#opinionstage-my-items-loading-message'),
				$messageNoItemsFound: $('#opinionstage-my-items-no-items'),
				$buttonLoadMore: $('#opinionstage-load-more'),
				$table: $('#opinionstage-items-table'),
				$loadtPage: 1,
				$selectorWidgetType: $('#itemList'),
				$searchField: $('#opinionstage-my-items-search-field'),
				$failedLoadItemsMessage: $('#opinionstage-failed-load-items-request'),
				$searchTerm: '',
				$modal: $('#opinionistage-my-items-page-modal-wrapper'),
				$modalShortcodeTextarea: $('#opinionstage-widget-shortcode'),
				$openModalButton: '.opinionstage-open-modal',
				$closeModalButton: $('#opinionstage-dialog-close'),
				$copyButtonSelector: '[data-copy-text-from]',

				$widgetType: $('#itemList').val() ? $('#itemList').val() : 'all'
			}
		},
		loadItems: function(override, firstLoad ){
      if (override === undefined) {
        override = true
      }
      if (firstLoad === undefined) {
        firstLoad = false
      }
			var self = this
			if (override) {
				self.cache.$table.html('')
				self.cache.$messageLoading.show()
				self.cache.$messageNoItemsFound.hide()
			}
			self.cache.$buttonLoadMore.hide()
			self.cache.$failedLoadItemsMessage.hide()

			$.ajax({
				url: ajaxurl,
				type: 'GET',
				data: {
					action: 'opinionstage_ajax_load_my_items',
					type: self.cache.$widgetType,
					per_page: 10,
					page: self.cache.$loadtPage,
					title_like: self.cache.$searchTerm,
					security: OPINIONSTAGE.myItemsNonce
				},
				success: function( response ) {
					self.cache.$messageLoading.hide()
					if( response.success ) {
						if( response.html.length > 0 ) {
							self.renderResults( response.html, override )
							if( response.nextPage ) {
								self.cache.$buttonLoadMore.show()
								self.cache.$loadtPage = response.nextPage
							} else {
								self.cache.$buttonLoadMore.hide()
							}
						} else {
							if( firstLoad ) {
								$('.opinionstage-item-view-dashboard').hide()
								$('.opinionstage-dashboard-left').show()
							}
							self.cache.$messageNoItemsFound.show()
						}
					} else {
						self.cache.$failedLoadItemsMessage.show()
					}
				}
			})
		},

		bindEvents: function() {
			var self = this
			self.cache.$buttonLoadMore.on('click', function (e) {
				e.preventDefault()
				self.loadItems(false)
			})

			self.cache.$selectorWidgetType.on('change', function (e) {
				e.preventDefault()
				self.cache.$loadtPage = 1
				self.cache.$searchField.val('')
				self.cache.$searchTerm = ''
				self.cache.$widgetType = $(this).val()
				self.loadItems()
			})

			self.cache.$searchField.on("keyup", function(e) {
				if (e.key === 'Enter') {
					self.cache.$searchTerm = $(this).val()
					self.cache.$loadtPage = 1
					self.loadItems()
				}
			})

      $('body').on('click', self.cache.$openModalButton, function (e) {
        e.preventDefault()
        var shortcode = $(this).data('shortcode')

        $(self.cache.$modalShortcodeTextarea).val(shortcode)
        self.cache.$modal.fadeIn()
      })

      self.cache.$modal.on('click', function (e) {
        if ($(e.target).is(self.cache.$modal)) {
           self.cache.$modal.fadeOut(function () {
             $(self.cache.$modalShortcodeTextarea).val('')
           })
        }
      })
      self.cache.$closeModalButton.on('click', function (e) {
        self.cache.$modal.fadeOut(function () {
          $(self.cache.$modalShortcodeTextarea).val('')
        })
      })

      $("body").on("click", self.cache.$copyButtonSelector, function (e) {
        e.preventDefault()
        var t = $(this).data().copyTextFrom
        $("[" + t + "]")[0].select()
        document.execCommand("copy")
      })
    },

		renderResults: function( html_ajax, override ){
			var self = this
			var html = override ? '' : self.cache.$table.html()
			html += html_ajax
			self.cache.$table.html(html)
		},

		init: function() {
			this.cacheElements()
			this.loadItems( true, true )
			this.bindEvents()
		}
	}

  if ($('.opinionstage-item-view-dashboard').length > 0) {
    OpinionstageMyItems.init()
  }

  $('a.opinionstage-disabled-link').click(function(e){
    e.preventDefault()
  })

	if ($('.opinionstage-show-anchor-list').length > 0) {

		$('.opinionstage-show-anchor-list').click(function (e) {
			e.preventDefault()
			$('.opinionstage-anchors-list').toggleClass('opened')
		})

		$(document).click(function (e) {
			if (!$(e.target).is('.opinionstage-show-anchor-list') && $('.opinionstage-anchors-list').hasClass('opened')) {
				$('.opinionstage-anchors-list').removeClass('opened')
			}
		})
	}
})
