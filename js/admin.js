sessionStorage.userInfo ? console.log(SessionStorage()) : window.location.replace("http://localhost/snhs-spma/login.php");
// console.log(SessionStorage())
if(sessionStorage.userInfo){
    if(SessionStorage().role == "admin"){
        console.log(SessionStorage())
    }else{
        window.location.replace("http://localhost/snhs-spma/login.php");
    }
}else{
    window.location.replace("http://localhost/snhs-spma/login.php");
}

async function setAdminIndex() {
    document.querySelector("#adminName").innerText = SessionStorage().user_name
    if(SessionStorage().profile_image == ''){
        document.querySelector("#userProfilePic").setAttribute("src", "../images/default_avatar.png")

    }else{
        document.querySelector("#userProfilePic").setAttribute("src", SessionStorage().profile_image)
    }
}

async function getNotes() {
    let res = await GET("getNotes", {});
    let notesCount = document.querySelector("#notesCount");
    let notesContainer1 = document.querySelector("#notesContainer1");
    let notesContainer2 = document.querySelector("#notesContainer2");
    notesContainer1.innerHTML = ''
    notesContainer2.innerHTML = ''
    if (res != "0") {
        notesCount.innerHTML = res.length;
        res.forEach(obj => {
            let body = obj.body;
            body.trim();
            let content = `<div class="container border rounded-4 bg-white shadow-sm p-0 mb-2">
                                <div class="d-flex justify-content-between px-1">
                                    <div class="w-75">
                                        <p class="test-truncate m-0 text-darkish" title="${obj.header}" id="notesTitle-${obj.ID}">${obj.header}</p>
                                    </div>
                                    <div class="w-25 text-end">
                                        <i class="bi bi-pencil-square text-primary pointer" id="notesEdit-${obj.ID}" onclick="editNotes(this)"></i>
                                        <i class="bi bi-trash3 text-danger pointer ms-1" data-bs-toggle="modal" data-bs-target="#noteDelete" id="notesDelete-${obj.ID}" onclick="delNote(this)"></i>
                                    </div>
                                </div>
                                <hr class="m-0">
                                <div class="p-1 px-2">
<pre id="notesBody-${obj.ID}" class="nowrap">
${body}
</pre>
                                </div>
                            </div>`;
            if (notesContainer2.offsetHeight >= notesContainer1.offsetHeight) {
                notesContainer1.innerHTML += content
            } else {
                notesContainer2.innerHTML += content
            }
        });
    }
}

async function setNewNote() {
    let noteHeaderField = document.querySelector("#noteTitle").value
    let noteBodyField = document.querySelector("#noteDescription").value
    let noteError = document.querySelector("#notesError")
    if (noteBodyField == "" && noteHeaderField == "") {
        setVisibility(noteError, true)
    } else {
        let res = await POST({
            func: "setNewNote",
            header: noteHeaderField,
            body: noteBodyField
        })
        console.log(res)
        if (res != "0") {
            getNotes()
            setVisibility(noteError, false)
            document.querySelector("#noteTitle").value = '';
            document.querySelector("#noteDescription").value = '';
            noteModalAdd.hide()
        } else {
            setVisibility(noteError, true)
            noteBodyField = ""
        }
    }
}

console.log("admin");

let noteModal;
let noteModalAdd

function setNoteModal() {
    noteModal = new bootstrap.Modal(document.querySelector("#notesEditModal"));
    noteModalAdd = new bootstrap.Modal(document.getElementById('notesModal'))

}

let noteID;
let noteHeader;
let noteBody;

function editNotes(elem) {
    noteModal.show()
    let id = elem.id.split("-")[1];
    console.log(id)
    noteID = id;
    noteHeader = document.querySelector("#notesTitle-" + id).innerText
    noteBody = document.querySelector("#notesBody-" + id).innerText
    let noteHeaderField = document.querySelector("#noteEditTitle")
    let noteBodyField = document.querySelector("#noteEditDescription")
    noteHeaderField.value = noteHeader
    noteBodyField.value = noteBody
}

async function setNoteEdit() {
    let noteHeaderField = document.querySelector("#noteEditTitle").value
    let noteBodyField = document.querySelector("#noteEditDescription").value
    let noteError = document.querySelector("#notesEditError")
    if (noteBodyField == "" && noteHeaderField == "") {
        setVisibility(noteError, true)
    } else {
        console.log(`${noteHeader} == ${noteHeaderField}`)
        console.log(`${noteBody} == ${noteBodyField}`)
        console.log(noteHeader != noteHeaderField && noteBody != noteBodyField)
        if (noteHeader != noteHeaderField || noteBody != noteBodyField) {
            let res = await POST({
                func: "setNoteEdit",
                id: noteID,
                header: noteHeaderField,
                body: noteBodyField
            })
            console.log(res)
            if (res != "0") {
                getNotes()
                setVisibility(noteError, false)
                noteModal.hide()
            } else {
                setVisibility(noteError, true)
            }
        } else {
            noteModal.hide()
        }
    }
}

function delNote(elem) {
    let id = elem.id.split("-")[1];
    noteID = id;
}

async function setNoteDelete() {
    let res = await POST({
        func: "setNoteDelete",
        id: noteID
    });
    if (res != "0") {
        getNotes()
    } else {
        alert("Error: Note not deleted")
    }
}

async function getActiveUserTotal() {
    let res = await GET("getActiveUserTotal", {});
    if (res != 0) {
        try{
            document.querySelector("#totalTeachers").innerText = res.totalTeachers
            document.querySelector("#totalStudents").innerText = res.totalStudents
            document.querySelector("#totalParents").innerText = res.totalParents
        }catch{}
        document.querySelector("#infoTotalTeachers").innerHTML = res.totalTeachers
        document.querySelector("#infoTotalStudents").innerHTML = res.totalStudents
        document.querySelector("#infoTotalParents").innerHTML = res.totalParents
    }
}

let accountCount = 0;
let accountSort = ""
let accountRole = "student"
let accountTotal = 0;
async function setStudentTable() {
    document.querySelector("#radioStudent").checked = true;
    document.querySelector("#accountsSort").innerHTML = `
    <option value="LRN">LRN</option>
    <option value="last_name">Last Name</option>
    <option value="first_name">First Name</option>
    <option value="middle_name">Middle Name</option>
    <option value="grade_level">Grade Level</option>
    <option value="section">Section</option>
    <option value="active">Status</option>`;
    document.querySelector("#accountsTableHeader").innerHTML = `
    <th scope="col">LRN</th>
    <th scope="col">Last</th>
    <th scope="col">First</th>
    <th scope="col">Middle</th>
    <th scope="col">Grade</th>
    <th scope="col">Section</th>
    <th scope="col">Status</th>`;
    await getStudentAccounts()
}

