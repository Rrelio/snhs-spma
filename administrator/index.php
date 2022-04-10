<?php
    require '../php_helpers/head.php';
?>

<body>
    <?php
        require '../php_helpers/loader.php';
    ?>
    <div class="vh-100 row dashboard-background">
        <div class="col-8 d-none d-sm-none d-md-block" style="background-color: #F2F4F7;"></div>
        <div class="col-12 col-sm-12 col-md-4 bg-accent"></div>
    </div>

    <div class="vh-100 row mx-auto dashboard-board">
        <div class="col-8 d-none d-sm-none d-md-block p-0 my-3 bg-white-50">
            <div class="p-3 pe-0" style="height:100% !important;">
                <div class="row m-0 h-100">
                    <div class="col-1 p-0 h-100 d-flex flex-column justify-content-between align-items-center">
                        <div class="w-100">
                            <img src="../logo/SPMA.png" class="img-fluid p-2" alt="">
                        </div>
                        <div class="">
                            <div class="active-tab"  id="home" onclick="switchTab('dashboard', this)">
                                <img src="../images/home.png" class="img-fluid d-block my-2 p-2 pointer" alt="">
                            </div>
                            <div class=""  id="accounts" onclick="switchTab('accounts', this)">
                                <img src="../images/user.png" class="img-fluid d-block my-2 p-2 pointer" alt="">
                            </div>
                            <div class=""  id="add" onclick="switchTab('add', this)">
                                <img src="../images/user add.png" class="img-fluid d-block my-2 p-2 pointer" alt="">
                            </div>
                            <div class=""  id="credentials" onclick="switchTab('credentials', this)">
                                <img src="../images/password.png" class="img-fluid d-block my-2 p-2 pointer" alt="">
                            </div>
                            <div class=""  id="grades" onclick="switchTab('grades', this)">
                                <img src="../images/Asset 1.png"  class="img-fluid d-block my-2 p-2 pointer" alt="">
                            </div>
                            <div class=""  id="events" onclick="switchTab('events', this)">
                                <img src="../images/Calendar.png" class="img-fluid d-block my-2 p-2 pointer" alt="">
                            </div>
                            <div class=""  id="settings" onclick="switchTab('setting', this)">
                                <img src="../images/settings.png" class="img-fluid d-block my-2 p-2 pointer" alt="">
                            </div>
                        </div>
                        <div>
                            <img src="../images/md-log-out.png" onclick="logout()" class="img-fluid d-block my-2 p-2 mb-5 pointer" alt="">
                        </div>
                    </div>
                    <div class="col-11 d-flex flex-column py-1">
                            <div class="dashboard-top d-flex justify-content-between">
                                <div class="d-block">
                                    <h4 class="fw-bold text-darkish mb-0">Hello, Administrator! <span class="wave-anim">👋</span>
                                    </h4>
                                    <small class="text-black-50 test-truncate d-block">Welcome & let's manage your organization accounts.</small>
                                </div>
                                <div class="d-flex align-items-start">
                                    <div class="d-flex">
                                        <input type="text" class="form-control rounded-pill" placeholder="Search..."
                                            id="searchSubject">
                                        <button type="button" class="btn bg-white ms-3 rounded-circle form-border" id="searchButtonSubject">
                                            <i class="bi bi-search text-darkish "></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
    
                            <div class="mt-3 mx-1 flex-fill overflow-auto" id="tab-content" style="width: 100%;" onchange="">
                                
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-4 p-3 my-3 bg-white-50">
            <div class="container d-flex flex-column ps-xs-2 ps-sm-2 ps-md-3 ps-3 p-0 h-100 text-darkish overflow-auto">
                <div class="fw-bold mb-3">My Profile</div>
                <div class=" text-center flex-fill mx-2"
                    style="border-radius:25px; background-color:rgba(255,255,255,.5);">
                    <img src="" alt=""
                        class="img-fluid mx-auto d-block mt-3 border rounded-circle"
                        style="width: 35%;" id="userProfilePic">
                    <p class="fw-bold mt-2 mb-0 fs-5 text-darkerish" id="adminName">Admin Name</p>
                    <p>Administrator</p>
                </div>
                <div>
                    <div class="d-flex justify-content-between mt-2">
                        <div class="fw-bold text-darkerish fs-6 align-self-center" id="currentMonthAndYear"></div>
                        <div class="fs-4 text-dark">
                            <i class="bi bi-calendar4-week"></i>
                        </div>
                    </div>
                    <div>
                        <table class="table table-borderless mini-calendar mx-auto my-0 overflow-x-auto">
                            <thead>
                                <tr>
                                    <th class=""><small>Sun</small></th>
                                    <th><small>Mon</small></th>
                                    <th><small>Tue</small></th>
                                    <th><small>Wed</small></th>
                                    <th><small>Thu</small></th>
                                    <th><small>Fri</small></th>
                                    <th class=""><small>Sat</small></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div><small class="mini-cal-dates">1</small></div>
                                    </td>
                                    <td>
                                        <div><small class="mini-cal-dates">1</small></div>
                                    </td>
                                    <td>
                                        <div><small class="mini-cal-dates">1</small></div>
                                    </td>
                                    <td>
                                        <div><small class="mini-cal-dates">1</small></div>
                                    </td>
                                    <td>
                                        <div><small class="mini-cal-dates">1</small></div>
                                    </td>
                                    <td>
                                        <div><small class="mini-cal-dates">1</small></div>
                                    </td>
                                    <td>
                                        <div><small class="mini-cal-dates">1</small></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div style="border-top: 1px rgba(0,0,0,.25) solid;">
                    <div class="d-flex justify-content-between">
                        <datagrid></datagrid>
                        <strong class="d-block text-center text-darkerish mb-3">Upcoming Events</strong>
                        <div class="bg-white-50 mt-1 rounded-circle align-self-start px-1 pointer" onclick="getUpcomingEvents()">
                            <i class="bi bi-arrow-clockwise text-primary"></i>
                        </div>
                    </div>
                    <div class="mb-4" style="overflow: auto;" id="upcomingEvents">
                        <div class="row mx-0 mt-2">
                            <div class="col-4 d-flex align-items-center pe-0" style="border-right:5px red solid;">
                                <strong>Nov. 1</strong>
                            </div>
                            <div class="col-8 pe-0">
                                <small class="d-block text-truncate">Special (Non-working) Holiday</small>
                                <strong class="d-block text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias minus error consequuntur corporis laudantium saepe deserunt tempora! Fugiat labore, facere cupiditate deserunt recusandae necessitatibus minus praesentium obcaecati qui, animi delectus?</strong>
                            </div>
                        </div>
                        <div class="row mx-0 mt-2">
                            <div class="col-4 d-flex align-items-center pe-0" style="border-right:5px red solid;">
                                <strong>Nov. 1</strong>
                            </div>
                            <div class="col-8 pe-0">
                                <small class="d-block text-truncate">Special (Non-working) Holiday</small>
                                <strong class="d-block">All Saint's Day</strong>
                            </div>
                        </div>
                        <div class="row mx-0 mt-2">
                            <div class="col-4 d-flex align-items-center pe-0" style="border-right:5px red solid;">
                                <strong>Nov. 1</strong>
                            </div>
                            <div class="col-8 pe-0">
                                <small class="d-block text-truncate">Special (Non-working) Holiday</small>
                                <strong class="d-block">All Saint's Day</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="../js/main.js"></script>
    <script type="text/javascript" src="../js/admin.js"></script>

    <script type="text/javascript">
        window.onload = function () {
            initialTab().then(
                function(val)
                {
                    setCalendarDate();
                    resizeToOnebyOne_Width(document.querySelector("#userProfilePic"));
                    setElemHeight(document.querySelector("#tab-content"))
                },
                function(error) {
                    console.log(error);
                }
            )
        }
    </script>
</body>
<?php
    require '../php_helpers/foot.php';
?>