<?php
$this->load->view('includes/header');
$this->load->view('includes/sidebar');
$data = $profile[0];
?>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;

}

/* body {
    background-color: #e2e8f0;
    padding: 20px;
} */

.breadcrumb {
    background-color: #c5cee4;

}

.breadcrumb a {
    text-decoration: none;
}

.container {
    max-width: 1000px;
    padding: 0;
}

p {
    margin: 0;
}

.d-flex a {
    text-decoration: none;
    color: #686868;
}

img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
}

.fab.fa-twitter {
    color: #8ab7f1;
}

.fab.fa-instagram {
    color: #E1306C;
}

.fab.fa-facebook-f {
    color: #5999ec;
}
</style>

<div id="content" role="main" class="main">
    <div class="content container-fluid">

        <div class="col-md-5">
            <div class="row">
                <div class="col-12 bg-white p-0 px-3 py-3 mb-3">
                    <div class="d-flex flex-column align-items-center">
                        <img class="photo"
                            src=" <?php echo base_url('assets/profile/') . $data->profile_image ?>"
                            alt="">
                        <p class="fw-bold h4 mt-3"><?php echo $data->name ?></p>
                        <p class="text-muted mb-3"><?php echo $data->username ?></p>
                        <p class="text-muted">Beta Addvance Mailer</p>

                    </div>
                </div>
                <!-- <div class="col-12 bg-white p-0 px-2 pb-3 mb-3">
                        <div class="d-flex justify-content-between border-bottom py-2 px-3">
                            <p><span class="fas fa-globe me-2"></span>Website</p>
                            <a href="#">https://bootdey.com</a>
                        </div>
                        <div class="d-flex justify-content-between border-bottom py-2 px-3">
                            <p><span class="fab fa-github-alt me-2"></span>Github</p>
                            <a href="">bootdey</a>
                        </div>
                        <div class="d-flex justify-content-between border-bottom py-2 px-3">
                            <p><span class="fab fa-twitter me-2"></span>Twitter</p>
                            <a href="">@bootdey</a>
                        </div>
                        <div class="d-flex justify-content-between border-bottom py-2 px-3">
                            <p><span class="fab fa-instagram me-2"></span>Instagram</p>
                            <a href="">bootdey</a>
                        </div>
                        <div class="d-flex justify-content-between py-2 px-3">
                            <p><span class="fab fa-facebook-f me-2"></span>facebook</p>
                            <a href="">bootdey</a>
                        </div>
                    </div> -->
            </div>
        </div>
        <div class="col-md-7 ps-md-4">
            <div class="row">
                <div class="col-12 bg-white px-3 mb-3 pb-3">
                    <div class="d-flex align-items-center justify-content-between border-bottom">
                        <p class="py-2">Full Name</p>
                        <p class="py-2 text-muted"><?php echo $data->name ?></p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between border-bottom">
                        <p class="py-2">Email</p>
                        <p class="py-2 text-muted"><?php echo $data->username ?></p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between border-bottom">
                        <p class="py-2">Phone</p>
                        <p class="py-2 text-muted"><?php echo $data->contact_no ?></p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between border-bottom">
                        <p class="py-2">Mobile</p>
                        <p class="py-2 text-muted"><?php echo $data->mobile_no ?></p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="py-2">Address</p>
                        <p class="py-2 text-muted"> <?php echo $data->address ?></p>
                    </div>
                    <div class="d-flex ">
                        <button class="btn btn-primary follow me-2" onclick='openModel()' data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Edit</button>
                        <!-- <div class="btn btn-outline-primary message">Back</div> -->
                    </div>
                </div>
                <!-- <div class="col-12 bg-white px-3 pb-2">
                        <h6 class="d-flex align-items-center mb-3 fw-bold py-3"><i
                                class="text-info me-2">assignment</i>Project
                            Status</h6>
                        <small>Web Design</small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 60%"
                                aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>One Page</small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 72%"
                                aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>Mobile Template</small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 50%"
                                aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>Backend API</small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 90%"
                                aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>Website Markup</small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 80%"
                                aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div> -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Profile Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action='<?php echo base_url()?>ProfileController/update' method='post' enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" name='name' id="recipient-name" value='<?php echo $data->name ?>'>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">User Name:</label>
                        <input type="text" class="form-control" name='username' id="recipient-name">
                    </div> -->
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="recipient-name" class="col-form-label">Contact No:</label>
                            <input type="text" class="form-control" name='contactNo' id="recipient-name" value='<?php echo $data->contact_no ?>'>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="recipient-name" class="col-form-label">Mobile No:</label>
                            <input type="text" class="form-control" name='mobileNo' id="recipient-name" value='<?php echo $data->mobile_no ?>'>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Address:</label>
                        <textarea class="form-control" name='address' id="message-text"><?php echo $data->address ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Profile Image:</label>
                        <input type="file" name="images" class='form-control'  accept="image/*" id="images">
                        <input type="hidden" name="hdnImage" id='hdnImage' value="<?php echo $data->profile_image ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openModel(){
        $("#exampleModal").modal('show');
    }
</script>