async function getStudentAccounts(counts = 0, sorts = "") {
    document.querySelector("#accountsPaginationCount").innerText = counts + 1;
    accountCount = counts;
    accountSort = sorts;
    accountRole = "student"
    let table = document.querySelector("#accountsTable");
    table.innerHTML = ""
    if (accountSort == "") {
        accountSort = "LRN"
    }
    let res = await GET("getStudentAccounts", {
        count: accountCount,
        sort: accountSort
    });
    if (res != 0) {
        accountTotal = res[0].total
        res.forEach(item => {
            let active = "";
            let label = "Active";
            if (item.active == 1) {
                active = ""
                label = "Active";
            } else {
                active = "account-inactive"
                label = "Inactive";
            }
            table.innerHTML += `
            <tr>
                <th scope="row">${item.LRN}</th>
                <td>${item.last_name}</td>
                <td>${item.first_name}</td>
                <td>${item.middle_name}</td>
                <td>${item.grade_level}</td>
                <td>${item.section}</td>
                <td><button class="spma-button-2 text-white p-0 ${active}" onclick="setActive(this, ${item.ID}, '${accountRole}')"><small>${label}</small></button></td>
            </tr>`;
        });
    } else {
        console.log(res)
    }
}

async function setParentTable() {
    document.querySelector("#radioParent").checked = true;
    document.querySelector("#accountsSort").innerHTML = `
    <option value="child_lrn">Child's LRN</option>
    <option value="last_name">Last Name</option>
    <option value="first_name">First Name</option>
    <option value="middle_name">Middle Name</option>
    <option value="contact_number">Grade Level</option>
    <option value="active">Status</option>`;
    document.querySelector("#accountsTableHeader").innerHTML = `
    <th scope="col">Child's LRN</th>
    <th scope="col">Last</th>
    <th scope="col">First</th>
    <th scope="col">Middle</th>
    <th scope="col">Contact No.</th>
    <th scope="col">Status</th>`;
    await getParentAccounts()
}

async function getParentAccounts(counts = 0, sorts = "") {
    document.querySelector("#accountsPaginationCount").innerText = counts + 1;
    accountCount = counts;
    accountSort = sorts;
    accountRole = "parent"
    let table = document.querySelector("#accountsTable");
    table.innerHTML = ""
    if (accountSort == "") {
        accountSort = "child_lrn"
    }
    let res = await GET("getParentAccounts", {
        count: accountCount,
        sort: accountSort
    });
    if (res != 0) {
        accountTotal = res[0].total
        console.log(accountTotal)
        res.forEach(item => {
            let active = "";
            let label = "Active";
            if (item.active == 1) {
                active = ""
                label = "Active";
            } else {
                active = "account-inactive"
                label = "Inactive";
            }
            table.innerHTML += `
            <tr>
                <th scope="row">${item.child_lrn}</th>
                <td>${item.last_name}</td>
                <td>${item.first_name}</td>
                <td>${item.middle_name}</td>
                <td>${item.contact_number}</td>
                <td><button class="spma-button-2 text-white p-0 ${active}" onclick="setActive(this, ${item.ID}, '${accountRole}')"><small>${label}</small></button></td>
            </tr>`;
        });
    } else {
        console.log(res)
    }
}

async function setTeacherTable() {
    document.querySelector("#radioTeacher").checked = true;
    document.querySelector("#accountsSort").innerHTML = `
    <option value="ID">ID</option>
    <option value="employee_no">Employee Number</option>
    <option value="last_name">Last Name</option>
    <option value="first_name">First Name</option>
    <option value="middle_name">Middle Name</option>
    <option value="active">Status</option>`;
    document.querySelector("#accountsTableHeader").innerHTML = `
    <th scope="col">ID</th>
    <th scope="col">Employee No.</th>
    <th scope="col">Last</th>
    <th scope="col">First</th>
    <th scope="col">Middle</th>
    <th scope="col">Status</th>`;
    getTeacherAccounts()
}

async function getTeacherAccounts(counts = 0, sorts = "") {
    document.querySelector("#accountsPaginationCount").innerText = counts + 1;
    accountCount = counts;
    accountSort = sorts;
    accountRole = "teacher"
    let table = document.querySelector("#accountsTable");
    table.innerHTML = ""
    if (accountSort == "") {
        accountSort = "ID"
    }
    let res = await GET("getTeacherAccounts", {
        count: accountCount,
        sort: accountSort
    });
    if (res != 0) {
        accountTotal = res[0].total
        console.log(accountTotal)
        res.forEach(item => {
            let active = "";
            let label = "Active";
            if (item.active == 1) {
                active = ""
                label = "Active";
            } else {
                active = "account-inactive"
                label = "Inactive";
            }
            table.innerHTML += `
            <tr>
                <th scope="row">${item.ID}</th>
                <td>${item.employee_no}</td>
                <td>${item.last_name}</td>
                <td>${item.first_name}</td>
                <td>${item.middle_name}</td>
                <td><button class="spma-button-2 text-white p-0 ${active}" onclick="setActive(this, ${item.ID}, '${accountRole}')"><small>${label}</small></button></td>
            </tr>`;
        });
    } else {
        console.log(res)
    }
}

async function setActive(elem, IDs, role) {
    let active;
    elem.classList.contains("account-inactive") ? active = 1 : active = 0;
    let res = await POST({
        func: "setActive",
        ID: IDs,
        role: role,
        active: active
    }).then(res => {
        if (res != "0") {
            if (elem.classList.contains("account-inactive")) {
                elem.classList.remove("account-inactive");
                elem.innerHTML = "<small>Active</small>"
            } else {
                elem.classList.add("account-inactive");
                elem.innerHTML = "<small>Inactive</small>"
            }
        }
    })
}

function accountPagination(direction) {
    let limit = 50;
    switch (accountRole) {
        case "student":
            if (direction == "start" && accountCount != 0) {
                getStudentAccounts(0, accountSort)
            } else if (direction == "previous" && accountCount != 0) {
                getStudentAccounts(accountCount - 1, accountSort)
            } else if (direction == "next" && accountCount < Math.floor(accountTotal / limit)) {
                getStudentAccounts(accountCount + 1, accountSort)
            } else if (direction == "end" && accountCount < Math.floor(accountTotal / limit)) {
                getStudentAccounts(Math.ceil((accountCount + 1) / limit), accountSort)
            }
            break;
        case "parent":
            if (direction == "start" && accountCount != 0) {
                getParentAccounts(0, accountSort)
            } else if (direction == "previous" && accountCount != 0) {
                getParentAccounts(accountCount - 1, accountSort)
            } else if (direction == "next" && accountCount < Math.floor(accountTotal / limit)) {
                getParentAccounts(accountCount + 1, accountSort)
            } else if (direction == "end" && accountCount < Math.floor(accountTotal / limit)) {
                getParentAccounts(Math.ceil((accountCount + 1) / limit), accountSort)
            }
            break;
        case "teacher":
            if (direction == "start" && accountCount != 0) {
                getTeacherAccounts(0, accountSort)
            } else if (direction == "previous" && accountCount != 0) {
                getTeacherAccounts(accountCount - 1, accountSort)
            } else if (direction == "next" && accountCount < Math.floor(accountTotal / limit)) {
                getTeacherAccounts(accountCount + 1, accountSort)
            } else if (direction == "end" && accountCount < Math.floor(accountTotal / limit)) {
                getTeacherAccounts(Math.ceil((accountCount + 1) / limit), accountSort)
            }
            break;
        default:
            break;
    }
}

