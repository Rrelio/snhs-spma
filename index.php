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
                        <a href="https://www.facebook.com/trixie.pangilinan.1671" target="_blank"
                            class="text-end d-block" style="color: white; text-decoration:none;"><small>Need
                                help?</small></a>
                        <div class="bebas-font fs-3 text-center my-3 mt-5" id="login-account">CHOOSE AN ACCOUNT:</div>
                        <div class="mx-5 text-uppercase">

                            <!-- CHOOSE WHO TO LOGIN -->
                            <div id="userSelection" style="display:block;">
                                <div class="row login-option py-2 mb-4" id="teacher" onclick="gotoLogin(this)">
                                    <div class="col d-flex align-items-center flex-row-reverse">
                                        <div class="border rounded-circle bg-white">
                                            <img src="images/teacher-at-the-blackboard.png"
                                                class="login-option-icon p-2" alt="">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <p class="bebas-font fs-2 m-0 lh-1">TEACHER</p>
                                        <p class="m-0 arial-font lh-sm"><small>For class advisers, Subject, teachers,
                                                Admin</small></p>
                                    </div>
                                </div>
                                <div class="row login-option py-2 mb-4" id="parent" onclick="gotoLogin(this)">
                                    <div class="col d-flex align-items-center flex-row-reverse">
                                        <div class="border rounded-circle bg-white">
                                            <img src="images/family.png" class="login-option-icon p-2" alt="">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <p class="bebas-font fs-2 m-0 lh-1">PARENT</p>
                                        <p class="m-0 arial-font lh-sm"><small>For parents or guardians</small></p>
                                    </div>
                                </div>
                                <div class="row login-option py-2 mb-4" id="student" onclick="gotoLogin(this)">
                                    <div class="col d-flex align-items-center flex-row-reverse">
                                        <div class="border rounded-circle bg-white">
                                            <img src="images/reading-book.png" class="login-option-icon p-2" alt="">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <p class="bebas-font fs-2 m-0 lh-1">STUDENT</p>
                                        <p class="m-0 arial-font lh-sm"><small>For Junior and Senior high school
                                                student</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- LOGIN PANEL -->
                        <div id="userLogin" style="display: none;">
                            <form class="container px-5">
                                <div class="mb-3">
                                    <label for="userName" class="form-label" id="userNameLabel">Username</label>
                                    <input type="text" class="form-control mx-1" id="userName"
                                        aria-describedby="emailHelp">
                                </div>
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <i class="bi bi-eye-fill" style="font-size: 16pt; cursor:pointer;"
                                            onclick="passwordToggle(document.querySelector('#userPassword'), this)" id="passwordToggler"></i>
                                    </div>
                                    <input type="password" class="form-control mx-1" id="userPassword">
                                </div>
                                <div class="d-flex justify-content-end">
                                    <small class="me-0 ms-auto mb-3 p-1 pointer text-white text-decoration-underline"
                                        data-bs-toggle="modal" data-bs-target="#requestResetModal">Request to reset
                                        password</small>
                                </div>
                                <div class="alert alert-danger p-1 border-danger" role="alert" id="loginErrorHandler"
                                    style="visibility: hidden;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                        class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16"
                                        role="img" aria-label="Warning:">
                                        <path
                                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                    </svg>
                                    <small id="loginErrorHandlerText">Incorrect user credentials</small>
                                </div>
                                <div class="d-flex mt-4">
                                    <div class="spma-button-1-blue text-white"
                                        style="width: 20%; border-radius:20px 0 0 20px;" onclick="gotoSelect()"><i
                                            class="bi bi-caret-left-fill flex-shrink-1"></i></div>
                                    <div class="spma-button-1 text-white flex-grow-1"
                                        style="border-radius:0 20px 20px 0;" onclick="getUserCredentials()">Login</div>
                                </div>
                            </form>

                            <!-- Password Reset Modal -->
                            <div class="modal fade" id="requestResetModal" tabindex="-1"
                                aria-labelledby="requestResetModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header borderless">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body pt-0">
                                            <h5 class="modal-title fw-bold d-block text-center" id="exampleModalLabel">
                                                REQUEST TO RESET PASSWORD</h5>
                                                <div id="requestResetContent">
                                                    <form class="container mt-3">
                                                        <div class="">
                                                            <label for="passRequestUserName" class="form-label" id="passRequestUserNameLabel">Username</label>
                                                            <input type="text" class="form-control mx-1"
                                                                id="passRequestUserName">
                                                        </div>
                                                        <div class="alert alert-danger p-1 my-2 mx-4 border-danger" role="alert" id="passRequestError"
                                                            style="visibility:hidden;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                fill="currentColor"
                                                                class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2"
                                                                viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                                                <path
                                                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                            </svg>
                                                            <small>User credential not found</small>
                                                        </div>
                                                    </form>
                                                </div>
                                        </div>
                                        <div class="modal-footer borderless">
                                            <button class="spma-button-1 text-white w-50" onclick="requestPasswordReset()" id="passRequestButton">Request Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- First Login Modal -->
                            <div class="modal fade" id="firstLoginModal" tabindex="-1"
                                aria-labelledby="firstLoginModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header borderless">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body pt-0">
                                            <h5 class="modal-title fw-bold d-block text-center" id="exampleModalLabel">
                                                FIRST LOG IN</h5>
                                            <form class="container mt-3">
                                                <div>
                                                    <div class="d-flex justify-content-between">
                                                        <label for="initUserPassword"
                                                            class="form-label">Password</label>
                                                        <i class="bi bi-eye-fill"
                                                            style="font-size: 16pt; cursor:pointer;"
                                                            onclick="passwordToggle(document.querySelector('#initUserPassword'), this)"></i>
                                                    </div>
                                                    <input type="password" class="form-control mx-1"
                                                        id="initUserPassword">

                                                    <label for="initUserPasswordConfirm" class="form-label mt-4">Confirm
                                                        Password</label>
                                                    <input type="password" class="form-control mx-1"
                                                        id="initUserPasswordConfirm">
                                                </div>
                                                <div class="alert alert-danger p-1 my-2 mx-1 border-danger" role="alert"
                                                    style="visibility:hidden;" id="initPassError">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="currentColor"
                                                        class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2"
                                                        viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                                        <path
                                                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                    </svg>
                                                    <small id="initPassErrorMsg">Password error</small>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer borderless">
                                            <button class="spma-button-1 text-white w-50" onclick="setInitialPassword()">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
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
    <script type="text/javascript">
        window.onload = ()=>
        {
            sessionStorage.loggedIn = false;
        }
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

</html>