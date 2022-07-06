<?php
include 'partials/header.php';

//fetch categories from database

$query="SELECT * FROM categories ORDER BY title";
$categories=mysqli_query($connection,$query);


?>



    <section class="dashboard">


    <?php
                 if(isset($_SESSION['delete-category-success'])):
             ?>

             <div class="alert-msg error">
                <p>
                    <?= $_SESSION['delete-category-success'];
                    unset($_SESSION['delete-category-success']); 
                    ?>
               </p>
               
             </div>

             <?php endif ?>

        <div class="container dashboard-container">
            <aside>
                <ul>
                   <li>
                      <a href="add-post.php"><i class="uil uil-pen"></i>
                        <h3 class="post-title">Add Post</h3></a>
                   </li>
                   <li>
                    <a href="index.php"><i class="uil uil-pen"></i>
                      <h3 class="post-title">Manage Post</h3></a>
                 </li>

                 
                    
                 <li>
                    <a href="add-category.php"><i class="uil uil-pen"></i>
                      <h3 class="post-title">Add category</h3></a>
                 </li>
                 <li>
                    <a href="manage-category.php"><i class="uil uil-pen"></i>
                      <h3 class="post-title">Manage Category</h3></a>
                 </li>
                 
                 
                </ul>
            </aside>

            <main>
                <h2 class="post-title">Manage Category</h2>
             <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>


                
                <?php if(mysqli_num_rows($categories)>0) :?>

                <tbody>


                <?php while($category=mysqli_fetch_assoc($categories)) :?>
                    <tr>
                        <td><?= $category['title']?></td>
                        <td><a href="<?= ROOT_URL ?>admin/edit-category.php ? id=<?= $category['id']?>" class="btn sm">Edit</a></td>
                        <td><a href="<?= ROOT_URL ?>admin/delete-category.php ? id=<?= $category['id']?>"  class="btn sm danger">Delete</a></td>
                    </tr>

                <?php endwhile ?>    
                  
                </tbody>
             </table>

                <?php else: ?>
                    <div class="alert-msg error">
                        <?= "No categories found"?>
                    </div>

                <?php endif ?>   

            </main>
        </div>
    </section>


<?php
include '../partials/footer.php';
?>
