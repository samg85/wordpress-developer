<?php
/**
* @package SimonPlugin
*/
/*
Plugin Name: Simon Plugin
Plugin URI:
Description: Plugin for developer test.
Version: 1.0.0
Author: Simon Martinez
*/

function plugin_scripts_load() {
    wp_enqueue_script(
        'simon-plugin',
        plugin_dir_url(__FILE__) . 'simon-plugin.js',
        array('jquery')
    );
}

add_action('wp_enqueue_scripts', 'plugin_scripts_load');

function html_register_code() {
    echo '
    <style type="text/css">
    #regiration_form fieldset:not(:first-of-type) {
        display: none;
    }
  </style>
    <div class="col-md-6 offset-md-3">
        <div class="alert alert-success" style="display: none">
            <strong>Success!</strong> User created.
        </div>
        <div class="alert alert-danger" style="display: none">
            <strong>Failed!</strong> This user already exist.
        </div>
        <form id="regiration_form" action="" action=""  method="post">
            <input type="hidden" name="action" value="user_reg" />
            <fieldset>
                <h2>First Step</h2>
                <div class="form-group">
                    <label for="fName">First Name</label>
                    <input type="text" class="form-control" name="fName" id="fName" pattern="[a-zA-Z0-9 ]+" placeholder="First Name" required>
                </div>
                <div class="form-group">
                    <label for="lName">Last Name</label>
                    <input type="text" class="form-control" name="lName" id="lName" placeholder="Last Name" required>
                </div>
                <label for="Gender">Gender</label> </br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Gender" id="Gender1" value="male" required>
                    <label class="form-check-label" for="Gender1">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Gender" id="Gender2" value="female" required>
                    <label class="form-check-label" for="Gender2">Female</label>
                </div>
                <div class="form-group">
                    <label for="Bdate">Birth date</label>
                    <input type="date" class="form-control" name="Bdate" id="Bdate" placeholder="Enter your birth date" required>
                </div>
                <input type="button" name="next" class="next btn btn-secondary" value="Next" />
            </fieldset>
            <fieldset>
                <h2>Second Step</h2>
                <div class="form-group">
                    <label for="City">City</label>
                    <input type="text" class="form-control" name="City" id="City" pattern="[a-zA-Z0-9 ]+" placeholder="City" required>
                </div>
                <div class="form-group">
                    <label for="Pnumber">Telephone</label>
                    <input class="form-control" type="text" pattern="\d*" name="Pnumber" id="Pnumber" placeholder="Telephone">             
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea  class="form-control" name="address" placeholder="Address"></textarea>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" name="Password" id="Password" placeholder="Password" required>
                </div>
                
                <input type="button" name="previous" id="goback" class="previous btn btn-secondary" value="Previous" />
                <input type="submit" name="submit" id="submit" class="submit btn btn-dark" value="Submit" />
            </fieldset>
        </form>
    <div>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
    
       
    $(\'#regiration_form\').submit(function (e) {
        e.preventDefault(); // Prevent the default form submit
        var data = $(this); // Cache this
        $.ajax({
          url: \''.admin_url("admin-ajax.php").'\', 
          type: \'post\',
          dataType: \'JSON\', 
          data: data.serialize(), 
          beforeSend: function () {
            is_sending = true;
            // You could do an animation here...
          },
          success: function (data) {
              console.log(data.status);
              if(data.status == \'sucess\'){
                $(".alert-success").show();
                $(\'#regiration_form\').trigger("reset");
                $(\'#goback\').click();
              }else{
                $(".alert-danger").show();
              }
          }
        });
    });
});
    </script>
    ';
    
}



function sform_shortcode() {
    ob_start();
    html_register_code();

    return ob_get_clean();
}

add_shortcode( 'simon_register_form', 'sform_shortcode' );


function sendContactFormToSiteAdmin () {
    
    if(isset($_POST['fName'])){
        
        $fname = $_POST['fName'];
        $lname = $_POST['lName'];
        $gender = $_POST['Gender'];
        $bday = $_POST['Bdate'];
        $city = $_POST['City'];
        $phone = $_POST['Pnumber'];
        $adress = $_POST['adress'];
        $email = $_POST['email'];
        $pass = $_POST['Password'];

        $user_check = get_user_by( 'email', $email );
        if($user_check){
            echo json_encode(array('status' => 'error', 'message' => 'this user exist'));
            exit;
        }

        $userdata = array(
            'user_login'    =>   $email,
            'user_email'    =>   $email,
            'user_pass'     =>   $pass,
            'first_name'    =>   $fname,
            'last_name'     =>   $lname,
            'nickname'      =>   $fname.$lname
            );

        $user = wp_insert_user( $userdata );
        $new_user = get_user_by( 'email', $email );

        $metas = array( 
            'phone'     => $phone,
            'adress'    => $adress, 
            'city'      => $city ,
            'bday'      => $bday ,
            'gender'    => $gender
        );
        
        foreach($metas as $key => $value) {
            update_user_meta( $new_user->ID, $key, $value );
        }
    
      echo json_encode(array('status' => 'sucess', 'message' => 'user created'));
      exit;
    }

  }
  add_action("wp_ajax_user_reg", "sendContactFormToSiteAdmin");
  add_action("wp_ajax_nopriv_user_reg", "sendContactFormToSiteAdmin");


?>