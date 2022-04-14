<div class="d-flex flex-column h-100">
    <div class="bg-white container border p-3 h-100 d-flex flex-column" style="border-radius: 25px;">
        <div>
            <h5 class="fw-bold text-darkish">Activity Manager</h5><small class="text-black-50 d-block">Here you can
                manage your student's activities</small>
        </div>
        <div class="mt-4 overflow-auto flex-grow-1 d-flex">
            <div class="w-50 pe-1 overflow-auto">
                <div class="d-flex justify-content-between border-bottom border-secondary sticky-top bg-white">
                    <h6 class="fw-bold text-darkish mb-1 ms-4">Activity List</h6>
                </div>
                <div class="accordion accordion-flush" id="accordionFlushExamples">
                    <div class="accordion-item" id="teacherActivitiesHandles">
                        <h2 class="accordion-header" id="flush-headingOne"><button class="accordion-button collapsed"
                                type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                aria-expanded="false" aria-controls="flush-collapseOne">
                                <div class="fs-5"><i class="bi bi-folder me-2"></i></div>
                                English 7
                            </button></h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExamples">
                            <div class="accordion-body p-2 pe-0 d-flex">
                                <ul class="list-group w-100">
                                    <li class="list-group-item list-group-item-action d-flex pe-1">
                                        <div class="test-truncate align-self-center"><small> Lorem ipsum dolor sit, amet
                                                consectetur adipisicing elit. Culpa pariatur libero quasi incidunt
                                                laudantium. Accusantium, adipisci nisi! Esse cupiditate tenetur quas
                                                dicta. Sed amet nemo, similique atque repellendus perspiciatis
                                                dolores?</small></div>
                                        <div class="btn btn-danger px-1 text-white ms-2 p-0"><small><i
                                                    class="bi bi-trash-fill"></i></small></div>
                                    </li>
                                    <li class="list-group-item list-group-item-action d-flex pe-1">
                                        <div class="test-truncate align-self-center"><small> Lorem ipsum dolor sit, amet
                                                consectetur adipisicing elit. Culpa pariatur libero quasi incidunt
                                                laudantium. Accusantium, adipisci nisi! Esse cupiditate tenetur quas
                                                dicta. Sed amet nemo, similique atque repellendus perspiciatis
                                                dolores?</small></div>
                                        <div class="btn btn-danger px-1 text-white ms-2 p-0"><small><i
                                                    class="bi bi-trash-fill"></i></small></div>
                                    </li>
                                    <li class="list-group-item list-group-item-action d-flex pe-1">
                                        <div class="test-truncate align-self-center"><small> Lorem ipsum dolor sit, amet
                                                consectetur adipisicing elit. Culpa pariatur libero quasi incidunt
                                                laudantium. Accusantium, adipisci nisi! Esse cupiditate tenetur quas
                                                dicta. Sed amet nemo, similique atque repellendus perspiciatis
                                                dolores?</small></div>
                                        <div class="btn btn-danger px-1 text-white ms-2 p-0"><small><i
                                                    class="bi bi-trash-fill"></i></small></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-50 border-start ps-2 d-flex flex-column">
                <h6 class="fw-bold text-darkish mb-1 ms-4">Add an Activity</h6>
                <div class="container border rounded-3 py-2 flex-fill d-flex flex-column justify-content-center">
                    <form class="">
                        <div class="form-floating mb-3">
                            <select class="form-select" id="activityHandle" aria-label="Floating label select example">
                                <option selected value="">Select whom to take Activity</option>
                            </select>
                            <label for="activityHandle">Handled Class</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="activityCategory" aria-label="Floating label select example">
                                <option selected value="">Select Category</option>
                                <option value="Assignment">Assignment</option>
                                <option value="Quiz">Quiz</option>
                                <option value="Performance Task">Performance Task</option>
                                <option value="Other">Other</option>
                            </select>
                            <label for="activityCategory">Category</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-2" id="activityTitle" placeholder="Activity title...">
                            <label for="activityTitle">Activity Title</label>
                        </div>
                        <div class="alert alert-danger p-0 px-2" role="alert" style="visibility: hidden;" id="activityError">
                            <i class="bi bi-exclamation-triangle-fill"></i> &nbsp;<small>Don't leave any field blank</small>
                        </div>
                        <button class="spma-button-2 text-white rounded-pill w-fit px-3 mx-auto d-block my-2" type="button" onclick="setTeacherActivityAdd()">Submit <i
                                class="bi bi-plus-circle"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="classSuccess" tabindex="-1" aria-labelledby="classSuccess" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header borderless">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0 text-center">
                <div class="checkmark_wrapper">
                    <svg class="checkmark my-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                    </svg>
                </div>
                <span id="classSuccessMsg">Subject successfully added</span>
            </div>
            <div class="modal-footer borderless d-flex justify-content-end">
                <button class="spma-button-2 w-auto px-3" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="classDelete" tabindex="-1" aria-labelledby="classDelete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header borderless">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0 text-center">
                <h5 class="modal-title fw-bold d-block text-center">Remove Subject</h5>
                <span id="classDeleteMsg">
                    Are you sure you want to delete this note?
                </span>
            </div>
            <div class="modal-footer borderless d-flex justify-content-center">
                <button class="spma-button-2-danger w-auto px-3" data-bs-dismiss="modal" onclick="setSectionDelete()" id="classDeleteYes">Yes</button>
                <button class="spma-button-2 w-auto px-3" data-bs-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>