function sortAccounts(value) {
    switch (accountRole) {
        case "student":
            getStudentAccounts(0, value)
            break;
        case "parent":
            getParentAccounts(0, value)
            break;
        case "teacher":
            getTeacherAccounts(0, value)
            break;
        default:
            break;
    }
}

let resetCount = 0;
let resetSort = ""
let resetRole = "student"
let resetTotal = 0;
async function setResetTable(role) {
    if (role == "student") {
        document.querySelector("#radioStudent").checked = true;
        document.querySelector("#resetsSort").innerHTML = `
        <option value="LRN">LRN</option>
        <option value="last_name">Last Name</option>
        <option value="first_name">First Name</option>
        <option value="middle_name">Middle Name</option>
        <option value="grade_level">Grade Level</option>
        <option value="section">Section</option>
        <option value="reset">Resets</option>`;
        document.querySelector("#resetsTableHeader").innerHTML = `
        <th scope="col">LRN</th>
        <th scope="col">Last</th>
        <th scope="col">First</th>
        <th scope="col">Middle</th>
        <th scope="col">Grade</th>
        <th scope="col">Section</th>
        <th scope="col">Status</th>`;
        await getStudentResets()
    } else if (role == "parent") {
        document.querySelector("#radioParent").checked = true;
        document.querySelector("#resetsSort").innerHTML = `
        <option value="child_lrn">Child's LRN</option>
        <option value="last_name">Last Name</option>
        <option value="first_name">First Name</option>
        <option value="middle_name">Middle Name</option>
        <option value="contact_number">Grade Level</option>
        <option value="reset">Resets</option>`;
        document.querySelector("#resetsTableHeader").innerHTML = `
        <th scope="col">Child's LRN</th>
        <th scope="col">Last</th>
        <th scope="col">First</th>
        <th scope="col">Middle</th>
        <th scope="col">Contact No.</th>
        <th scope="col">Status</th>`;
        await getParentResets()
    } else if (role == "teacher") {
        document.querySelector("#radioTeacher").checked = true;
        document.querySelector("#resetsSort").innerHTML = `
        <option value="ID">ID</option>
        <option value="employee_no">Employee Number</option>
        <option value="last_name">Last Name</option>
        <option value="first_name">First Name</option>
        <option value="middle_name">Middle Name</option>
        <option value="reset">Resets</option>`;
        document.querySelector("#resetsTableHeader").innerHTML = `
        <th scope="col">ID</th>
        <th scope="col">Employee No.</th>
        <th scope="col">Last</th>
        <th scope="col">First</th>
        <th scope="col">Middle</th>
        <th scope="col">Status</th>`;
        await getTeacherResets()
    }
}

async function getStudentResets(counts = 0, sorts = "") {
    document.querySelector("#resetPaginationCount").innerText = counts + 1;
    resetCount = counts;
    resetSort = sorts;
    resetRole = "student"
    let table = document.querySelector("#resetsTable");
    table.innerHTML = ""
    if (resetSort == "") {
        resetSort = "date"
    }
    let res = await GET("getResets", {
        count: resetCount,
        sort: resetSort,
        role: resetRole
    });
    if (resCheck(res, "GET")) {
        console.log(res)
        resetTotal = res[0].total
        res.forEach(item => {
            let active = "";
            let disabler = ""
            if (item.reset == 1) {
                disabler = ""
                active = ""
            } else {
                disabler = "disabled";
                active = "account-inactive"
            }
            table.innerHTML += `
            <tr>
                <th scope="row">${item.LRN}</th>
                <td>${item.last_name}</td>
                <td>${item.first_name}</td>
                <td>${item.middle_name}</td>
                <td>${item.grade_level}</td>
                <td>${item.section}</td>
                <td><button class="spma-button-2 text-white p-0 ${active}" ${disabler} onclick="setReset(this, ${item.ID}, '${item.LRN}','${accountRole}')"><small>Reset</small></button></td>
            </tr>`;
        });
    } else {
        console.log(res)
    }
}

async function getParentResets(counts = 0, sorts = "") {
    document.querySelector("#resetPaginationCount").innerText = counts + 1;
    resetCount = counts;
    resetSort = sorts;
    resetRole = "parent"
    let table = document.querySelector("#resetsTable");
    table.innerHTML = ""
    if (resetSort == "") {
        resetSort = "date"
    }
    let res = await GET("getResets", {
        count: resetCount,
        sort: resetSort,
        role: resetRole
    });
    if (resCheck(res, "GET")) {
        resetTotal = res[0].total
        res.forEach(item => {
            let active = "";
            let disabler = ""
            if (item.reset == 1) {
                disabler = ""
                active = ""
            } else {
                disabler = "disabled";
                active = "account-inactive"
            }
            table.innerHTML += `
            <tr>
                <th scope="row">${item.child_lrn}</th>
                <td>${item.last_name}</td>
                <td>${item.first_name}</td>
                <td>${item.middle_name}</td>
                <td>${item.contact_number}</td>
                <td><button class="spma-button-2 text-white p-0 ${active}" ${disabler} onclick="setReset(this, ${item.ID}, '${item.child_lrn}','${resetRole}')"><small>Reset</small></button></td>
            </tr>`;
        });
    } else {
        console.log(res)
    }
}

async function getTeacherResets(counts = 0, sorts = "") {
    document.querySelector("#resetPaginationCount").innerText = counts + 1;
    resetCount = counts;
    resetSort = sorts;
    resetRole = "teacher"
    let table = document.querySelector("#resetsTable");
    table.innerHTML = ""
    if (resetSort == "") {
        resetSort = "date"
    }
    let res = await GET("getResets", {
        count: resetCount,
        sort: resetSort,
        role: resetRole
    });
    if (resCheck(res, "GET")) {
        console.log(res)
        resetTotal = res[0].total
        res.forEach(item => {
            let active = "";
            let disabler = ""
            if (item.reset == 1) {
                disabler = ""
                active = ""
            } else {
                disabler = "disabled";
                active = "account-inactive"
            }
            table.innerHTML += `
            <tr>
                <th scope="row">${item.ID}</th>
                <td>${item.employee_no}</td>
                <td>${item.last_name}</td>
                <td>${item.first_name}</td>
                <td>${item.middle_name}</td>
                <td><button class="spma-button-2 text-white p-0 ${active}" ${disabler} onclick="setReset(this, ${item.ID}, '${item.employee_no}','${resetRole}')"><small>Reset</small></button></td>
            </tr>`;
        });
    } else {
        console.log(res)
    }
}

