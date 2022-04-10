<div class="d-flex flex-column h-100">
    <div class="bg-white container border p-3 h-100 d-flex flex-column" style="border-radius: 25px;">
        <div>
            <h5 class="fw-bold text-darkish m-0">Create an Account</h5>
            <small class="text-black-50 d-block">Create an account for parents, teachers, and students</small>
        </div>
        <div class="d-flex justify-content-end">
            <select class="form-select form-select-sm w-25 " aria-label=".form-select-sm example"
                onchange="setAddRole(this.value)">
                <option selected value="0">Student</option>
                <option value="1">Parent</option>
                <option value="2">Teacher</option>
            </select>
        </div>
        <form class="d-flex flex-column" autocomplete="on">
            <div id="form-container">
                <div class="d-flex justify-content-between fw-bold text-darkish mt-3">
                    <div class="text-center">
                        <input type="text" class="form-control" id="studentLastName">
                        <label for="studentLastName" class="form-label">Last Name</label>
                    </div>
                    <div class="text-center">
                        <input type="text" class="form-control" id="studentFirstName">
                        <label for="studentFirstName" class="form-label">First Name</label>
                    </div>
                    <div class="text-center">
                        <input type="text" class="form-control" id="studentMiddleName">
                        <label for="studentMiddleName" class="form-label">Middle Name</label>
                    </div>
                </div>
                <div class="d-flex justify-content-between fw-bold text-darkish mt-3">
                    <div class="text-center flex-fill me-4">
                        <input type="text" class="form-control" id="studentLRN">
                        <label for="studentLRN" class="form-label">Learner's Reference Number</label>
                    </div>
                    <div class="text-center">
                        <input type="number" class="form-control" id="studentGradeLevel" min="7" max="12">
                        <label for="studentGradeLevel" class="form-label">Grade Level</label>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select w-50" id="studentSection" aria-label="Floating label select example">
                        <option selected>Select section</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <label for="studentSection">Section</label>
                </div>
            </div>
            <div class="alert alert-danger p-1 border border-danger" role="alert" style="visibility: hidden;" id="addError">
                <small> <i class="bi bi-exclamation-triangle"></i> <span id="addErrorMsg">A simple danger alert—check it out! </span></small>
            </div>
            <button type="button" class="spma-button-2 w-50 align-self-center" onclick="" id="addSubmit">Submit</button>
        </form>
    </div>
</div>

<div class="modal fade" id="addSuccess" tabindex="-1" aria-labelledby="addSuccess" aria-hidden="true">
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
                <span id="addSuccessMsg">Subject successfully added</span>
            </div>
            <div class="modal-footer borderless d-flex justify-content-end">
                <button class="spma-button-2 w-auto px-3" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addDanger" tabindex="-1" aria-labelledby="addDanger" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header borderless">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0 text-center">
                <h2>Error</h2>
                <span id="addDangerMsg">Something went wrong</span>
            </div>
            <div class="modal-footer borderless d-flex justify-content-end">
                <button class="spma-button-2 w-auto px-3" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>