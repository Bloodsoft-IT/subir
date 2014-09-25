<style type="text/css">
  .content_view{
    margin-top:-20px;
    border:none;
  }

  #cs{
    text-align: center;
    margin-top:20px;
  }

  .bar {
    height: 18px;
    background: green;
}
</style>

<?php include('script-includes.php');?>

    <div class="ui menu demo menu">
      <a class="active item link_page" data-tab="me"><i class="home icon"></i> Me</a>
      <a class="item" data-tab="credentials"><i class="mail icon"></i> Credentials</a>
      <a class="item" data-tab="kids"><i class="user icon"></i> Kids</a>
    </div>

  <div class="content_view">
  <!-- Me Section start here -->
  <div class="ui active tab segment" data-tab="me">
    <div class="ui grid">
      <div class="row">
        <div class="two wide column"></div>
        <div class="twelve wide column">
          <div class="ui grid">
            <div class="row">
              <div class="four wide column">
                <img class="rounded ui image" src="media/images/background1.jpg">
              </div>
              <div class="twelve wide column">
                
                <div class="ui form segment">

                  <div class="two fields">
                    
                    <div class="field">
                      <label>Upload profile picture</label>
                      <label for="file" class="ui icon button">
                      <i class="add icon"></i>Select file
                      </label>
                      <input type="file" id="file" name="files[]" style="display:none;" multiple>
                    </div>

                    <div class="field">
                      <div id="progress" class="ui successful progress" style="margin-top:25px;">
                        <div class="bar" style="width:100%"></div>
                      </div>
                    </div>

                  </div>

                  <div class="field">
                    <label class="cblabel">Full Name</label>
                    <div class="ui large fluid icon input">
                        <input placeholder="Full Name" type="text">
                        <i class="android icon"></i> 
                    </div>
                  </div>
                  
                  <div class="field">
                    <label class="cblabel">I am a</label>
                    <div class="ui fluid selection dropdown">
                    <input name="gender" type="hidden">
                        <div class="default text" style="text-align:left;">Gender</div>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <div class="item"><i class="male icon"></i> Male</div>
                            <div class="item"><i class="female icon"></i> Female</div>
                        </div>
                    </div>
                  </div>

                  <div class="field">
                    <label>Birth Date</label>
                    <span class="ui green label">September</span>
                    <span class="ui purple circular label">12</span>
                    <span class="ui green label">1927</span>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="two wide column"></div>
      </div>
    </div>
  </div><!-- Me Section end here -->

  <!-- Credentials Section start here -->
  <div class="ui tab segment" data-tab="credentials">

  <div class="ui grid">
  <div class="row">
  <div class="two wide column"></div>

  <div class="twelve wide column">
  <div class="ui two column middle aligned relaxed grid basic segment">
    
    <div class="column">
      <div class="ui form segment">
        <div class="field">
            <label class="cblabel">Email</label>
            <div class="ui large fluid icon input">
                <input placeholder="Email" type="email">
                <i class="user icon"></i>
            </div>
        </div>

        <div class="field">
          <label class="cblabel">Password</label>
          <div class="ui large fluid icon input">
              <input placeholder = "Password" type="password">
              <i class="lock icon"></i>
          </div>
        </div>
      </div>
    </div>

    <div class="ui vertical divider">Or</div>

    <div class="column" style="margin-top:-17px;">
      <div class="ui form segment">
        <div class="field">
            <label class="cblabel">Password</label>
          <div class="ui large fluid icon input">
              <input placeholder = "Password" type="password">
              <i class="lock icon"></i>
          </div>
        </div>

        <div class="field">
          <label class="cblabel">New Password</label>
          <div class="ui large fluid icon input">
              <input placeholder = "Password" type="password">
              <i class="lock icon"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="cs">
  <div class="ui buttons">
    <div class="ui button">Cancel</div>
    <div class="or"></div>
    <div class="ui positive button">Save</div>
  </div>
  </div>

  </div>

  <div class="two wide column"></div>
  </div>
  </div>

  </div><!-- Credentials Section start here -->

  <!-- kids Section start here -->
  <div class="ui tab segment" data-tab="kids" ng-app="KIDS">
    <div class="ui grid">
      <div class="row">
        <div class="two wide column"></div>

        <script type="text/javascript">
          
        angular.module('KIDS',[])
        .controller('kidsCtrl', function($scope,$http){
          $http.get("json/data.json").success(function(data){
            $scope.kids = data;
            console.log(data);
          });
        }); 
    

        </script>

        <div class="twelve wide column" ng-controller="kidsCtrl">
          <div class="ui grid">
            <div class="row" ng-repeat="kid in kids"> 

              <div class="four wide column">
                <img class="rounded ui image" ng-src="{{ kid.image }}">
              </div>
              <div class="twelve wide column">
                
                <div class="ui form">

                  <div class="field">
                    <label class="cblabel">Full Name</label>
                    <div class="ui large fluid icon input">
                        <input placeholder="Full Name" type="text" value="{{ kid.name }}">
                        <i class="android icon"></i> 
                    </div>
                  </div>

                  <div class="field">
                    <label>Birth Date</label>
                    <span class="ui green label">{{ kid.dob }}</span>
                    <!-- <span class="ui purple circular label">12</span>
                    <span class="ui green label">1927</span> -->
                  </div>
                  
                  <!--
                  <div class="field">
                    <label class="cblabel">I am a</label>
                    <div class="ui fluid selection dropdown">
                    <input name="gender" type="hidden">
                        <div class="default text" style="text-align:left;">Gender</div>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <div data-value="{{kid.id}}" class="item" ng-click="select(kid)">{{ kid.gender }}</div>
                        </div>
                    </div>
                  </div>
                  -->

                  <div class="ui selection dropdown ">
                  <input name="id" type="hidden" value="0"/>
                  <div class="text">Gender</div>  <i class="dropdown icon"></i> 
                    <div class="menu transition hidden">
                      <div class="item active">-- Pick A Container --</div>
                      <div class="item">{{kid.gender.male}}</div>
                      <div class="item">{{kid.gender.female}}</div>
                    </div>
                  </div>

                  <div class="ui horizontal icon divider">
                    <i class="circular heart icon"></i>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="two wide column"></div>
      </div>
    </div>
  </div><!-- kids Section end here -->

  </div>



<script type="text/javascript">
  $( document ).ready(function() {
    $('.demo.menu .item').tab();
    $('.ui.selection.dropdown').dropdown(); 
  });
</script>