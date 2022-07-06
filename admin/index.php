<?php
include 'partials/header.php';

//fetch posts from database

$query="SELECT * FROM addposts ORDER BY title";
$addposts=mysqli_query($connection,$query);

?>


    <section class="dashboard">
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
                <h2 class="post-title">Manage Post</h2>
             <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>


                <?php if(mysqli_num_rows($addposts)>0) :?>
                <tbody>

                <?php while($posts=mysqli_fetch_assoc($addposts)) :?>
                    <tr>
                        <td><?= $posts['title']?></td>
                        <td>Travel</td>
                        <td><a href="<?= ROOT_URL ?>admin/edit-post.php ? id=<?= $posts['id']?>" class="btn sm">Edit</a></td>
                        <td><a href="<?= ROOT_URL ?>admin/delete-post.php ? id=<?= $posts['id']?>" class="btn sm danger">Delete</a></td>
                    </tr>
                <?php endwhile ?> 

                   
                </tbody>
             </table>


             <?php else: ?>
                    <div class="alert-msg error">
                        <?= "No posts found"?>
                    </div>

                <?php endif ?>  
            </main>
        </div>
    </section>


<?php
include '../partials/footer.php';
?>
