(function ( $ ) {
    var private_methods = {
        // {{{ cbCreateLargeStory
        cbCreateLargeStory: function(settings, data) {
            if (!data || data.length == 0) {
                return false;
            }
            var id = settings.id;
            var story_div = null,
                clear = null,
                header = null,
                image = null,
                icons = null,
                comments = null,
                post = null;

            var story_div = $("<div id='" + data.snapshot_id + "' class='large-story'></div>");
            var clear = $("<div style='clear: both'></div>");
            var header = this.cbCreateLargeHeader(data);
            var image = this.cbCreateLargeStoryImage(data);
            var icons = this.cbCreateLargeIcons(settings.options.urls, data);
            var comments = this.cbCreateLargeCommentsSection(data);

            story_div.append(header);
            story_div.append(image);
            story_div.append(icons);
            story_div.append(comments);
            story_div.hide();

            $(id).prepend(story_div);

            story_div.slideDown(1000);
        },
        // }}}
        // {{{ start
        start: function(settings, data) {
            var len = data.length;
            for (var i=0; i < len; i++) {
                data[i].snapshot_id = data[i].id + '_' + new Date().getTime();
                this.cbCreateLargeStory(settings, data[i]);
            }
        },
        // }}}
        // {{{ cbCreateLargeCommentArea
        cbCreateLargeCommentArea: function(urls, data) {
            var comment_container = $('<div class="new-comment-container"></div>');
            var comment_area = $('<textarea class="new-comment-area"></textarea>');
            var comment_button = $('<input type="button" class="new-comment-button" value="Post" />');
            var clear = $("<div style='clear: both'></div>");

            comment_button.click(function() {
                var url = urls.comment + "?story=" + data.id + "&comment=" + comment_area.val();
                $.getJSON(url, function(response) {
                    if (response == false) {
                        alert("Problem submitting your comment. Please try again later");
                    } else {
                        comment_container.slideUp(500, function() {
                            $(this).remove();
                        });
                        var large_comment = this.cbCreateLargeComment(response);
                        $("#" + data.shapshot_id + ".large-story .comments-container")
                            .prepend(large_comment);
                    }
                }.bind(this));
            }.bind(this));

            comment_container.append(comment_area);
            comment_container.append(comment_button);
            comment_container.append(clear);

            return comment_container;
        },
        // }}}
        // {{{ cbCreateLargeCommentsSection
        cbCreateLargeCommentsSection: function(data) {
            var comments_container = $("#" + data.snapshot_id + ".large-story .comments-container");
            if (comments_container.attr('class') == undefined) {
                comments_container = $('<div class="comments-container"></div>');
            }

            if (!data.comments || data.comments.length == 0) {
                return comments_container;
            }


            var len = data.comments.length;
            for (var i=0; i < len; i++) {
                var comment = data.comments[i];
                comments_container.prepend(
                    this.cbCreateLargeComment(comment)
                );
            }

            return comments_container;
        },
        // }}}
        // {{{ cbCreateLargeComment
        cbCreateLargeComment: function(comment_data) {
            var comment = $('<div class="comment"></div>');
            var header = $("<div class='header'></div>");
            var image = $("<img class='image' userid='" + comment_data.user + "' src='data:image/jpeg;base64," + comment_data.image + "' />");
            var user = $("<div class='user' userid='" + comment_data.user + "'>" + comment_data.user + "</div>");
            var clear = $("<div style='clear: both'></div>");
            var description = $("<div class='description'>" + comment_data.description + "</div>");

            user.click(function() {
                window.location = "users.php?user=" + $(this).attr('userid');
            });
            image.click(function() {
                window.location = "users.php?user=" + $(this).attr('userid');
            });

            header.append(image);
            header.append(user);
            header.append(clear);

            comment.append(header);
            comment.append(clear);
            comment.append(description);

            return comment;
        },
        // }}}
        // {{{ cbCreateLargeStoryImage
        cbCreateLargeStoryImage: function(data) {
            if (!data.post || data.post.length == 0) {
                return null;
            }
            var image_container = $("<div class='image-container'></div>");
            var image = $("<div class='image' storyid='" + data.post.id + "'></div>");
            image.css('background-image', 'url(' + data.post.image + ')');

            image.click(function() {
                window.location = "posts.php?post=" + $(this).attr('storyid');
            });

            image_container.append(image);

            return image_container;
        },
        // }}}
        // {{{ cbCreateLargeIcons
        cbCreateLargeIcons: function(urls, data) {
            var icons = $("<div class='icons'></div>");
            var like = this.cbCreateLargeLikeIcon(urls.like, data);
            var comment = this.cbCreateLargeCommentIcon(urls, data);
            var hide = this.cbCreateLargeHideIcon(urls, data);

            icons.append(like);
            icons.append(comment);
            icons.append(hide);

            return icons;
        },
        // }}}
        // {{{ cbCreateLargeHideIcon
        cbCreateLargeHideIcon: function(urls, data) {
            var hide = $('<i class="hide icon"></i>');
            hide.click(function() {
                var url = urls.story + "?story=" + data.id + "&hide=true";
                $("#" + data.snapshot_id).slideUp(1000);
                $.getJSON(url, function(response) {
                });
            });

            return hide;
        },
        // }}}
        // {{{ cbCreateLargeCommentIcon
        cbCreateLargeCommentIcon: function(urls, data) {
            var comment = $('<i class="comment outline icon"></i>');

            comment.click(function() {
                var comment_container = $("#" + data.snapshot_id + ".large-story .new-comment-container");
                if (comment_container.attr("class") == undefined) {
                    var comment_area = this.cbCreateLargeCommentArea(urls, data);
                    $("#" + data.snapshot_id).append(comment_area);
                    $('#' + data.snapshot_id + '.large-story .' + comment_area.attr('class') + ' .new-comment-area').focus();
                } else if (comment_container.is(':hidden')) {
                    comment_container.slideDown(500);
                } else {
                    $(comment_container).slideUp(500);
                }
            }.bind(this));

            return comment;
        },
        // }}}
        // {{{ cbCreateLargeLikeIcon
        cbCreateLargeLikeIcon: function(url, data) {
            // NOTE: Semantic UI css dependency
            if (data.liked) {
                var like = $("<i style='color: green;' class='thumbs up icon'></i>");
            } else {
                var like = $("<i style='color: green;' class='thumbs up outline icon'></i>");
            }

            like.click(function() {
                if ($(this).hasClass("outline")) {
                    $(this).removeClass("outline");
                } else {
                    $(this).addClass("outline");
                }

                data.liked = (!data.liked);
                var myurl = url + "?liked=" + data.liked + "&story=" + data.id;
                $.getJSON(myurl, function(response) {
                });
            });

            return like;
        },
        // }}}
        // {{{ cbCreateLargeHeader
        cbCreateLargeHeader: function(data) {
            var header = $("<div class='header'></div>");
            var user_container = $("<div class='user-container'></div>");
            var user_image = $("<img class='user-image' userid='" + data.user + "' src='data:image/jpeg;base64," + data.user_image + "' />");
            var user = $("<div class='user' userid='" + data.user + "'>" + data.user + "</div>");
            var clear = $("<div style='clear: both'></div>");
            var description = $("<div class='description'>" + data.description + "</div>");

            user.click(function() {
                window.location = "users.php?user=" + $(this).attr('userid');
            });
            user_image.click(function() {
                window.location = "users.php?user=" + $(this).attr('userid');
            });

            user_container.append(user_image);
            user_container.append(user);
            user_container.append(clear);

            header.append(user_container);
            header.append(clear);
            header.append(description);

            return header;
        }
        // }}}
    };

    // Methods which should be exposed to avail the functionality(public methods)

    var methods = {
        // {{{ init
        init : function( options ) {
            // Default settings. Can be overridden.
            var defaults = {
                "large": true,
                "notificationId": "#cbUpdatesCounter",
                "urls": {
                    "stories": "get-stories.php",
                    "users": "users.php",
                    "like": "like.php",
                    "story": "story.php",
                    "comment": "comment.php"
                }
            };

            options = $.extend(defaults, options);
            data = options.data;
            delete options.data;
            var id = this.attr('id');

            // Aggregate all the required variables in one object
            var settings = {
                'options': options,
                'id': '#' + id,
            };

            // Setting aggregated data to namespace(id)
            $(this).data(id, settings);
            private_methods.start(settings, data);
            if (options.large == true) {
                //private_methods.cbCreateLargeStory(settings);
            }
        }
        // }}}
    };

    $.fn.storify = function(method) {
        // Taken from http://docs.jquery.com/Plugins/Authoring
        // Method calling logic
        if ( methods[method] ) {
            return methods[ method ].apply( this, Array.prototype.slice.call( arguments, 1 ));
        } else if ( typeof method === 'object' || ! method ) {
            return methods.init.apply( this, arguments );
        } else {
            $.error( 'Method ' +  method + ' does not exist on jQuery.TextAreaListCounter' );
        }
    };
}( jQuery ));
