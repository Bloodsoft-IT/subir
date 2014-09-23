<?php
include_once("constants.php");

$home = Constants::getHome();
?>
<link href="css/banner.css" rel="stylesheet" />
<div id="banner-container">
    <div id="banner"></div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#banner').click(function() {
        window.location = "<?php print $home ?>";
    });
});
</script>
