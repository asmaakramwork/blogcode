<?php
include 'partials/header.php';
//get back form data if invalid
$title = $_SESSION['add-post-data']['title'] ?? null;
$body = $_SESSION['add-post-data']['body'] ?? null;


//delete session
unset($_SESSION['add-post-data']);

//fetch categories from DB
$query="SELECT * FROM categories";
$categories=mysqli_query($connection,$query);

?>



    <section class="form-section">
        <div class="container form-section-container">
            <h1 class="sign-up-title">Add Post</h1>



            <?php
                 if(isset($_SESSION['add-post'])):
             ?>

             <div class="alert-msg error">
                <p>
                    <?= $_SESSION['add-post'];
                    unset($_SESSION['add-post']); 
                    ?>
               </p>
               
             </div>

             <?php endif ?>


         
            <form method="POST" action="<?= ROOT_URL ?>admin/add-post-logic.php" enctype="multipart/form-data">
                <input type="text" name="title" value="<?= $title?>" placeholder="Title">
                <select name="category">


                  <?php while($category = mysqli_fetch_assoc($categories)): ?>
                  <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                  <?php endwhile ?>


                </select>
                <textarea rows="10" name="body" value="<?= $body ?>" placeholder="Body"></textarea>



                <div class="form-control inline">
                    <input type="checkbox" name="published" value="1" id="is-published" checked>
                    <label for="is-published">Published</label>
                </div>

                <div class="form-control">
                  <label for="profilepic">Change Image</label>
                  <input type="file" name="image" id="profilepic">
              </div>
              
              
              <button class="btn" name="submit" type="submit">Add Post</button><br>
            </form>
        </div>
    </section>

    

<?php
include '../partials/footer.php';
?>