async function setReset(elem, id, info, role) {
    if (!elem.classList.contains("account-inactive")) {
        let res = await POST({
            func: "setResetPassword",
            id: id,
            info: info,
            role: role
        })
        console.log(res)
        if (resCheck(res, "POST")) {
            elem.classList.add("account-inactive");
            elem.setAttribute("disabled", true)
        }
    }
}

async function sortResets(value) {
    switch (accountRole) {
        case "student":
            getStudentResets(0, value)
            break;
        case "parent":
            getParentResets(0, value)
            break;
        case "teacher":
            getTeacherResets(0, value)
            break;
        default:
            break;
    }
}

async function resetPagination(direction) {
    let limit = 50;
    switch (resetRole) {
        case "student":
            if (direction == "start" && resetCount != 0) {
                getStudentResets(0, resetSort)
            } else if (direction == "previous" && resetCount != 0) {
                getStudentResets(resetCount - 1, resetSort)
            } else if (direction == "next" && resetCount < Math.floor(resetTotal / limit)) {
                getStudentResets(resetCount + 1, resetSort)
            } else if (direction == "end" && resetCount < Math.floor(resetTotal / limit)) {
                getStudentResets(Math.ceil((resetCount + 1) / limit), resetSort)
            }
            break;
        case "parent":
            if (direction == "start" && resetCount != 0) {
                getParentResets(0, resetSort)
            } else if (direction == "previous" && resetCount != 0) {
                getParentResets(resetCount - 1, resetSort)
            } else if (direction == "next" && resetCount < Math.floor(resetTotal / limit)) {
                getParentResets(resetCount + 1, resetSort)
            } else if (direction == "end" && resetCount < Math.floor(resetTotal / limit)) {
                getParentResets(Math.ceil((resetCount + 1) / limit), resetSort)
            }
            break;
        case "teacher":
            if (direction == "start" && resetCount != 0) {
                getTeacherResets(0, resetSort)
            } else if (direction == "previous" && resettCount != 0) {
                getTeacherResets(resetCount - 1, resetSort)
            } else if (direction == "next" && resetCount < Math.floor(resetTotal / limit)) {
                getTeacherResets(resetCount + 1, resetSort)
            } else if (direction == "end" && resetCount < Math.floor(resetTotal / limit)) {
                getTeacherResets(Math.ceil((resetCount + 1) / limit), resetSort)
            }
            break;
        default:
            break;
    }
}


let eventModal;
let eventModalEdit;
let eventModalDelete;

function setEventModal() {
    eventModal = new bootstrap.Modal(document.querySelector("#eventModal"));
    eventModalEdit = new bootstrap.Modal(document.getElementById('eventEditModal'))
    eventModalDelete = new bootstrap.Modal(document.getElementById('eventDelete'))
}

function showEventModal() {
    eventModal.show()
}
let eventsList = {};
async function getEvents() {
    let container = document.querySelector("#eventsContainer");
    let res = await GET("getEvents", {})
    if (resCheck(res, "GET")) {
        container.innerHTML = '';
        eventsList = res;
        console.log(res)
        let count = 0;
        res.forEach(item => {
            container.innerHTML += `
            <div class="container bg-white border rounded-3 text-darkish row m-0 py-1 pe-0 mb-2">
                <div class="fw-bold align-self-center col-4"> 
                    <i class="bi bi-calendar2-event"></i> &nbsp; ${convertDateTime(item.date)}
                </div>
                <div class="ps-2 col-7" style="border-left: 5px ${item.color} solid;">
                    <small class="test-truncate m-0 text-darkish">${item.holiday}</small>
                    <p class="test-truncate m-0 text-darkish fw-bold" title="${item.holiday_info}">${item.holiday_info}</p>
                </div>
                <div class="border-start px-2 col-1">
                    <button class="spma-button-2-primary text-white p-0 mb-1" onclick="showEventModalEdit(${count})"><i class="bi bi-pencil-square"></i></button>
                    <button class="spma-button-2-danger text-white p-0" data-bs-toggle="modal" data-bs-target="#eventDelete" onclick="setEventDeleteParam(${item.ID})"><i class="bi bi-trash3"></i></button>
                </div>
            </div>`
            count++;
        });
    } else {
        console.log(res)
    }
}

async function setEvent() {
    let date = document.querySelector("#eventDate").value
    let color = document.querySelector("#eventColor").value
    let category = document.querySelector("#eventCategory").value
    let name = document.querySelector("#eventName").value
    let error = document.querySelector("#eventError")
    if (date && color && category && name) {
        setVisibility(error, false)
        let res = await POST({
            func: "setEvent",
            date: date,
            color: color,
            category: category,
            name: name
        })
        if (resCheck(res, "POST")) {
            getEvents();
            eventModal.hide()
        } else {
            console.log(res)
        }
    } else {
        setVisibility(error, true)
    }
}

let eventSelectedItem = {};

function showEventModalEdit(ID) {
    let data = eventsList[ID]
    eventSelectedItem = eventsList[ID]
    console.log(data)
    let date = document.querySelector("#eventEditDate")
    date.value = data.date
    let color = document.querySelector("#eventEditColor")
    color.value = data.color
    let holiday = document.querySelector("#eventEditCategory")
    holiday.value = data.holiday
    let holiday_info = document.querySelector("#eventEditName")
    holiday_info.value = data.holiday_info
    eventModalEdit.show()
    // setEventEdit(ID)
}

async function setEventEdit() {
    let item = eventSelectedItem;
    let date = document.querySelector("#eventEditDate").value
    let color = document.querySelector("#eventEditColor").value
    let category = document.querySelector("#eventEditCategory").value
    let name = document.querySelector("#eventEditName").value
    let error = document.querySelector("#eventEditError")
    if (date && color && category && name) {
        if (date == item.date && color == item.color && name == item.holiday && category == item.holiday_info) {
            eventModalEdit.hide()
        } else {
            setVisibility(error, false)
            let res = await POST({
                func: "setEventEdit",
                id: item.ID,
                date: date,
                color: color,
                category: category,
                name: name
            })
            if (resCheck(res, "POST")) {
                getEvents();
                eventModalEdit.hide()
            } else {
                console.log(res)
            }
        }
    } else {
        setVisibility(error, true)
    }
}

function setEventDeleteParam(id) {
    document.querySelector("#eventDeleteYes").setAttribute("onclick", "setEventDelete(" + id + ")");
}

async function setEventDelete(id) {
    let res = await POST({
        func: "setEventDelete",
        id: id
    })
    if (resCheck(res, "POST")) {
        getEvents()
    } else {
        console.log(res)
    }
}


let classModalSuccess;
let classModalDelete;

function setClassModal() {
    classModalSuccess = new bootstrap.Modal(document.querySelector("#classSuccess"));
    classModalDelete = new bootstrap.Modal(document.querySelector("#classDelete"));
}

