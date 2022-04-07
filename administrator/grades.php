<div class="d-flex flex-column h-100">
    <div class="bg-white container border p-3 h-100 d-flex flex-column" style="border-radius: 25px;">
        <div style="position: relative;">
            <h5 class="fw-bold text-darkish">Class Manager</h5>
            <small class="text-black-50 d-block">Here you can manage classes and their subjects</small>
            <div style="position: absolute; top:-50px; right:0px; transform:rotateZ(-15deg); overflow:hidden;" >
                <svg xmlns="http://www.w3.org/2000/svg" width="130" height="130" fill="rgba(var(--accent-color),.50)" class="bi bi-card-heading" viewBox="0 0 16 16">
                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                    <path d="M3 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0-5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-1z"/>
                </svg>
            </div>
        </div>
        <div class="mt-4 overflow-auto flex-grow-1 d-flex">
            <div class="w-50 pe-1 overflow-auto">
                <div class="d-flex justify-content-between border-bottom border-secondary sticky-top bg-white">
                    <h6 class="fw-bold text-darkish mb-1 ms-4">Grades & Subjects</h6>
                </div>
                <div class="accordion accordion-flush" id="accordionFlushExamples">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne"><button class="accordion-button collapsed"
                                type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                aria-expanded="false" aria-controls="flush-collapseOne">
                                <div class="fs-5"><i class="bi bi-folder me-2"></i></div>
                                Grade 7
                            </button></h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExamples">
                            <div class="accordion-body p-2 pe-0 d-flex">
                                <ul class="list-group w-100">
                                    <li class="list-group-item list-group-item-action d-flex pe-1 justify-content-between">
                                        <div class="test-truncate align-self-center"><small> Filipino </small></div>
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
                                    <li class="list-group-item list-group-item-action d-flex pe-1 justify-content-between">
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
                <h6 class="fw-bold text-darkish mb-1 ms-4">Add a Subject</h6>
                <div class="container border rounded-3 py-2 flex-fill d-flex flex-column justify-content-center">
                    <form class="">
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option selected>Select grade</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <label for="floatingSelect">Grade level</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control rounded-2" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Subject Name</label>
                        </div>
                        <div class="alert alert-danger p-0 px-2" role="alert" style="visibility: hidden;">
                            <i class="bi bi-exclamation-triangle-fill"></i> &nbsp;<small>Don't leave any field blank</small>
                        </div>
                        <button class="spma-button-2 text-white rounded-pill w-fit px-3 mx-auto d-block my-2">Submit <i class="bi bi-check2"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="rounded-pill border d-flex w-75 bg-accent-50 class-switch mx-auto mt-1">
                <div class="rounded-pill me-1 p-1 w-50 text-center pointer text-white position-relative fw-bold bg-accent" onclick="switchClassManager(this)" id="switchSubject">
                <div>Subjects Manager</div>    
                </div>
                <div class="rounded-pill p-1 w-50 text-center pointer text-white position-relative" onclick="switchClassManager(this)" id="switchSection">
                    <div> Sections Manager </div>
                </div>
                <div class="rounded-pill ms-1 p-1 w-50 text-center pointer text-white position-relative" onclick="switchClassManager(this)" id="switchTeacher">
                    <div> Teacher Manager </div>
                </div>
        </div>
    </div>
</div>