<div class="d-flex flex-column h-100">
    <div class="bg-white container border p-3 h-100 d-flex flex-column" style="border-radius: 25px;">
        <div>
            <h5 class="fw-bold text-darkish m-0">Active Accounts</h5>
            <small class="text-black-50 d-block">This shows the table of active accounts</small>
        </div>
        <div class="d-flex justify-content-between mt-2">
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio" id="radioStudent" autocomplete="off" checked>
                <label class="btn btn-outline-primary pill-left py-1 px-2" for="btnradio1"
                    onclick="setStudentTable()"><small>
                        STUDENTS</small></label>

                <input type="radio" class="btn-check" name="btnradio" id="radioParent" autocomplete="off">
                <label class="btn btn-outline-primary py-1 px-2" for="btnradio2" onclick="setParentTable()"><small>
                        PARENTS</small></label>

                <input type="radio" class="btn-check" name="btnradio" id="radioTeacher" autocomplete="off">
                <label class="btn btn-outline-primary pill-right py-1 px-2" for="btnradio3"
                    onclick="setTeacherTable()"><small> TEACHERS
                    </small></label>
            </div>
            <select class="form-select form-select-sm w-25 " aria-label=".form-select-sm example" id="accountsSort" onchange="sortAccounts(this.value)">
                <option value="LRN">LRN</option>
                <option value="last_name">Last Name</option>
                <option value="first_name">First Name</option>
                <option value="middle_name">Middle Name</option>
                <option value="grade_level">Grade Level</option>
                <option value="section">Section</option>
                <option value="active">Status</option>
            </select>
        </div>
        <div class="overflow-auto mt-3 flex-grow-1">
            <table class="table table-sm table-hover table-fs-small">
                <thead class="sticky-top bg-white">
                    <tr class="sticky-th bg-white" id="accountsTableHeader">
                        <th scope="col">LRN</th>
                        <th scope="col">Last</th>
                        <th scope="col">First</th>
                        <th scope="col">Middle</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Section</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody class="border-0" id="accountsTable">
                    <tr>
                        <th scope="row">0000001</th>
                        <td>Austria</td>
                        <td>Ellaine</td>
                        <td>D</td>
                        <td>9</td>
                        <td>A</td>
                        <td><button class="spma-button-2 text-white p-0 account-inactive"
                                onclick="setActive(this)"><small>Active</small></button></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <div style="height: 400px; background:red;"></div>
                        </th>
                        <td>Austria</td>
                        <td>Ellaine</td>
                        <td>D</td>
                        <td>9</td>
                        <td>A</td>
                        <td><button class="spma-button-2 text-white p-0 account-inactive"
                                onclick="setActive(this)"><small>Active</small></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="d-flex mx-auto">
            <div class="spma-button-2 w-fit px-2 py-1" style="border-radius: 10px 0 0 10px;"
                onclick="accountPagination('start')"><i class="bi bi-chevron-double-left"></i></div>
            <div class="spma-button-2 w-fit px-2 py-1 rounded-0" onclick="accountPagination('previous')"><i
                    class="bi bi-chevron-left"></i></div>
            <div class="bg-accent w-fit px-2 pt-1 text-white fw-bold" id="accountsPaginationCount">0</div>
            <div class="spma-button-2 w-fit px-2 py-1 rounded-0" onclick="accountPagination('next')"><i
                    class="bi bi-chevron-right"></i></div>
            <div class="spma-button-2 w-fit px-2 py-1" style="border-radius: 0 10px 10px 0;"
                onclick="accountPagination('end')"><i class="bi bi-chevron-double-right"></i></div>
        </div>
    </div>
</div>