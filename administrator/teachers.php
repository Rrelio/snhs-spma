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
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne"><button class="accordion-button collapsed"
                                type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                aria-expanded="false" aria-controls="flush-collapseOne">
                                <div class="fs-5"><i class="bi bi-folder me-2"></i></div>
                                <div class="test-truncate">
                                    Teacher 1 Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officiis provident tempore eius alias sit culpa at assumenda numquam nobis architecto modi aliquam, quos voluptatibus distinctio eveniet fugiat id ullam tenetur!
                                </div>
                            </button></h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExamples">
                            <div class="accordion-body p-2 pe-0 d-flex">
                                <table class="table table-sm table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Grade</th>
                                            <th scope="col">Section</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">001</th>
                                            <td>English</td>
                                            <td>6</td>
                                            <td>A</td>
                                            <td><div class="btn btn-danger px-1 text-white ms-2 p-0"><small><i class="bi bi-trash-fill"></i></small></div></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>lo</td>
                                            <td><div class="btn btn-danger px-1 text-white ms-2 p-0"><small><i class="bi bi-trash-fill"></i></small></div></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Larry the Bird</td>
                                            <td>@twitter</td>
                                            <td>@twitter</td>
                                            <td><div class="btn btn-danger px-1 text-white ms-2 p-0"><small><i class="bi bi-trash-fill"></i></small></div></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-50 border-start ps-2 d-flex flex-column">
                <h6 class="fw-bold text-darkish mb-1 ms-4">Teacher's Subjects</h6>
                <div class="container border rounded-3 py-2 flex-fill d-flex flex-column justify-content-center">
                    <h5 class="fw-bold text-darkish mb-1 ms-4 align-self-center mb-3"><u>Teacher's Name</u></h5>

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
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option selected>Select section</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <label for="floatingSelect">Section</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option selected>Select subject</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <label for="floatingSelect">Subject</label>
                        </div>
                        <div class="alert alert-danger p-0 px-2" role="alert" style="visibility: hidden;">
                            <i class="bi bi-exclamation-triangle-fill"></i> &nbsp;<small>Don't leave any field
                                blank</small>
                        </div>
                        <button class="spma-button-2 text-white rounded-pill w-fit px-3 mx-auto d-block my-2">Submit <i
                                class="bi bi-plus-circle"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="rounded-pill border d-flex w-75 bg-accent-50 class-switch mx-auto mt-1">
            
        </div>
    </div>
</div>