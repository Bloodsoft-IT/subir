<?php
include_once("constants.php");
$home = Constants::getHome();
?>
<link href="css/small-banner.css" rel="stylesheet" />


<div id="banner-container">
    <div id="banner">
		<div class="ui inverted menu">
			<a id="logo" class="header item"></a>

			<a class="item link_page" id="prof_feed"><i class="user icon"></i> Profile</a>
			<a class="item"><i class="home icon"></i> Home</a>

			<div class="ui dropdown item">
			<i class="users icon"></i><i class="dropdown icon"></i>
				<div class="menu">
					<a class="item"><i class="edit icon"></i> Friends</a>
					<a class="item" id="add"><i class="add icon"></i> Add Friend</a>
					<a class="item"><i class="setting icon"></i> Friend Requests</a>
				</div>
			</div>

			<a class="item"><i class="settings icon"></i></a>

			<div class="right menu">
				<div class="item">
					<div class="ui icon input">
					<input placeholder="Search..." type="text">
					<i class="search link icon"></i>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>

<div id="profile_data"></div>



<!-- get email id modal start here -->
<div id="mymodal" class="ui small modal">
  <i class="close icon"></i>
  <div class="content">
	<div class="ui form">
	  <div class="fields">
	    <div class="twelve wide field">
	      <input type="email" placeholder="Email id..." id = "email_id">
	    </div>
	    <div class="four wide field">
	      <div class="ui blue submit button" id = "add_friend">Add friend</div>
	    </div>
	  </div>
	</div>
  </div>
</div><!-- get email id modal end here -->



<!-- Confirmation modal start here -->
<div id="confirm_modal" class="ui small modal">
  <div class="content">
	<div class="ui form">
	  <h3>Friend Request Sent...</h3>
	  <p>Your friend request has been sent to the specified email ID.
	  You will see this id with your friend's list.When your friend request has been accepted.</p>
	</div>
  </div>
</div><!-- Confirmation modal end here -->

<br/>


<script type="text/javascript">

$(document).ready(function() {

	function IsEmail(email) {
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		return regex.test(email);
	}

	$('.ui.dropdown').dropdown({on:'hover'});

	$('#add_friend').click(function(){
		
		var email_id = $('#email_id').val();

		if(email_id == ''){
			alert('Email field is required');
		}else if(IsEmail(email_id) == false){
			alert('Email address is not valid');
		}else{
			
			$('#confirm_modal').modal('show').delay(5000).fadeOut(function(){
				$('#mymodal').modal('hide');
			});

			// ajax request to add-friend.php
			$.post('add-friend.php', {email_id:email_id}, function(data){
				
			});
		}
	});


	$('#prof_feed').click(function(){
		$('#profile_data').load('profile.php');
	});

	
	$('#add').click(function(){
		$('#mymodal').modal('show');
	})
	
	$('a.item').click(function(){
		$('.item').removeClass('active');
		$(this).addClass('active');
	});


    //$('#banner').click(function() {
        //window.location = "<?php print $home ?>";
    //});
});
</script>
