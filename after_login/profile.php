<div class="container" style="margin-top: 100px;">
  <div class="main-body">

    <div class="row gutters-sm">
      <div class="col-md-12">
        <div class="card mb-3" style="background-color: antiquewhite;">
          <!-- profile details only is me kuch add mat karna -->
          <h3 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2"
              style="margin-top: 20px;">PROFILE</i></h3>
          <div class="card-body col-md-8">
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Full Name</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php 
                            echo $user['name'];
                        ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php 
                            echo $user['email'];
                        ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Course</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php 
                            echo $user['stream'];
                        ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Branch</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php 
                            echo $user['branch'];
                        ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row gutters-sm">
      <div class="col-md-12">
        <div class="card mb-3" style="background-color: antiquewhite; ">
          <h3 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2"
              style="margin-top: 20px;">Docoment summary</i></h3>
          <div class="card-body col-md-8" style=" padding-bottom: 0%;">
            <div class="row">
              <div class="col-sm-4">
                <h6 class="mb-0">Total Documents Uploads</h6>
              </div>
              <div class="col-sm-7 text-secondary">
                <?php 
                          echo $user['total_uploads'];
                      ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Total like</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php 
                          echo $user['total_likes'];
                      ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Total views</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php 
                          echo $user['total_views'];
                      ?>
              </div>
            </div>
            <hr>
          </div>
          <h3 class="d-flex align-items-center mb-12"><i class="material-icons text-info mr-2 fas fa-book-open" style=" margin-top: 0%; padding-bottom: 20px;">&nbsp; Thanks for using NOTES HUB &nbsp; <i class="fas fa-book-open"></i>  </i></h3>
        </div>
      </div>
    </div>
  </div>
</div>