async function getSubjects(grade = 0) {
    let res = await GET("getSubjects", {
        grade: grade
    });
    if (resCheck(res, "GET")) {
        console.log(res)
        if (grade != 0) {
            document.querySelector(`#grade${grade}-Subjects`).innerHTML = ''
        }
        res.forEach(item => {
            document.querySelector(`#grade${item.grade_level}-Subjects`).innerHTML += `
            <li class="list-group-item list-group-item-action d-flex pe-1 justify-content-between" id="subject-${item.ID}">
                <div class="test-truncate align-self-center"><small> ${item.subject_name} </small></div>
                <div class="btn btn-danger px-1 text-white ms-2 p-0" onclick="subjectDelete(${item.grade_level}, '${item.subject_name}', ${item.ID})"><small><i class="bi bi-trash-fill"></i></small></div>
            </li>`;
        });
    } else {
        console.log(res)
    }
}

async function setNewSubject() {
    let grade = document.querySelector("#subjectGrade").value;
    let subject = document.querySelector("#subjectName").value;
    let error = document.querySelector("#subjectError");
    let errorMsg = document.querySelector("#subjectErrorMsg");
    let successMsg = document.querySelector("#classSuccessMsg");
    if (grade && subject) {
        let res = await POST({
            func: "setNewSubject",
            grade: grade,
            subject: subject
        });
        if (resCheck(res, "POST")) {
            classModalSuccess.show()
            successMsg.innerText = `${subject} successfully added to Grade ${grade}`;
            document.querySelector("#subjectGrade").value = "";
            document.querySelector("#subjectName").value = "";
            setVisibility(document.querySelector("#subjectError"), false)
            getSubjects(grade);
            setVisibility(error, false);
        } else {
            errorMsg.innerText = "Something went wrong"
            setVisibility(error, true);
        }
    } else {
        setVisibility(error, true);
    }
}

function subjectDelete(grade, name, ID) {
    document.querySelector("#classDeleteMsg").innerHTML = `Are you sure you want to remove <i> ${name}</i> from Grade ${grade}?`;
    document.querySelector("#classDeleteYes").setAttribute("onclick", `setSubjectDelete(${ID},'${name}',${grade})`)
    classModalDelete.show()
}

async function setSubjectDelete(ID, name, grade) {
    let successMsg = document.querySelector("#classSuccessMsg");
    let res = await POST({
        func: "setSubjectDelete",
        ID: ID
    })
    if (resCheck(res, "POST")) {
        classModalSuccess.show();
        successMsg.innerText = `${name} successfully removed from Grade ${grade}`;
        document.querySelector(`#subject-${ID}`).remove()
        getSubjects(grade);
    } else {
        console.log(res)
    }
}

async function getSections(grade = 0) {
    let res = await GET("getSections", {
        grade: grade
    });
    if (resCheck(res, "GET")) {
        if (grade != 0) {
            document.querySelector(`#grade${grade}-Sections`).innerHTML = ''
        }
        res.forEach(item => {
            document.querySelector(`#grade${item.grade_level}-Sections`).innerHTML += `
            <li class="list-group-item list-group-item-action d-flex pe-1 justify-content-between" id="section-${item.ID}">
                <div class="test-truncate align-self-center"><small> ${item.section_name} </small></div>
                <div class="btn btn-danger px-1 text-white ms-2 p-0" onclick="sectionDelete(${item.grade_level}, '${item.section_name}', ${item.ID})"><small><i class="bi bi-trash-fill"></i></small></div>
            </li>`;
        });
    } else {
        console.log(res)
    }
}

async function setNewSection() {
    let grade = document.querySelector("#sectionGrade").value;
    let section = document.querySelector("#sectionName").value;
    let error = document.querySelector("#sectionError");
    let errorMsg = document.querySelector("#sectionErrorMsg");
    let successMsg = document.querySelector("#classSuccessMsg");
    if (grade && section) {
        let res = await POST({
            func: "setNewSection",
            grade: grade,
            section: section
        });
        if (resCheck(res, "POST")) {
            successMsg.innerHTML = `<i>${section}</i> successfully added to Grade ${grade}`;
            classModalSuccess.show()
            console.log(successMsg)
            document.querySelector("#sectionGrade").value = "";
            document.querySelector("#sectionName").value = "";
            // setVisibility(document.querySelector("#sectionError"), false)
            getSections(grade);
            setVisibility(error, false);
        } else {
            errorMsg.innerText = "Something went wrong"
            setVisibility(error, true);
        }
    } else {
        setVisibility(error, true);
    }
}

function sectionDelete(grade, name, ID) {
    document.querySelector("#classDeleteMsg").innerHTML = `Are you sure you want to remove <i> ${name}</i> from Grade ${grade}?`;
    document.querySelector("#classDeleteYes").setAttribute("onclick", `setSectionDelete(${ID},'${name}',${grade})`)
    classModalDelete.show()
}

async function setSectionDelete(ID, name, grade) {
    let successMsg = document.querySelector("#classSuccessMsg");
    let res = await POST({
        func: "setSectionDelete",
        ID: ID
    })
    if (resCheck(res, "POST")) {
        classModalSuccess.show();
        successMsg.innerText = `${name} successfully removed from Grade ${grade}`;
        document.querySelector(`#section-${ID}`).remove()
        getSections(grade);
    } else {
        console.log(res)
    }
}

let teacherSections;
let teacherSubjects;
// let teacherHandles;
let teachers;
async function getTeachersClass() {
    let res = await GET("getTeachersClass", {});
    let count = 0;
    document.querySelector("#teacherList").innerHTML = '';
    if (resCheck(res, "GET")) {
        setVisibility(document.querySelector("#teacherError"), false)
        teachers = res;
        let handles = await GET("getTeachersHandledClass", {});
        console.log(handles)
        await res.forEach(teacher => {
            document.querySelector("#teacherList").innerHTML += `
            <h2 class="accordion-header" id="flush-heading${teacher.ID}" onclick="selectTeacher('${teacher.last_name}, ${teacher.first_name}', ${count})">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse${teacher.ID}" aria-expanded="false" aria-controls="flush-collapse${teacher.ID}">
                    <div class="fs-5"><i class="bi bi-folder me-2"></i></div>
                    <div class="test-truncate">${teacher.last_name}, ${teacher.first_name}</div>
                </button>
            </h2>
            <div id="flush-collapse${teacher.ID}" class="accordion-collapse collapse"
                aria-labelledby="flush-heading${teacher.ID}" data-bs-parent="#accordionFlushExamples">
                <div class="accordion-body p-2 pe-0 d-flex">
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Subject</th>
                                <th scope="col">Grade</th>
                                <th scope="col">Section</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody id="teacherhandle-${teacher.ID}">
                        </tbody>
                    </table>
                </div>
            </div>`
            count++;
        });
        await handles.forEach(element => {
            document.querySelector("#teacherhandle-"+element.teacher_ID).innerHTML+=`
                <tr>
                    <td>${element.subject_name}</td>
                    <td>${element.grade_level}</td>
                    <td>${element.section_name}</td>
                    <td><div class="btn btn-danger px-1 text-white ms-2 p-0" onclick="askTeacherHandleRemove(${element.teacher_ID}, ${element.ID}, '${element.subject_name}', '${element.section_name}', '${element.grade_level}')"><small><i class="bi bi-trash-fill"></i></small></div></td>
                </tr>`
        });
    }
}

