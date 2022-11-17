<?php

require_once('../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/users/index.php'));
}
$id = $_GET['id'];
$User = User::find_by_id($id);
if($User == false) {
  redirect_to(url_for('users/index.php'));
}

if(is_post_request()) {

  // Save record using post parameters
  $args = $_POST['User'];
  $User->merge_attributes($args);
  $result = $User->save();

  if($result === true) {
    $_SESSION['message'] = 'The User was updated successfully.';
    redirect_to(url_for('users/show.php?id=' . $id));
  } else {
    // show errors
  }

} else {

  // display the form

}

?>

<?php $page_title = 'Edit User'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

  <a class="back-link" href="<?php echo url_for('/users/index.php'); ?>">&laquo; Back to List</a>

  <div class="User edit">
    <h1>Edit User</h1>

    <?php echo display_errors($user->errors); ?>

    <form action="<?php echo url_for('/users/edit.php?id=' . h(u($id))); ?>" method="post">

      <?php include('form_fields.php'); ?>
        <input type="submit" value="Edit User" />

    </form>

<?php include(SHARED_PATH . '/user_footer.php'); ?>
