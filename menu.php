<!DOCTYPE html>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<?php
$updates = (rand(0, 1000) % 2) ? rand(0, 12) : false;
$reminders = (rand(0, 1000) % 2) ? rand(0, 12) : false;
$feeds = (rand(0, 1000) % 2) ? rand(0, 12) : false;
?>
<div id="cbMenu">
<div class="ui large menu" style="margin: 0px;">
  <a class="active teal item" id="cbTimelineContainer">
    &nbsp;&nbsp;&nbsp;&nbsp;<i class="large home icon"></i>&nbsp;&nbsp;Timeline&nbsp;&nbsp;&nbsp;&nbsp;
    <div id="cbUpdatesCount" class="floating ui teal label"><?php echo $updates ?></div>
  </a>
  <a class="blue purple item" id="cbPlaydatesContainer">
    &nbsp;&nbsp;&nbsp;&nbsp;<i class="large user icon"></i>&nbsp;&nbsp;Playdates&nbsp;&nbsp;&nbsp;&nbsp;
    <div id="cbRemindersCount" class="floating ui purple label"><?php echo $reminders;?></div>
  </a>
  <a class="green item" id="cbFeedsContainer">
    &nbsp;&nbsp;&nbsp;&nbsp;<i class="large home icon"></i>&nbsp;&nbsp;Feeds&nbsp;&nbsp;&nbsp;&nbsp;
    <div id="cbFeedsCount" class="floating ui green label"><?php echo $feeds;?></div>
  </a>
</div>
</div>
<script type="text/javascript">
var colors = ['#56802D', '#68657E', '#689598', '#5D6B7E', '#6A546F'];
$(document).ready(function() {
    var color = colors[(Math.floor((Math.random()*10)+1) % colors.length)];
    $('body').css('background-color', color);
    function sticky_relocate() {
        var window_top = $(window).scrollTop();
        var div_top = $('#banner-container').offset().top;
        if (window_top > div_top) {
            $('#cbMenu').addClass('stick');
        } else {
            $('#cbMenu').removeClass('stick');
        }
    }

    $(window).scroll(sticky_relocate);
    sticky_relocate();
});
</script>