function clearTeacherClass() {
    let gradeSelect = document.querySelector("#teacherGrade")
    let sectionSelect = document.querySelector("#teacherSection");
    let subjectSelect = document.querySelector("#teacherSubject");
    gradeSelect.value = ""
    sectionSelect.value = ""
    subjectSelect.value = ""
    disable(sectionSelect, true)
    disable(subjectSelect, true)
    document.querySelector("#teacherName").innerHTML = "<u>Teacher's Name</u>"
}

function selectTeacher(teacher_name, teacher_id) {
    clearTeacherClass()
    document.querySelector("#teacherName").innerHTML = `<u>${teacher_name}</u>`
    document.querySelector("#teacherSubmit").setAttribute("onclick", "setTeacherAddHandles(" + teachers[teacher_id].ID + ")");
    disable(document.querySelector("#teacherGrade"), false)
}

async function assignSectionAndSubjectStep(elem) {
    let sectionSelect = document.querySelector("#teacherSection");
    let subjectSelect = document.querySelector("#teacherSubject");
    setVisibility(document.querySelector("#teacherError"), false)
    if (elem.id == "teacherGrade" && elem.value != '') {
        if (setTeacherSections(elem.value)) {
            disable(sectionSelect, false);
        } else {
            disable(sectionSelect, true);
        }
        if (setTeacherSubjects(elem.value)) {
            disable(subjectSelect, false);
        } else {
            disable(subjectSelect, true);
        }
    } else if (elem.id == "teacherGrade" && elem.value == '') {
        disable(sectionSelect, true);
        disable(subjectSelect, true);
    }
}

function setTeacherSections(grade) {
    document.querySelector('#teacherSection').innerHTML = `<option selected value="">Select section</option>`
    try {
        teacherSections[grade].forEach(element => {
            document.querySelector('#teacherSection').innerHTML += `<option value="${element[1]}">${element[0]}</option>`
        });
        return true;
    } catch (TypeError) {
        alert("There are currently no sections in Grade " + grade)
        return false;
    }
}

function setTeacherSubjects(grade) {
    document.querySelector('#teacherSubject').innerHTML = `<option selected value="">Select subject</option>`
    try {
        teacherSubjects[grade].forEach(element => {
            document.querySelector('#teacherSubject').innerHTML += `<option value="${element[1]}">${element[0]}</option>`
        });
        return true;
    } catch (TypeError) {
        alert("There are currently no subjects in Grade " + grade)
        return false;
    }
}

async function getTeacherSectionsAndSubjects(grade) {
    let section = await GET("getTeacherSections", {
        grade: grade
    });
    let subject = await GET("getTeacherSubjects", {
        grade: grade
    });
    console.log(subject)
    console.log(section)
    teacherSections = section
    teacherSubjects = subject
}

async function setTeacherAddHandles(ID) {
    let sectionSelect = document.querySelector("#teacherSection").value;
    let subjectSelect = document.querySelector("#teacherSubject").value;
    let gradeSelect = document.querySelector("#teacherGrade").value;
    if (sectionSelect && subjectSelect && gradeSelect) {
        let res = await POST({
            func: "setTeacherAddHandles",
            ID : ID,
            section : sectionSelect,
            subject: subjectSelect,
            grade : gradeSelect
        })
        if(resCheck(res, "POST")){
            clearTeacherClass()
            getTeachersClass()
        }else{
            console.log(res)
        }
    } else {
        setVisibility(document.querySelector("#teacherError"), true)
    }
}

function askTeacherHandleRemove(ID, handle_ID, subject, section, grade) {
    let removeTeacher = teachers[ID]
    // let handle = JSON.parse(removeTeacher.handle)[handleKey]
    classModalDelete.show()
    document.querySelector("#classDeleteMsg").innerHTML = `Are you sure you want <i> ${removeTeacher.first_name} ${removeTeacher.last_name} </i> to unhandle <u>${subject} of ${grade}-${section}</u>?`;
    document.querySelector("#classDeleteYes").setAttribute("onclick", `setTeacherDeleteHandle(${handle_ID})`);
}

async function setTeacherDeleteHandle(ID) {
    let res = await POST({
        func: "setTeacherDeleteHandle",
        ID: ID
    })
    if(resCheck(res, "POST")){
        getTeachersClass()
    }else{console.log}
}

function switchClassManager(elem) {
    let container = document.querySelector("#tab-content");
    let val = elem.id;
    if (!elem.classList.contains("switch-select")) {
        console.log(currentClassManager)
        if (val == "switchSubject") {
            fetch("grades.php")
                .then(response => response.text())
                .then(text => {
                    container.innerHTML = text
                    let switcher = document.querySelector(".class-switch");
                    switcher.innerHTML = `<div class="rounded-pill me-1 p-1 w-50 text-center pointer text-white position-relative switch-select switch-left" onclick="switchClassManager(this)" id="switchSubject">
                <div>Subjects Manager</div>    
                </div>
                <div class="rounded-pill p-1 w-50 text-center pointer text-white position-relative" onclick="switchClassManager(this)" id="switchSection">
                    <div> Sections Manager </div>
                </div>
                <div class="rounded-pill ms-1 p-1 w-50 text-center pointer text-white position-relative" onclick="switchClassManager(this)" id="switchTeacher">
                    <div> Teacher Manager </div>
                </div>`;
                    currentClassManager = val;
                    getSubjects()
                    setClassModal()
                })
        } else if (val == "switchSection") {
            fetch("sections.php")
                .then(response => response.text())
                .then(text => {
                    container.innerHTML = text
                    let switcher = document.querySelector(".class-switch");
                    let dir = "right";
                    currentClassManager == "switchSubject" ? dir = "right" : dir = "left";
                    switcher.innerHTML = `<div class="rounded-pill me-1 p-1 w-50 text-center pointer text-white position-relative " onclick="switchClassManager(this)" id="switchSubject">
                <div>Subjects Manager</div>    
                </div>
                <div class="rounded-pill p-1 w-50 text-center pointer text-white position-relative switch-select switch-${dir}" onclick="switchClassManager(this)" id="switchSection">
                    <div> Sections Manager </div>
                </div>
                <div class="rounded-pill ms-1 p-1 w-50 text-center pointer text-white position-relative" onclick="switchClassManager(this)" id="switchTeacher">
                    <div> Teacher Manager </div>
                </div>`;
                    currentClassManager = val;
                    getSections()
                    setClassModal()
                })
        } else {
            fetch("teachers.php")
                .then(response => response.text())
                .then(text => {
                    container.innerHTML = text
                    let switcher = document.querySelector(".class-switch");
                    switcher.innerHTML = `<div class="rounded-pill me-1 p-1 w-50 text-center pointer text-white position-relative"
                onclick="switchClassManager(this)" id="switchSubject">
                <div>Subjects Manager</div>
                </div>
                <div class="rounded-pill p-1 w-50 text-center pointer text-white position-relative" onclick="switchClassManager(this)" id="switchSection">
                    <div> Sections Manager </div>
                </div>
                <div class="rounded-pill ms-1 p-1 w-50 text-center pointer text-white position-relative switch-select switch-right"
                    onclick="switchClassManager(this)" id="switchTeacher">
                    <div>Teacher Manager</div>
                </div>`;
                    currentClassManager = val;
                    getTeachersClass()
                    getTeacherSectionsAndSubjects()
                    setClassModal()
                })
        }
    }
}
let addModalSuccess;
let addModalDanger;
function setAddModal() {
    addModalSuccess = new bootstrap.Modal(document.querySelector("#addSuccess"));
    addModalDanger = new bootstrap.Modal(document.querySelector("#addDanger"));
}

