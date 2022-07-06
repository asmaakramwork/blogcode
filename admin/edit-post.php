<?php
include 'partials/header.php';

//fetch categories from DB
$query="SELECT * FROM categories";
$categories=mysqli_query($connection,$query);

if(isset($_GET['id'])){

    $id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);

    //fetch post from DB

    $query="SELECT * FROM addposts WHERE id=$id";
    $result=mysqli_query($connection,$query);

    if(mysqli_num_rows($result)==1){
        $post=mysqli_fetch_assoc($result);
    }


}else{
    header('location:' .ROOT_URL. 'admin/index.php');
    die();
}
?>


    <section class="form-section">
        <div class="container form-section-container">
            <h1 class="sign-up-title">Edit Post</h1>

            <form method="POST" action="<?= ROOT_URL ?>admin/edit-post-logic.php" enctype="multipart/form-data">
               <input type="hidden" name="id" value="<?= $post['id'] ?>" >
               <input type="text" name="title" value="<?= $post['title'] ?>" placeholder="Title">


                <select name="category">
                <?php while($category = mysqli_fetch_assoc($categories)): ?>
                  <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                  <?php endwhile ?>
                </select>


                <textarea rows="10" placeholder="Body"><?= $post['body'] ?></textarea>
                
                <div class="form-control inline">
                    <input type="checkbox" id="is-published">
                   <label for="is-published" checked>Published</label>
                </div>

              <div class="form-control">
                  <label for="profilepic">Change Image</label>
                  <input type="file" id="profilepic">
              </div>
              
              <button class="btn" type="submit">Update Post</button><br>
            </form>
        </div>
    </section>

    


<?php
include '../partials/footer.php';
?>
