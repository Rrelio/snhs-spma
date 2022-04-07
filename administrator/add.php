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
                        <input type="number" class="form-control" id="studentGradeLevel" min="6" max="12">
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
            <div class="alert alert-danger p-1 border border-danger" role="alert">
                <small> <i class="bi bi-exclamation-triangle"></i> A simple danger alert—check it out! </small>
            </div>
            <button type="button" class="spma-button-2 w-50 align-self-center">Submit</button>
        </form>
    </div>
</div>