// 2 minutes
var cb_poll_duration = 30 * 2 * 1000;
// GLOBAL - Please do not override
var stories_counter = 0;
// {{{ cbPoll
cbPoll = function(duration) {
    // Get stories only when at the top of the page.
    if($(window).scrollTop() <= 0){
        setTimeout(function() {
            $.getJSON("get-stories-count.php", function(response) {
                if (response && response.count) {
                    stories_counter = response.count;
                    $( "#cbUpdatesCount" ).text(stories_counter).fadeIn('slow');
                } else {
                    stories_counter = response.count;
                    $( "#cbUpdatesCount" ).text("0").hide();
                }

                return cbPoll(cb_poll_duration);
            });
        }, cb_poll_duration);
    }else{
        setTimeout(function() {
            return cbPoll(cb_poll_duration);
        }, duration);
    }
},
// }}}
$(document).ready(function() {
    // {{{ Counter Clicks
    $('#cbTimelineContainer').click(function() {
        if ($('#cbTimeline').is(":hidden")) {
            $('#cbFeeds').hide();
            $('#cbPlaydates').hide(function() {
                $('#cbTimeline').show();
            });
        } else {
            getStories();
        }
    });
    $('#cbPlaydatesContainer').click(function() {
        if ($('#cbPlaydates').is(":hidden")) {
            $('#cbFeeds').hide();
            $('#cbTimeline').hide(function() {
                $('#cbPlaydates').show();
            });
        } else {
            getPlaydates();
        }
    });
    $('#cbFeedsContainer').click(function() {
        if ($('#cbFeeds').is(":hidden")) {
            $('#cbPlaydates').hide();
            $('#cbTimeline').hide(function() {
                $('#cbFeeds').show();
            });
        } else {
            getFeeds();
        }
    });
    // }}}
    function getStories() {
        $.getJSON("get-stories.php", function(response) {
            if (response) {
                stories_counter = 0;
                $('#cbUpdatesCount').hide();
                $( "#cbTimeline" ).storify({
                    large: true,
                    data: response
                });
            } else {
                alert("No stories to display right now.");
            }
        });
    }

    getStories();
    cbPoll(cb_poll_duration);
});
