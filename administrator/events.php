<div class="d-flex flex-column h-100">
    <div class="bg-white container border p-3 h-100 d-flex flex-column" style="border-radius: 25px;">
        <div>
            <h5 class="fw-bold text-darkish m-0">Event Manager</h5>
            <small class="text-black-50 d-block">Manage upcoming events for everyone to see.</small>
        </div>
        <div class="d-flex justify-content-around">
            <div class="bg-accent" style="height:10px; width:5%;"></div>
            <div></div>
            <div class="bg-accent" style="height:10px; width:5%;"></div>
        </div>
        <div class="border shadow-sm" style="border-radius: 25px 25px 0 0;">
            <div class="d-flex justify-content-between p-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-50 align-self-end"
                    style="fill: rgba(var(--accent-color), .25);" viewBox="0 0 354 28">
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
                <button class="spma-button-2 fs-5 p-0 p-1 d-flex justify-content-end" id="add-event" onclick="showEventModal()">
                    <img src="../images/add.png" alt="" style="filter: invert(1);">
                </button>
            </div>
        </div>
        <div class="flex-fill overflow-auto p-2"
            style="margin:0 1px;background-color: rgba(var(--accent-color), .1); border: rgba(var(--accent-color)) 2px dashed; border-radius:0 0 25px 25px;" id="eventsContainer">
            <div class="d-flex text-center justify-content-center w-100 h-100" style="display: none !important;">
                <p class="align-self-center text-accent fs-5 opacity-75 text-decoration-underline"> Click the <i
                        class="bi bi-plus-circle-fill"></i> button to add an event. </p>
            </div>
            <!-- <div class="bg-danger w-100" style="height: 200%;"></div> -->

            <div class="container bg-white border rounded-3 text-darkish d-flex justify-content-between py-1 pe-0 mb-2">
                <div class="fw-bold align-self-center"> <i class="bi bi-calendar2-event"></i> &nbsp; November 1, 2021
                </div>
                <div class="ps-2 w-50" style="border-left: 5px red solid;">
                    <small class="test-truncate m-0 text-darkish">Special (Non-working) Holiday</small>
                    <p class="test-truncate m-0 text-darkish fw-bold" title="">Note Title Lorem ipsum dolor sit amet
                        consectetur adipisicing elit. Quo error reprehenderit voluptatum asperiores ducimus nobis
                        officia dolorum ratione dignissimos dolores distinctio dolore saepe veritatis doloribus modi
                        mollitia accusantium, voluptatibus nemo.</p>
                </div>
                <div class="border-start px-2">
                    <button class="spma-button-2-primary text-white p-0 mb-1" data-bs-toggle="modal"
                        data-bs-target="#eventModal"><i class="bi bi-pencil-square"></i></button>
                    <button class="spma-button-2-danger text-white p-0"><i class="bi bi-trash3"></i></button>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header borderless">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0">
                <h5 class="modal-title fw-bold d-block text-center" id="eventModalLabel">Add an Event</h5>
                <div class="mb-3 d-flex">
                    <div class="flex-grow-1">
                        <label for="eventDate" class="form-label m-0">Date</label>
                        <input type="date" class="form-control" id="eventDate">
                    </div>
                    <div class="align-self-stretch d-flex flex-column ms-4">
                        <label for="eventColor" class="form-label m-0">Color Label</label>
                        <input type="color" class="flex-grow-1 p-1 border bg-white pointer align-self-center"
                            id="eventColor">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="eventCategory" class="form-label m-0">Event Category</label>
                    <input type="text" class="form-control" id="eventCategory" placeholder="Example: Special Holiday">
                </div>
                <div class="mb-3">
                    <label for="eventName" class="form-label m-0">Event Name</label>
                    <input type="text" class="form-control" id="eventName">
                </div>
                <div id="eventError" style="visibility:hidden;">
                    <div class="alert alert-danger py-0 px-1 text-center" role="alert">
                        <i class="bi bi-exclamation-triangle"></i> Don't leave any field empty
                    </div>
                </div>
            </div>
            <div class="modal-footer borderless">
                <div class="w-50">
                    <button class="spma-button-2" type="button" onclick="setEvent()">Save event</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="eventEditModal" tabindex="-1" aria-labelledby="eventEditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header borderless">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0">
                <h5 class="modal-title fw-bold d-block text-center" id="eventEditModalLabel">Edit Event</h5>
                <div class="mb-3 d-flex">
                    <div class="flex-grow-1">
                        <label for="eventEditDate" class="form-label m-0">Date</label>
                        <input type="date" class="form-control" id="eventEditDate">
                    </div>
                    <div class="align-self-stretch d-flex flex-column ms-4">
                        <label for="eventEditColor" class="form-label m-0">Color Label</label>
                        <input type="color" class="flex-grow-1 p-1 border bg-white pointer align-self-center"
                            id="eventEditColor">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="eventEditCategory" class="form-label m-0">Event Category</label>
                    <input type="text" class="form-control" id="eventEditCategory" placeholder="Example: Special Holiday">
                </div>
                <div class="mb-3">
                    <label for="eventEditName" class="form-label m-0">Event Name</label>
                    <input type="text" class="form-control" id="eventEditName">
                </div>
                <div id="eventEditError" style="visibility:hidden;">
                    <div class="alert alert-danger py-0 px-1 text-center" role="alert">
                        <i class="bi bi-exclamation-triangle"></i> Don't leave any field empty
                    </div>
                </div>
            </div>
            <div class="modal-footer borderless">
                <div class="w-50">
                    <button class="spma-button-2" type="button" onclick="setEventEdit()">Save event</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="eventDelete" tabindex="-1" aria-labelledby="eventDelete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header borderless">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0 text-center">
                <h5 class="modal-title fw-bold d-block text-center" id="eventDelete">Delete Event</h5>
                Are you sure you want to delete this event?
            </div>
            <div class="modal-footer borderless d-flex justify-content-center">
                <button class="spma-button-2-danger w-auto px-3" data-bs-dismiss="modal" id="eventDeleteYes" onclick="setEventDelete()">Yes</button>
                <button class="spma-button-2 w-auto px-3" data-bs-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>