<?php
include 'partials/header.php';

//get back form data if invalid
$title = $_SESSION['add-category-data']['title'] ?? null;
$description = $_SESSION['add-category-data']['description'] ?? null;

//delete session
unset($_SESSION['add-category-data']);
?>


    <section class="form-section">
        <div class="container form-section-container">
            <h1 class="sign-up-title">Add Category</h1>

            <?php
                 if(isset($_SESSION['add-category'])):
             ?>
             <div class="alert-msg error">
                <p>
                    <?= $_SESSION['add-category'];
                    unset($_SESSION['add-category']); 
                    ?>
               </p>   
             </div>

             <?php endif ?>
            <form method="POST" action="<?= ROOT_URL ?>admin/add-category-logic.php" enctype="multipart/form-data" >
              <input type="text" name="title" value="<?= $title?>" placeholder="Title">
              <textarea rows="5" name="description" value="<?= $description ?>" placeholder="Description"></textarea>
              
              <button class="btn" name="submit" type="submit">Add category</button><br>
            </form>
        </div>
    </section>

    


<?php
include '../partials/footer.php';
?>