let sections;
async function getGradeSections(){
    let res = await GET("getGradeSections",{})
    if(resCheck(res, "GET")){
        sections = res;
    }else{console.log(res)}
}

async function setAddStudent() {
    let successModalMsg = document.querySelector("#addSuccessMsg");
    let lastName = document.querySelector("#studentLastName").value;
    let firstName = document.querySelector("#studentFirstName").value;
    let middleName = document.querySelector("#studentMiddleName").value;
    let LRN = document.querySelector("#studentLRN").value;
    let gradeLevel = document.querySelector("#studentGrade").value;
    let section = document.querySelector("#studentSection").value;
    if(lastName && firstName && middleName && LRN && gradeLevel && section){
        console.log(section)
        if(!/^([A-Za-z]+\s?)+$/.test(lastName)){addError(true, 'Invalid last name')}
        else if(!/^([A-Za-z]+\s?)+$/.test(firstName)){addError(true, 'Invalid first name')}
        else if(!/^([A-Za-z]+\s?)+$/.test(middleName)){addError(true, 'Invalid middle name')}
        else if(!/^[0-9]{12}$/.test(LRN)){addError(true, 'Invalid LRN')}
        else if(!(gradeLevel>=7 && gradeLevel<=12)){addError(true, 'Invalid grade level')}
        else if(section==''){addError(true, 'Invalid section')}
        else{
            addError(false)
            if(await checkStudentLRN(LRN.trim())){
                let res = await POST({
                    func: "setAddStudent",
                    lastName: lastName.trim(),
                    firstName: firstName.trim(),
                    middleName: middleName.trim(),
                    LRN: LRN.trim(),
                    gradeLevel: gradeLevel,
                    section: section.trim()
                })
                if(resCheck(res, "POST")){
                    addModalSuccess.show();
                    successModalMsg.innerHTML = `Student: <i>${firstName} ${lastName}</i><br>LRN: <i>${LRN}</i><br> Successfully added to the database`;
                    document.querySelector("#studentLastName").value = ""
                    document.querySelector("#studentFirstName").value = ""
                    document.querySelector("#studentMiddleName").value = ""
                    document.querySelector("#studentLRN").value = ""
                    document.querySelector("#studentGrade").value = ""
                    document.querySelector("#studentSection").value = ""
                }else{
                    addModalDanger.show();
                }
            }else{
                addError(true, `An active student already has the LRN: <i>${LRN}</i> in the database. Please double check your form fields`)
            }
        }
    }else{
        addError(true, 'Do not leave any field empty')
    }
}

let recentStudents;
async function setAddParent() {
    let successModalMsg = document.querySelector("#addSuccessMsg");
    let lastName = document.querySelector("#parentLastName").value;
    let firstName = document.querySelector("#parentFirstName").value;
    let middleName = document.querySelector("#parentMiddleName").value;
    let LRN = document.querySelector("#parentLRN").value;
    let contactNumber = document.querySelector("#parentContactNumber").value;
    if(lastName && firstName && middleName && LRN && contactNumber){
        if(!/^([A-Za-z]+\s?)+$/.test(lastName)){addError(true, 'Invalid last name')}
        else if(!/^([A-Za-z]+\s?)+$/.test(firstName)){addError(true, 'Invalid first name')}
        else if(!/^([A-Za-z]+\s?)+$/.test(middleName)){addError(true, 'Invalid middle name')}
        else if(!/^[0-9]{12}$/.test(LRN)){addError(true, 'Invalid LRN')}
        else if(!/^(09|\+639)\d{9}$/.test(contactNumber)){addError(true, 'Invalid contact number')}
        else{
            addError(false)
            if(await checkStudentLRN(LRN.trim())==false){
                let res = await POST({
                    func: "setAddParent",
                    lastName: lastName.trim(),
                    firstName: firstName.trim(),
                    middleName: middleName.trim(),
                    LRN: LRN.trim(),
                    contactNumber: contactNumber.trim(),
                })
                if(resCheck(res, "POST")){
                    addModalSuccess.show();
                    successModalMsg.innerHTML = `Parent: <i>${firstName} ${lastName}</i><br>Child's LRN: <i>${LRN}</i><br> Successfully added to the database`;
                    document.querySelector("#parentLastName").value = ""
                    document.querySelector("#parentFirstName").value = ""
                    document.querySelector("#parentMiddleName").value = ""
                    document.querySelector("#parentLRN").value = ""
                    document.querySelector("#parentContactNumber").value = ""
                }else{
                    addModalDanger.show();
                }
            }else{
                addError(true, `No active student found with LRN: <i>${LRN}</i> in the database. Please double check your form fields`)
            }
        }
    }else{
        addError(true, 'Do not leave any field empty')
    }
}

async function setAddTeacher() {
    let successModalMsg = document.querySelector("#addSuccessMsg");
    let lastName = document.querySelector("#teacherLastName").value;
    let firstName = document.querySelector("#teacherFirstName").value;
    let middleName = document.querySelector("#teacherMiddleName").value;
    let employeeNumber = document.querySelector("#teacherEmployeeNumber").value;
    let email = document.querySelector("#teacherEmail").value;
    if(lastName && firstName && middleName && employeeNumber && email){
        if(!/^([A-Za-z]+\s?)+$/.test(lastName)){addError(true, 'Invalid last name')}
        else if(!/^([A-Za-z]+\s?)+$/.test(firstName)){addError(true, 'Invalid first name')}
        else if(!/^([A-Za-z]+\s?)+$/.test(middleName)){addError(true, 'Invalid middle name')}
        else if(!/^[0-9]+$/.test(employeeNumber)){addError(true, 'Invalid employee number')}
        else if(!ValidateEmail(email)){addError(true, 'Invalid email address')}
        else{
            addError(false)
            if(await checkTeacherEmployeeNum(employeeNumber.trim())){
                let res = await POST({
                    func: "setAddTeacher",
                    lastName: lastName.trim(),
                    firstName: firstName.trim(),
                    middleName: middleName.trim(),
                    employeeNumber: employeeNumber.trim(),
                    email: email.trim()
                })
                if(resCheck(res, "POST")){
                    addModalSuccess.show();
                    successModalMsg.innerHTML = `Teacher: <i>${firstName} ${lastName}</i><br>Employee Number: <i>${employeeNumber}</i><br> Successfully added to the database`;
                    document.querySelector("#teacherLastName").value = ""
                    document.querySelector("#teacherFirstName").value = ""
                    document.querySelector("#teacherMiddleName").value = ""
                    document.querySelector("#teacherEmployeeNumber").value = ""
                    document.querySelector("#teacherEmail").value = ""
                }else{
                    addModalDanger.show();
                }
            }else{
                addError(true, `An active teacher already has the Employee Number: <i>${employeeNumber}</i> in the database. Please double check your form fields`)
            }
        }
    }else{
        addError(true, 'Do not leave any field empty')
    }
}


