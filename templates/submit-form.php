<?php
global $wp_query;
get_header();
$url =  isset($_SERVER['HTTPS']) && 
$_SERVER['HTTPS'] === 'on' ? "https://" : "http://";   

$url .= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];  
$competition_slug = basename(dirname($url));
$competition = get_posts([
    'name'      => $competition_slug,
    'post_type' => 'competition'
]);
$competition_obj = $competition[0];
?>
<div id="content" class="site-content">
<form method='post' id='entry-form'>
<h1>Submit form for <?php echo $competition_obj->post_title; ?></h1>
            <label><b>First Name</b></label>
         <br/>
          <input type="text" placeholder="Enter Your First Name" name="first_name" 
required class="first_name">
<label><b>Last Name</b></label>
<br/>
          <input type="text" placeholder="Enter Your Last Name" name="last_name" 
required class="last_name">
<label><b>Email</b></label>
         <br/>
         <input type="email" placeholder="Enter your Email" name="email" 
required class="email">
<label><b>Phone</b></label>
<br/>
         <input type="text" placeholder="Enter your Phone" name="phone" 
required class="phone">
<label><b>Description</b></label>
         <br/>
          <input type="textarea" style=" min-width:500px; max-width:100%;min-height:50px;height:100%;width:100%;" placeholder="Description" name="description"  class="description"><hr>
<input type="hidden" placeholder="Enter your Phone" name="competition_id" 
 class="competition_id" value="<?php echo $competition[0]->ID; ?>">
            <input type='submit' />
        </form>
        <div class="msg" style="display:none;"><br /><b>Hi <span id="displayName"><span></b></div>
</div>
        <?php
get_footer();