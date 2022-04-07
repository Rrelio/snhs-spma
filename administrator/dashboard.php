<div class="d-flex flex-column" style="height: 100%;">
    <div class="bg-white container border p-3 d-flex flex-column justify-content-start worm-bg"
        style="border-radius: 25px; position:relative;">
        <div>
            <h5 class="fw-bold text-darkish m-0">School Statistics</h5>
            <small class="text-black-50 d-block">This shows the numbers of teachers, parents, and students</small>
        </div>
        <div>
            <div class="d-flex justify-content-around text-darkish mt-3 bg-white-50">
                <div class="w-100 mx-3 text-center">
                    <div class="user-count border rounded-pill py-2 text-center"
                        style="background: linear-gradient(to top, #FF7543 50%, transparent 0); animation-delay:.5s;">
                        <h3 class="m-0" id="totalTeachers">43</h3>
                    </div>
                    <p class="mb-4">No. of Teachers</p>
                </div>
                <div class="w-100 mx-3 text-center">
                    <div class="user-count border rounded-pill py-2 text-center"
                        style="background: linear-gradient(to top, #88CCE1 50%, transparent 0); animation-delay:1s;">
                        <h3 class="m-0" id="totalStudents">1200</h3>
                    </div>
                    <p class="mb-4">No. of Students</p>
                </div>
                <div class="w-100 mx-3 text-center">
                    <div class="user-count border rounded-pill py-2 text-center"
                        style="background: linear-gradient(to top, #FFBB61 50%, transparent 0); animation-delay:1.5s;">
                        <h3 class="m-0" id="totalParents">2400</h3>
                    </div>
                    <p class="mb-4">No. of Parents</p>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 354 28">
            <g id="Layer_2" data-name="Layer 2">
                <g id="Layer_1-2" data-name="Layer 1">
                    <rect class="cls-1" width="336" height="10" rx="5" />
                    <rect class="cls-1" x="344" width="10" height="10" rx="5" />
                    <rect class="cls-1" y="18" width="10" height="10" rx="5" />
                    <rect class="cls-1" x="18" y="18" width="34" height="10" rx="5" />
                    <rect class="cls-1" x="60" y="18" width="167" height="10" rx="5" />
                </g>
            </g>
        </svg>

    </div>
    <div class="flex-fill d-flex flex-column flex-fill mt-2 bg-white container border px-3 py-2 "
        style="border-radius: 25px;">
        <div class="d-flex justify-content-between">
            <h5 class="fw-bold text-darkish m-0 align-self-center pe-2">Notes <i class="bi bi-pin-angle-fill"></i></h5>
            <div class="d-flex">
                <small class="align-self-center px-3 rounded-pill bg-accent text-white me-3" id="notesCount">&nbsp;</small>
                <h5 class="fw-bold fs-3 text-darkish m-0 pointer" style="color: rgba(var(--accent-color));"
                    data-bs-toggle="modal" data-bs-target="#notesModal"><i class="bi bi-plus-circle-fill"></i></h5>
            </div>
        </div>
        <div class="flex-grow-1 my-2 overflow-auto"
            style="border: rgba(var(--accent-color)) 2px dashed; background-color:rgba(var(--accent-color), .1); border-radius:0 0 20px 20px;">
            <div class="d-flex text-center justify-content-center w-100 h-100" style="display: none !important;">
                <p class="align-self-center text-accent fs-5 opacity-75 text-decoration-underline"> Click the <i
                        class="bi bi-plus-circle-fill"></i> button to add a note. </p>
            </div>
            <div style="height:10px;">
                <div class="row m-0 my-2">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="" id="notesContainer1">
                            <div class="container border rounded-4 bg-white shadow-sm p-0 mb-2">
                                <div class="d-flex justify-content-between px-1">
                                    <div class="w-75">
                                        <p class="test-truncate m-0 text-darkish" title="">Note Title Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo error reprehenderit voluptatum asperiores ducimus nobis officia dolorum ratione dignissimos dolores distinctio dolore saepe veritatis doloribus modi mollitia accusantium, voluptatibus nemo.</p>
                                    </div>
                                    <div class="w-25 text-end">
                                        <i class="bi bi-pencil-square text-primary pointer" data-bs-toggle="modal" data-bs-target="#notesEditModal"></i>
                                        <i class="bi bi-trash3 text-danger pointer ms-1" data-bs-toggle="modal" data-bs-target="#noteDelete"></i>
                                    </div>
                                </div>
                                <hr class="m-0">
                                <div class="p-1 px-2">
                                    <small>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod dignissimos ipsam quidem minima, assumenda velit optio a voluptatum praesentium expedita quia, cumque sit quo ipsa aliquam temporibus deserunt ullam? Tempora!
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="" id="notesContainer2">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="notesModal" tabindex="-1" aria-labelledby="notesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header borderless">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0">
                <h5 class="modal-title fw-bold d-block text-center" id="notesModalLabel">Add a Note</h5>
                <div class="mb-3">
                    <label for="noteTitle" class="form-label">Note Title</label>
                    <input type="Text" class="form-control" id="noteTitle" placeholder="Title...">
                </div>
                <div class="mb-3">
                    <label for="noteDescription" class="form-label">Note Description</label>
                    <textarea class="form-control" id="noteDescription" rows="5"></textarea>
                </div>
                <div class="alert alert-danger alert-dismissible fade show p-0 d-flex" id="notesError" role="alert" style="visibility:hidden;">
                    <div>
                     &nbsp;<i class="bi bi-exclamation-triangle"></i> Error: Something went wrong
                    </div>
                </div>
            </div>
            <div class="modal-footer borderless">
                <div class="w-50">
                    <button class="spma-button-2" onclick="setNewNote()">Save note</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="notesEditModal" tabindex="-1" aria-labelledby="notesEditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header borderless">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0">
                <h5 class="modal-title fw-bold d-block text-center" id="notesEditModalLabel">Edit Note</h5>
                <div class="mb-3">
                    <label for="noteEditTitle" class="form-label">Note Title</label>
                    <input type="Text" class="form-control" id="noteEditTitle" placeholder="Title...">
                </div>
                <div class="mb-3">
                    <label for="noteEditDescription" class="form-label">Note Description</label>
                    <textarea class="form-control" id="noteEditDescription" rows="5"></textarea>
                </div>
                <div class="alert alert-danger alert-dismissible fade show p-0 d-flex" id="notesEditError" role="alert" style="visibility:hidden;">
                    <div>
                     &nbsp;<i class="bi bi-exclamation-triangle"></i> Error: Something went wrong
                    </div>
                </div>
            </div>
            <div class="modal-footer borderless">
                <div class="w-50">
                    <button class="spma-button-2" type="button" onclick="setNoteEdit()">Save note</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="noteDelete" tabindex="-1" aria-labelledby="noteDelete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header borderless">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0 text-center">
                <h5 class="modal-title fw-bold d-block text-center" id="noteDelete">Delete Note</h5>
                Are you sure you want to delete this note?
            </div>
            <div class="modal-footer borderless d-flex justify-content-center">
                <button class="spma-button-2-danger w-auto px-3" data-bs-dismiss="modal" onclick="setNoteDelete()">Yes</button>
                <button class="spma-button-2 w-auto px-3" data-bs-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>