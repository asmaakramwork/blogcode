<?php

   include 'partials/header.php';
 ?> 
    <section class="search-bar">
        <form class="container search-bar-container" action="">
            <div>
                <i class="uil uil-search"></i>
                <input type="search" name="" placeholder="Search">
                <button type="button" class="btn">Search</button>
            </div>
            
        </form>
    </section>



    <section class="posts">
        <div class="container posts-container">
          <article class="post">
            <div class="post-thumbnail">
                <img src="image\download (1).jpeg" alt="">
            </div>

            <div class="post-info">
                <a href="category-posts.php" class="category-btn">Travel</a>
                <h2 class="post-title">
                    <a href="post.php">El Camino de Santiago ~ Pamplona-Logroño</a>
                </h2>
                <p class="post-body">  directions or other details</p> 
                
                <div class="post-author">
                    <div class="author-pic">
                        <img src="image\download.jpeg" alt="">
                    </div>
                    <div class="author-info">
                        <h5 class="author-name">By:Asma</h5>
                        <small>June 10,2022 5:30</small>
                    </div>
                </div>
            </div> 
          </article>      
   
        </div>
    </section>



    <section class="category-btns">
        <div class="container category-btns-container sm">
        <?php
           $all_category_query = "SELECT * FROM categories";
           $all_categories = mysqli_query($connection,$all_category_query);
            ?> 
            <?php while($category = mysqli_fetch_assoc($all_categories)) : ?>
            <a href="category-posts.php" class="category-btn"><?= $category['title'] ?></a>
            <?php endwhile ?>
        </div>
    </section>


<?php
   include 'partials/footer.php';
 ?> 