async function checkStudentLRN(LRN) {
    let res = await GET("checkStudentLRN", {
        LRN:LRN
    });
    console.log(res)
    if(res==0){
       return true 
    }else{return false}
}

async function checkTeacherEmployeeNum(employeeNumber){
    let res = await GET("checkTeacherEmployeeNum", {
        employeeNumber: employeeNumber
    });
    console.log(res)
    if(res==0){
       return true 
    }else{return false}
}

function setStudentSections(elem){
    let sectionSelect = document.querySelector("#studentSection");
    if(elem.value!=''){
        disable(sectionSelect, false)
        sectionSelect.innerHTML = `<option selected value=''>Select a section</option>`;
        sections[elem.value].forEach(section => {
            sectionSelect.innerHTML += `<option value="${section}">${section}</option>`;
        });
    }else{disable(sectionSelect, true)}
}

function addError(visibility, message="") {
    let error = document.querySelector("#addError");
    let errorMsg = document.querySelector("#addErrorMsg");
    setVisibility(error, visibility);
    errorMsg.innerHTML = message;
}

function setAddRole(val) {
    let container = document.querySelector("#form-container");
    let submit = document.querySelector("#addSubmit");
    console.log(val);
    if (val == 0) {
        container.innerHTML = `<div class="d-flex justify-content-between fw-bold text-darkish mt-3">
        <div class="text-center">
            <input type="text" class="form-control" id="studentLastName" pattern="[a-zA-Z\s]+">
            <label for="studentLastName" class="form-label">Last Name</label>
        </div>
        <div class="text-center">
            <input type="text" class="form-control" id="studentFirstName" pattern="[a-zA-Z\s]+">
            <label for="studentFirstName" class="form-label">First Name</label>
        </div>
        <div class="text-center">
            <input type="text" class="form-control" id="studentMiddleName" pattern="[a-zA-Z\s]+">
            <label for="studentMiddleName" class="form-label">Middle Name</label>
        </div>
    </div>
    <div class="d-flex justify-content-between fw-bold text-darkish mt-3">
        <div class="text-center flex-fill me-4">
            <input type="text" class="form-control" id="studentLRN">
            <label for="studentLRN" class="form-label">Learner's Reference Number</label>
        </div>
        <div class="text-center">
            <select class="form-select" id="studentGrade" aria-label="Floating label select example" style="border-radius:15px;" onchange="setStudentSections(this)">
                <option selected value="">Select a grade level</option>
                <option value="7">Grade 7</option>
                <option value="8">Grade 8</option>
                <option value="9">Grade 9</option>
                <option value="10">Grade 10</option>
                <option value="11">Grade 11</option>
                <option value="12">Grade 12</option>
            </select>
            <label for="teacherGrade">Grade level</label>
        </div>
    </div>
    <div class="d-flex justify-content-between fw-bold text-darkish mt-3">
        <div class="text-center w-50">
            <select class="form-select" aria-label="Default select example" style="border-radius:15px;" id="studentSection" disabled>
                <option selected>Select a section</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            <label for="studentSection" class="form-label">Section</label>
        </div>
    </div>`;
    submit.setAttribute("onclick","setAddStudent()")
    getGradeSections()
    } else if (val == 1) {
        container.innerHTML = `<div class="d-flex justify-content-between fw-bold text-darkish mt-3">
        <div class="text-center">
            <input type="text" class="form-control" id="parentLastName">
            <label for="parentLastName" class="form-label">Last Name</label>
        </div>
        <div class="text-center">
            <input type="text" class="form-control" id="parentFirstName">
            <label for="parentFirstName" class="form-label">First Name</label>
        </div>
        <div class="text-center">
            <input type="text" class="form-control" id="parentMiddleName">
            <label for="parentMiddleName" class="form-label">Middle Name</label>
        </div>
    </div>
    <div class="d-flex justify-content-between fw-bold text-darkish mt-3">
        <div class="text-center flex-fill me-4">
            <input type="text" class="form-control" id="parentLRN">
            <label for="parentLRN" class="form-label">Child's Learner's Reference Number</label>
        </div>
        <div class="text-center">
            <input type="text" class="form-control" id="parentContactNumber">
            <label for="parentContactNumber" class="form-label">Contact Number</label>
        </div>
    </div>`
    submit.setAttribute("onclick","setAddParent()")
    } else {
        container.innerHTML = `<div class="d-flex justify-content-between fw-bold text-darkish mt-3">
        <div class="text-center">
            <input type="text" class="form-control" id="teacherLastName">
            <label for="teacherLastName" class="form-label">Last Name</label>
        </div>
        <div class="text-center">
            <input type="text" class="form-control" id="teacherFirstName">
            <label for="teacherFirstName" class="form-label">First Name</label>
        </div>
        <div class="text-center">
            <input type="text" class="form-control" id="teacherMiddleName">
            <label for="teacherMiddleName" class="form-label">Middle Name</label>
        </div>
    </div>
    <div class="d-flex justify-content-between fw-bold text-darkish mt-3">
        <div class="text-center w-100 me-4">
            <input type="text" class="form-control" id="teacherEmployeeNumber">
            <label for="teacherEmployeeNumber" class="form-label">Employee Number</label>
        </div>
        <div class="text-center w-100">
            <input type="email" class="form-control" id="teacherEmail">
            <label for="teacherEmail" class="form-label">Email Address</label>
        </div>
    </div>`
    submit.setAttribute("onclick","setAddTeacher()")
    }
}

async function setAdminUserName()
{
    let username = document.querySelector("#adminUserName").value
    let usernameError = document.querySelector("#adminUserNameError")
    if(username){
        let res = await POST({
            func: "setAdminUserName",
            ID: SessionStorage().ID,
            username: username,
        })
        if(resCheck(res, "POST")){
            let temp  = SessionStorage();
            temp.user_name = username;
            sessionStorage.userInfo = JSON.stringify(temp);
            setAdminIndex()
        }else{setVisibility(usernameError, true)}
    }else{setVisibility(usernameError, true)}
}

function setAdminImage() {
}

async function testSlow(){
    let res = await GET("testSlow",{})
}