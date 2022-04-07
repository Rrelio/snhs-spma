<div class="d-flex flex-column h-100">
    <div class="bg-white container border p-3 h-100 d-flex flex-column" style="border-radius: 25px;">
        <div>
            <h5 class="fw-bold text-darkish m-0">Reset an Account</h5>
            <small class="text-black-50 d-block">Reset the account with forgotten password</small>
        </div>
        <div class="d-flex justify-content-between mt-2">
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio" id="radioStudent" autocomplete="off" checked>
                <label class="btn btn-outline-primary pill-left py-1 px-2" for="btnradio1" onclick="setResetTable('student')"><small>
                        STUDENTS</small></label>

                <input type="radio" class="btn-check" name="btnradio" id="radioParent" autocomplete="off">
                <label class="btn btn-outline-primary py-1 px-2" for="btnradio2" onclick="setResetTable('parent')"><small> PARENTS</small></label>

                <input type="radio" class="btn-check" name="btnradio" id="radioTeacher" autocomplete="off">
                <label class="btn btn-outline-primary pill-right py-1 px-2" for="btnradio3" onclick="setResetTable('teacher')"><small> TEACHERS
                    </small></label>
            </div>
            <select class="form-select form-select-sm w-25 " aria-label="form-select-sm example" id="resetsSort" onchange="sortResets(this.value)">
                <option value="LRN">LRN</option>
                <option value="last_name">Last Name</option>
                <option value="first_name">First Name</option>
                <option value="middle_name">Middle Name</option>
                <option value="grade_level">Grade Level</option>
                <option value="section">Section</option>
                <option value="reset">Resets</option>
            </select>
        </div>
        <div class="overflow-auto mt-3 flex-grow-1">
            <table class="table table-sm table-hover table-fs-small">
                <thead class="sticky-top bg-white">
                    <tr class="sticky-th bg-white" id="resetsTableHeader">
                        <th scope="col">LRN</th>
                        <th scope="col">Last</th>
                        <th scope="col">First</th>
                        <th scope="col">Middle</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Section</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="border-0" id="resetsTable">
                    <tr>
                        <th scope="row">0000001</th>
                        <td>Austria</td>
                        <td>Ellaine</td>
                        <td>D</td>
                        <td>9</td>
                        <td>A</td>
                        <td><button class="spma-button-2 text-white p-0" onclick="setReset(this)"><small>Reset</small></button></td>
                    </tr>
                    <tr>
                        <th scope="row"><div style="height: 400px; background:red;"></div></th>
                        <td>Austria</td>
                        <td>Ellaine</td>
                        <td>D</td>
                        <td>9</td>
                        <td>A</td>
                        <td><button class="spma-button-2 text-white p-0 account-inactive" onclick="setReset(this)"><small>Reset</small></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="d-flex mx-auto">
            <div class="spma-button-2 w-fit px-2 py-1" style="border-radius: 10px 0 0 10px;"
                onclick="resetPagination('start')"><i class="bi bi-chevron-double-left"></i></div>
            <div class="spma-button-2 w-fit px-2 py-1 rounded-0" onclick="resetPagination('previous')"><i
                    class="bi bi-chevron-left"></i></div>
            <div class="bg-accent w-fit px-2 pt-1 text-white fw-bold" id="resetPaginationCount">0</div>
            <div class="spma-button-2 w-fit px-2 py-1 rounded-0" onclick="resetPagination('next')"><i
                    class="bi bi-chevron-right"></i></div>
            <div class="spma-button-2 w-fit px-2 py-1" style="border-radius: 0 10px 10px 0;"
                onclick="resetPagination('end')"><i class="bi bi-chevron-double-right"></i></div>
        </div>
    </div>
</div>