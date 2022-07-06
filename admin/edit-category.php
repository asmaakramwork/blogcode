<?php
include 'partials/header.php';

if(isset($_GET['id'])){

    $id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);

    //fetch category from DB

    $query="SELECT * FROM categories WHERE id=$id";
    $result=mysqli_query($connection,$query);

    if(mysqli_num_rows($result)==1){
        $category=mysqli_fetch_assoc($result);
    }


}else{
    header('location:' .ROOT_URL. 'admin/manage-category.php');
    die();
}
?>



    <section class="form-section">
        <div class="container form-section-container">
            <h1 class="sign-up-title">Edit category</h1>
         
            <form method="POST" action="<?= ROOT_URL ?>admin/edit-category-logic.php" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?= $category['id'] ?>" >
              <input type="text" name="title" value="<?= $category['title'] ?>" placeholder="Title">
              <textarea rows="5" name="description" placeholder="Description"><?= $category['description'] ?></textarea>
              
              <button class="btn" name="submit" type="submit">Update category</button><br>
            </form>
        </div>
    </section>

    

<?php
include '../partials/footer.php';
?>

