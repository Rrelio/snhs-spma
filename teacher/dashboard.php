<div class="d-flex flex-column" style="height: 100%;">
    <div class="bg-white container border p-3 d-flex flex-column justify-content-between" style="border-radius: 25px;">
        <div class="d-flex justify-content-between">
            <div>
                <h5 class="fw-bold text-darkish">Activity History</h5>
                <small class="text-black-50 d-block">Your students have completed <span class="activity-percent"> 60%
                    </span> of their weekly activities</small>
            </div>
            <select class="form-select align-self-start " style="width: auto;" aria-label="Default select example">
                <option selected value="0">Section A</option>
                <option value="1">Section B</option>
                <option value="2">Section C</option>
                <option value="3">Section D</option>
            </select>
        </div>

        <div class="circle-wrap mt-3 circle-container" id="assignment-circle">
            <div class="circle">
                <div class="mask half">
                    <div class="fill">
                    </div>
                </div>
                <div class="mask full">
                    <div class="fill"></div>
                </div>
            </div>
            <div class="rounded-circle p-2" style="position: relative; height:100%; width:auto; z-index:100;">
                <div class="w-100 h-100 bg-white rounded-circle d-flex">
                    <div class="circle-wrap align-self-center" id="activity-circle">
                        <div class="circle">
                            <div class="mask half">
                                <div class="fill">
                                </div>
                            </div>
                            <div class="mask full">
                                <div class="fill"></div>
                            </div>
                        </div>
                        <div class="rounded-circle p-2"
                            style="position: relative; height:100%; width:auto; z-index:100;">
                            <div class="w-100 h-100 bg-white rounded-circle d-flex">
                                <div class="circle-wrap align-self-center" id="performance-circle">
                                    <div class="circle">
                                        <div class="mask half">
                                            <div class="fill">
                                            </div>
                                        </div>
                                        <div class="mask full">
                                            <div class="fill"></div>
                                        </div>
                                    </div>
                                    <div class="rounded-circle p-2"
                                        style="position: relative; height:100%; width:auto; z-index:100;">
                                        <div class="w-100 h-100 bg-white rounded-circle d-flex">
                                            <div class="circle-wrap align-self-center" id="other-circle">
                                                <div class="circle">
                                                    <div class="mask half">
                                                        <div class="fill">
                                                        </div>
                                                    </div>
                                                    <div class="mask full">
                                                        <div class="fill"></div>
                                                    </div>
                                                </div>
                                                <div class="rounded-circle p-2"
                                                    style="position: relative; height:100%; width:auto; z-index:100; ">
                                                    <div
                                                        class="w-100 h-100 bg-white rounded-circle d-flex justify-content-center align-items-center">
                                                        <div class="w-100 h-100 rounded-circle"
                                                            style="background-color: rgba(var(--accent-color), .1 );">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center" id="percentage">
                    <h3 class="m-0">60%</h3>
                </div>
            </div>
        </div>

        <div class="d-block d-flex justify-content-around mt-3">
            <small class="text-black-50"><span style="color: #2E9BB4;">▉</span> Assignment</small>
            <small class="text-black-50"><span style="color: #FF7543;">▉</span> Quiz</small>
            <small class="text-black-50"><span style="color: #88CCE1;">▉</span> Performance Task</small>
            <small class="text-black-50"><span style="color: #FFBB61;">▉</span> Other</small>
        </div>
    </div>
    <div class="flex-fill d-flex flex-column justify-content-around">
        <div class="d-flex justify-content-around mt-1">
            <div class="bg-white border rounded-5 row" style="width:225px; height:80px;">
                <div class="col-5 d-flex">
                    <div class="side-img rounded-pill p-2 align-self-center" style="background-color: #ACD5F1;">
                        <img src="../images/file.png" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-7 p-0 text-center d-flex flex-column justify-content-end">
                    <div class="text-end pe-2" style="color: #ACD5F1;">° °</div>
                    <h5 class="fw-bold m-0">636</h5>
                    <small class="text-black-50 lh-1 mb-2">Total of Activities Submitted</small>
                </div>
            </div>
            <div class="bg-white border rounded-5 row" style="width:225px; height:80px;">
                <div class="col-5 d-flex">
                    <div class="side-img rounded-pill p-2 align-self-center" style="background-color: #FDF0ED;">
                        <img src="../images/forbidden.png" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-7 p-0 text-center d-flex flex-column justify-content-end">
                    <div class="text-end pe-2" style="color: #E94444;">° °</div>
                    <h5 class="fw-bold m-0">564</h5>
                    <small class="text-black-50 lh-1 mb-2">Total of Unfinished Activities</small>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-around mt-1">
            <div class="bg-white border rounded-5 row" style="width:225px; height:80px;">
                <div class="col-5 d-flex">
                    <div class="side-img rounded-circle p-2 px-3 align-self-center d-flex"
                        style="background-color: #F0F3E7;">
                        <img src="../images/sum.png" alt="" class="img-fluid align-self-center">
                    </div>
                </div>
                <div class="col-7 p-0 text-center d-flex flex-column justify-content-end">
                    <div class="text-end pe-2" style="color: #AAC559;">° °</div>
                    <h5 class="fw-bold m-0">1200</h5>
                    <small class="text-black-50 lh-1 mb-2">Total of all Activities</small>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    window.onload = () => {
        console.log("oi")
        const mini_image = document.querySelectorAll(".side-img");
        mini_image.forEach(element => {
            resizeToOnebyOne_Width(element)
        });
    }
</script>