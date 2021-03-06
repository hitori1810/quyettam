/*********************************************************************************
 * By installing or using this file, you are confirming on behalf of the entity
 * subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
 * the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
 * http://www.sugarcrm.com/master-subscription-agreement
 *
 * If Company is not bound by the MSA, then by installing or using this file
 * you are agreeing unconditionally that Company will be bound by the MSA and
 * certifying that you have authority to bind Company accordingly.
 *
 * Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
 ********************************************************************************/

(function($) {
    var SearchAhead = function (element, options) {
        this.options = $.extend({}, $.fn.searchahead.defaults, options);
        /*
         * Example initialization of plugin:
         *
         * this.$('.search-query').searchahead({
         *     request:  fireSearchRequest,
         *     compiler: menuTemplate,
         *     buttonElement: '.navbar-search a.btn'
         * });
         */
        
        // A String representing the selector of search input element
        // required
        this.$element = $(element);

        // request: function that makes http request. It will receive one parameter,
        // the current search term, and must call the plugin.provide method with data
        // received. Note, it will receive have the plugin scope. For example:
        //
        // var plugin = this; // this points to the searchahead plugin's this
        // app.api.search(term, 'name', {
        //   success:function(data) {
        //     plugin.provide(data);
        //   }
        // });
        //
        // required
        this.request = this.options.request;

        // Compiler will be passed data as an object literal like:
        // { data: <data>, term: <last_search_term> }
        // It must produce a string representing the markup desired.
        //
        // compile will get the data + last search term
        //
        // required
        this.compiler = this.options.compiler;


        // Optional - rest of these have defaults if not supplied
        this.$button = this.options.buttonElement ? $(this.options.buttonElement) : null;// optional search button that triggers search ahead dropdown
        this.throttle = this.options.throttle || this.throttle;
        this.throttleMillis = this.options.throttleMillis || this.throttleMillis;
        // TODO: Assumes <div id='searchForm'><form><input> structure ... hence parent of parent
        this.$menu = $(this.options.menu).appendTo(this.$element.parent().parent());
        this.shown = false;
        // Since 0 is falsy in javascript, use -1 if no minimum desired
        this.minChars = this.options.minChars || 1;
        this.patchIfZepto();
        this.listen();
        // If user hitting enter key should be considered trigger to follow selected link (or
        // current search term if they haven't navigated in to the drop down results) use function
        this.onEnterFn = this.options.onEnterFn || null;
    };
    
    SearchAhead.prototype = {
        constructor: SearchAhead, 
        compile: function(data) {
            //URI encode the search query term to keep href safe (bug55572)
            return (this.compiler({data:data, term: encodeURIComponent(this.query)}));
        },
        disabled: false,
        enable: function() {
            this.disabled = false;
        },
        disable: function(millis) {
            var self = this;
            self.disabled = true;
            self.hide();
            // Hack - in case a search is just right now about to be rendered we have to hide
            setTimeout(function() {
                self.hide();
            }, self.throttleMillis);
            setTimeout(function() {
                self.enable();
            }, millis);
        },
        throttleMillis: 250,
        throttle: function(callback, millis) {
            var timerId = null;
            timerId = setTimeout(function() { 
                callback();
            }, millis);
        },
        go: function () {
            var activeItem = null, href = null, term = null;
            activeItem = this.$menu.find('.active');
            href = activeItem.find('a').attr('href');
            if(href) {
                if(this.onEnterFn) {
                    this.onEnterFn(href, true);
                } else {
                    window.location = href;
                }
            } else {
                // They may not have any item in dropdown selected.

                // Search term is a URI segment, we need to encode it so
                // that it gets routed appropriately. (bug55572)
                term= encodeURIComponent(this.$element.val());

                // In this case, use term entered if any.
                if(term && term.length) {
                    // If no onEnterFn do nothing.
                    if(this.onEnterFn) {
                        this.onEnterFn(term, false);
                    } 
                } 
            }
            return this.hide();
        },
        show: function () {
            this.$menu.show();
            this.shown = true;

            if(!this.disabled) {
                this.$menu.show();
                this.shown = true;
                return this;
            }
            return null;
        },
        hide: function () {
            this.$menu.hide();
            this.shown = false;
            return this;
        },
        // User clicks the search button (optional buttton) 
        // then do autocomplete dropdown and put focus back on input
        buttonLookup: function (evt) {
            evt.stopPropagation();
            evt.preventDefault();
            this.lookup(evt);
            this.$element.focus();
        },
        lookup: function (evt) {
            var that = this, items;
            this.query = this.$element.val();
            if (!this.query) {
                return this.shown ? this.hide() : this;
            }
            this.onSearch(evt);
        },
        onSearch: function(evt) {
            var self = this;
            //filter out up/down, tab, enter, and escape keys
            if( $.inArray(evt.keyCode,[40,38,9,13,27]) === -1 ){
                evt.preventDefault();
                self.throttle(function() {
                    // check length of current term just before make the call .. rapid back button ;) 
                    self.query = self.$element.val();
                    if(self.query && self.query.length >= self.minChars) {
                        self.request(self.query);
                    } else {
                        self.hide();
                    }
                }, self.throttleMillis);
            }
        },
        provide: function (data) {
            var trimmed, markup = this.compile(data), self = this;
            trimmed = markup.replace(/^\s+/,'').replace(/\s+$/,'');
            if(trimmed.length) {
                // TODO: Assumes they've used <li>'s - would be nice to make more flexible
                markup = markup.replace(/^(?:\s*<li\>\s*)/, function(match, $1, $2, offset, original) { 
                    return '<li class="active">'; 
                });
                $(markup).first().addClass('active');
                self.$menu.html(markup);
                if(!self.disabled) {
                    return self.show();
                }
            }
            return null;
        },
        move: function (event, direction) {
            var active = this.$menu.find('.active').removeClass('active'), move;
            if(direction==='next') {
                move = active.next();
            } else {
                move = active.prev();
            }
            if (!move.length) {
                move = $(this.$menu.find('li')[0]);
            }
            move.addClass('active');
        },
        next: function (e) {
            this.move(e, 'next');
        },
        prev: function (e) {
            this.move(e, 'prev');
        },
        // These are mostly lifted from:
        // http://blog.pamelafox.org/2011/11/porting-from-jquery-to-zepto.html
        patchIfZepto: function() {

            if(!_.isUndefined(window.Zepto)) {

                // patch support
                $.support = {};

                // patch proxy
                $.proxy = function( fn, context ) {
                    var args, tmp, proxy;

                    if ( typeof context === "string" ) {
                        tmp = fn[ context ];
                        context = fn;
                        fn = tmp;
                    }
                    // Quick check to determine if target is callable, in the spec
                    // // this throws a TypeError, but we will just return undefined.
                    if ( !$.isFunction( fn ) ) {
                        return undefined;
                    }
                    // Simulated bind
                    args = Array.prototype.slice.call( arguments, 2 );
                    proxy = function() {
                        return fn.apply( context, args.concat( Array.prototype.slice.call( arguments ) ) );
                    };
                    // Set the guid of unique handler to the same of original handler, so it can be removed
                    proxy.guid = fn.guid = fn.guid || proxy.guid || $.guid++;
                    return proxy;
                };
            }
        },
        listen: function () {
            // $element is the search input
            this.$element
                .on('blur',     $.proxy(this.blur, this))
                .on('keypress', $.proxy(this.keypress, this))
                .on('keyup',    $.proxy(this.keyup, this));

            if ($.browser.webkit || $.browser.msie) {
                this.$element.on('keydown', $.proxy(this.keypress, this));
            }
            // This is an optional search button that may reside next to the
            // search input. If buttonElement set, then will exist. Essentially,
            // this will just trigger a lookup and put focus on the input
            if (this.$button) {
                this.$button
                    .on('click', $.proxy(this.buttonLookup, this));
            }

            // $menu is the dynamic dropdown
            this.$menu
                .on('mouseenter', 'li', $.proxy(this.mouseenter, this));
        },
        // Keyups while within the input
        keyup: function (e) {
            switch(e.keyCode) {
                case 40: // down arrow
                case 38: // up arrow
                    break;
                case 9:  // tab
                    if(!this.options.tabToSelect)
                    break;
                case 13: // enter

                    if(this.onEnterFn) {
                        this.go();
                        break;
                    }

                    if (!this.shown) return;
                    this.lookup(e);
                    break;

                case 27: // escape
                    if (!this.shown) return;
                    this.hide();
                    break;
                    
                default:
                    this.lookup(e);
            }
            e.stopPropagation();
            e.preventDefault();
        },
        keypress: function (e) {
            if (!this.shown) return;

            switch(e.keyCode) {
                case 9:  // tab
                case 13: // enter
                case 27: // escape
                    e.preventDefault();
                    break;

                case 38: // up arrow
                    if (e.type !== 'keydown') break;
                    e.preventDefault();
                    this.prev();
                    break;

                case 40: // down arrow
                    if (e.type !== 'keydown') break;
                    e.preventDefault();
                    this.next();
                    break;
            }
            e.stopPropagation();
        },
        blur: function (e) {
            var that = this;
            setTimeout(function () { that.hide(); }, 150);
        },
        mouseenter: function (e) {
            this.$menu.find('.active').removeClass('active');
            $(e.currentTarget).addClass('active');
        }
    };

    $.fn.searchahead = function (option) {
        return this.each(function () {
            var $this = $(this),
                data = $this.data('searchahead'),
                options = typeof option === 'object' && option;

            if (!data) {
                $this.data('searchahead', (data = new SearchAhead(this, options)));
            }
            if (typeof option === 'string') {
                data[option]();
            }
        });
    };

    $.fn.searchahead.defaults = {
        items: 10,
        // TODO: typeahead is legacy; when we update styleguide this
        // should probably be 'searchahead' 
        menu: '<ul class="typeahead dropdown-menu"></ul>'
    };
    $.fn.searchahead.Constructor = SearchAhead;

})(window.$);

