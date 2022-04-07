<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/buttons.css">
    <link rel="icon" href="logo/favicon.ico" />
    <title>Student Performance Monitoring Application</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-0 col-md-1 col-lg-2"></div>
            <div class="col-sm-12 col-md-10 col-lg-8">
                <div class="login-container row">
                    <div class="col-sm-12 col-lg-4 text-center d-flex align-items-center">
                        <div>
                            <img src="logo/SPMA.png" class="img-fluid px-4" alt="">
                            <h1 class="login-title mt-2 bebas-font">STUDENT PERFORMANCE MONITORING APP</h1>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-8 p-2 px-4">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <div>
                                <div class="bebas-font fs-3 text-center my-3 mt-5" id="login-account"><i
                                        class="bi bi-gear-wide-connected"></i> LOGIN</div>
                                <form class="w-75 mx-auto flex-fill">
                                    <div class="mb-3">
                                        <label for="adminEmail" class="form-label m-0"><i class="bi bi-envelope"></i> Email address</label>
                                        <input type="email" class="form-control" id="adminEmail"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3 admin-verification-container">
                                        <label for="adminVerificationCode" class="form-label m-0"><i class="bi bi-person-check"></i> Verification Code</label>
                                        <input type="text" class="form-control" id="adminVerificationCode">
                                        <small class="text-white d-block text-end"><p class="text-decoration-none text-white pointer" onclick="mailCode()">Resend code</p></small>
                                    </div>
                                    <div class="alert alert-danger p-0 px-1 fs-small" role="alert" style="visibility: hidden;" id="adminError">
                                        <small> <i class="bi bi-exclamation-triangle-fill"></i> &nbsp; <span id="adminErrorMsg"> Incorrect credentials </span></small>
                                    </div>
                                    <button type='button' class="spma-button-1 text-white w-fit px-3 mx-auto d-block" onclick="mailAdminLogin()" id="adminSubmit">Send Verification Code</button>
                                </form>
                            </div>
                            <div class="mb-3 lh-1 ">
                                <small>This page is only for the system administrator</small> <br>
                                <small>If you did not intend to be here, please click this <a href="index.php">link</a> to go
                                    back.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-0 col-md-1 col-lg-2"></div>
        </div>
    </div>
    <script src="js/main.js"></script>
    <script src="js/login.js"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

</html>