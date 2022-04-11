<div class="d-flex flex-column h-100">
    <div class="bg-white container border p-3 h-100 d-flex flex-column" style="border-radius: 25px;">
        <div style="position: relative;">
            <h5 class="fw-bold text-darkish">Class Manager</h5>
            <small class="text-black-50 d-block">Here you can manage classes and their subjects</small>
            <div style="position: absolute; top:-50px; right:0px; transform:rotateZ(-15deg); overflow:hidden;"
                id="switchSVG">
                <svg xmlns="http://www.w3.org/2000/svg" width="130" height="130" fill="rgba(var(--accent-color),.50)"
                    class="bi bi-person-video2" viewBox="0 0 16 16">
                    <path d="M10 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                    <path
                        d="M2 1a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2ZM1 3a1 1 0 0 1 1-1h2v2H1V3Zm4 10V2h9a1 1 0 0 1 1 1v9c0 .285-.12.543-.31.725C14.15 11.494 12.822 10 10 10c-3.037 0-4.345 1.73-4.798 3H5Zm-4-2h3v2H2a1 1 0 0 1-1-1v-1Zm3-1H1V8h3v2Zm0-3H1V5h3v2Z" />
                </svg>
            </div>
        </div>
        <div class="mt-4 overflow-auto flex-grow-1 d-flex">
            <div class="w-50 pe-1 overflow-auto">
                <div class="d-flex justify-content-between border-bottom border-secondary sticky-top bg-white">
                    <h6 class="fw-bold text-darkish mb-1 ms-4">Active Teachers</h6>
                </div>
                <div class="accordion accordion-flush" id="accordionFlushExamples">
                    <div class="accordion-item" id="teacherList">
                        
                    </div>
                </div>
            </div>
            <div class="w-50 border-start ps-2 d-flex flex-column">
                <h6 class="fw-bold text-darkish mb-1 ms-4">Teacher's Subjects</h6>
                <div class="container border rounded-3 py-2 flex-fill d-flex flex-column justify-content-center">
                    <h5 class="fw-bold text-darkish ms-4 align-self-center mb-3" id="teacherName"><u>Teacher's Name</u></h5>

                    <form class="">
                        <div class="form-floating mb-3">
                            <select class="form-select" id="teacherGrade" aria-label="Floating label select example" disabled onchange="assignSectionAndSubjectStep(this)">
                                <option selected value="">Select grade</option>
                                <option value="7">Grade 7</option>
                                <option value="8">Grade 8</option>
                                <option value="9">Grade 9</option>
                                <option value="10">Grade 10</option>
                                <option value="11">Grade 11</option>
                                <option value="12">Grade 12</option>
                            </select>
                            <label for="teacherGrade">Grade level</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="teacherSection" aria-label="Floating label select example" disabled onchange="assignSectionAndSubjectStep(this)">
                                <option selected value="">Select section</option>
                            </select>
                            <label for="teacherSection">Section</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="teacherSubject" aria-label="Floating label select example" disabled>
                                <option selected value="">Select subject</option>
                            </select>
                            <label for="teacherSubject">Subject</label>
                        </div>
                        <div class="alert alert-danger p-0 px-2 m-0" role="alert" style="visibility: hidden;" id="teacherError">
                            <i class="bi bi-exclamation-triangle-fill"></i> &nbsp;<small>Don't leave any field
                                blank</small>
                        </div>
                        <button class="spma-button-2 text-white rounded-pill w-fit px-3 mx-auto d-block" type="button" onclick="setTeacherAddHandles()" id="teacherSubmit">Submit <i
                                class="bi bi-plus-circle"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="rounded-pill border d-flex w-75 bg-accent-50 class-switch mx-auto mt-1">
            
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
                    Are you sure you want to remove this note?
                </span>
            </div>
            <div class="modal-footer borderless d-flex justify-content-center">
                <button class="spma-button-2-danger w-auto px-3" data-bs-dismiss="modal" onclick="setSectionDelete()" id="classDeleteYes">Yes</button>
                <button class="spma-button-2 w-auto px-3" data-bs-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>