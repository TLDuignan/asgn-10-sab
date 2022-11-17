<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/Users/index.php'));
}
$id = $_GET['id'];
$User = User::find_by_id($id);
if($User == false) {
  redirect_to(url_for('/staff/Users/index.php'));
}

if(is_post_request()) {

  // Delete User
  $result = $User->delete();
  $_SESSION['message'] = 'The User was deleted successfully.';
  redirect_to(url_for('/staff/Users/index.php'));

} else {
  // Display form
}

?>

<?php $page_title = 'Delete User'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/Users/index.php'); ?>">&laquo; Back to List</a>

  <div class="User delete">
    <h1>Delete User</h1>
    <p>Are you sure you want to delete this User?</p>
    <p class="item"><?php echo h($User->full_name()); ?></p>

    <form action="<?php echo url_for('/staff/Users/delete.php?id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete User" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
