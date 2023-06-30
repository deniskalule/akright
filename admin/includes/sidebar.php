<aside class="sidebar shadow bg-light">
    <div class="header text-center">
        <img src="assets/images/akrightlogo.png" width="80" alt="">
        <h5 class="text-center">Akright Estate</h5>
        <hr>
    </div>


    <ul class="sidebar-links">
        <li class="mb-4"><a href="dashboard.php" class="active">
            <i class="fas fa-home    "></i>
            <span>Dashboard</span>
        </a></li>
        <li class="mb-4"><a href="#add-category" data-toggle="modal">
            <i class="fas fa-home    "></i>
            <span>Category</span>
        </a></li>
        <li class="mb-4"><a href="property.php">
            <i class="fas fa-home    "></i>
            <span>Property</span>
        </a></li>
        <li class="mb-4"><a href="clients.php">
            <i class="fas fa-users    "></i>
            <span>Clients</span>
        </a></li>
        <li class="mb-4"><a href="rented.php">
            <i class="fas fa-money-bill    "></i>
            <span>Rented</span>
        </a></li>
        <li class="mb-4"><a href="bought.php">
            <i class="fas fa-money-bill-wave    "></i>
            <span>Bought</span>
        </a></li>
    </ul>    

</aside>

<!-- Modal -->
<div class="modal fade" id="add-category" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Category</h5>
                <a href="category.php" class="btn btn-sm text-white ml-5" style="background-color:  #2a3801;">View category</a>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="./backend/addCategory.php" method="post" class="form">
                    <div class="form-group">
                      <label for="">Category Name: </label>
                      <input type="text" name="category" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" name="add" class="btn btn-sm text-white" style="background-color:  #2a3801;">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>