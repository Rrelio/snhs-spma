sessionStorage.userInfo ? console.log(SessionStorage()) : window.location.replace("http://localhost/snhs-spma/login.php");

async function setTeacherIndex(){
    document.querySelector("#teacherName").innerHTML = `${SessionStorage().first_name} ${SessionStorage().last_name}`
    if(SessionStorage().profile_image == ''){
        document.querySelector("#userProfilePic").setAttribute("src", "../images/default_avatar.png")

    }else{
        document.querySelector("#userProfilePic").setAttribute("src", SessionStorage().profile_image)
    }

    await setTeacherHandleSelect()
}

let activityModalSuccess
let activityModalDanger
function setTeacherActivityModal(){
    activityModalSuccess = new bootstrap.Modal(document.querySelector("#activitySuccess"));
    activityModalDanger = new bootstrap.Modal(document.querySelector("#activityDelete"));
}


async function setTeacherHandleSelect() {
    let handleSelect = document.querySelector("#teacherHandles");

    let res = await getTeacherHandledClasses();
    console.log(res)
    if(resCheck(res, "GET")){
        res.forEach(element => {
            handleSelect.innerHTML += `<option value="${element.ID}">${element.subject_name} - ${element.grade_level} ${element.section_name}</option>`
        });
    }else{
        console.log(res)
    }
}


async function getTeacherHandledClasses()
{
    let res = await GET("getTeacherHandledClasses", {
        ID:SessionStorage().ID
    });
    if(resCheck(res, "GET")){
        return res
    }else{
        return false;
    }
}

async function setTeacherHandledClassesActivityHistory() {
    let activityHistoryClasses = document.querySelector("#teacherHandledClassesActivityHistory");
    let res = await getTeacherHandledClasses();
    let handleIDList =[];

    if(resCheck(res, "GET")){
        activityHistoryClasses.innerHTML = ''
        await res.forEach(element => {
            activityHistoryClasses.innerHTML += `
            <h2 class="accordion-header" id="flush-heading${element.ID}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse${element.ID}" aria-expanded="false" aria-controls="flush-collapse${element.ID}">
                    <div class="fs-5"><i class="bi bi-folder me-2"></i></div>
                    ${element.subject_name} - ${element.grade_level} ${element.section_name}
                </button>
            </h2>
            <div id="flush-collapse${element.ID}" class="accordion-collapse collapse" aria-labelledby="flush-heading${element.ID}" data-bs-parent="#accordionFlushExamples">
                <div class="accordion-body py-2 px-4 d-flex">
                    <div class="px-3">
                        <i class="fs-5 bi bi-arrow-return-right"></i>
                    </div>
                    <div class="accordion accordion-flush flex-fill ps-2" id="accordionFlush${element.ID}">
                        
                    </div>
                </div>
            </div>`
            handleIDList.push(element.ID);
        });
        await getHandleActivityHistoryList(handleIDList)
    }else{
        console.log(res)
    }
}

async function getHandleActivityHistoryList(handle_IDs) {
    let act = await GET("getHandledActivities", {handle_ID:handle_IDs})
    let activityList = [];
    if(resCheck(act, "GET")){
        console.log(act)
        await act.forEach(activity => {
            document.querySelector(`#accordionFlush${activity.handle_ID}`).innerHTML +=`
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-heading-activity${activity.ID}">
                <button class="accordion-button collapsed p-2" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-activity${activity.ID}" aria-expanded="false" aria-controls="flush-collapse-activity${activity.ID}">
                    <i class="bi bi-file-earmark-text mx-1"></i> ${activity.category} - ${activity.activity_title}
                </button>
            </h2>
            <div id="flush-collapse-activity${activity.ID}" class="accordion-collapse collapse" aria-labelledby="flush-heading-activity${activity.ID}" data-bs-parent="#accordionFlush${activity.handle_ID}">
                <div class="accordion-body p-0 ps-1">
                    <table class="table table-sm" style="table-layout:fixed;">
                        <thead>
                            <tr>
                                <th scope="col">Student Name</th>
                                <th scope="col" class="text-end w-25"><span class="me-2"> Status </span></th>
                            </tr>
                        </thead>
                        <tbody style="border-color: rgba(0,0,0,.125);" id="studentClass-${activity.ID}">
                            
                        </tbody>
                    </table>
                </div>
            </div>`
            activityList.push(activity.ID)
        });
        await setTeacherActivityHistoryStudents(activityList)
    }else{
        console.log(act)
    }
}

async function setTeacherActivityHistoryStudents(activityList)
{
    let res = await GET("getTeacherActivityHistoryStudents", {activityList:activityList});
    console.log(res)
    if(resCheck(res, "GET")){
        res.forEach(row => {
            let done = ''
            let notDone = ''
            if(row.status==0){
                done = ''
                notDone = '-fill'
            }else{
                done = '-fill'
                notDone = ''
            }
            document.querySelector(`#studentClass-${row.activity_ID}`).innerHTML += `
            <tr>
                <td><small>${row.first_name} ${row.middle_name} ${row.last_name}</small></td>
                <td class="d-flex justify-content-end">
                    <i class="fs-5 pointer px-1 me-2 bi bi-check-circle${done} text-success " onclick="markActivityStatus(true, this, ${row.student_activity_ID})"></i>
                    <i class="fs-5 pointer px-1 bi bi-x-circle${notDone} text-danger " onclick="markActivityStatus(false, this, ${row.student_activity_ID})"></i>
                </td>
            </tr>`
        });
    }
}

async function setTeacherActivityManager() {
    let classes = document.querySelector("#teacherActivitiesHandles");
    classes.innerHTML = ''
    let res = await getTeacherHandledClasses();
    let handleIDList =[];
    if(resCheck(res, "GET")){
        await res.forEach(element => {
            classes.innerHTML += `
            <h2 class="accordion-header" id="flush-heading${element.ID}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse${element.ID}" aria-expanded="false" aria-controls="flush-collapse${element.ID}">
                    <div class="fs-5"><i class="bi bi-folder me-2"></i></div>
                    ${element.subject_name} - ${element.grade_level} ${element.section_name}
                </button>
            </h2>
            <div id="flush-collapse${element.ID}" class="accordion-collapse collapse"
                aria-labelledby="flush-heading${element.ID}" data-bs-parent="#accordionFlushExamples">
                <div class="accordion-body p-2 pe-0 d-flex">
                    <ul class="list-group w-100" id="handleActivity${element.ID}">
                       
                    </ul>
                </div>
            </div>`
            handleIDList.push(element.ID);
        });
        console.log(handleIDList)
        await getHandleActivities(handleIDList)
    }else{
        console.log(res)
    }
}

async function getHandleActivities(handle_IDs) {
    let act = await GET("getHandledActivities", {handle_ID:handle_IDs})
    if(resCheck(act, "GET")){
        await act.forEach(activity => {
            document.querySelector(`#handleActivity${activity.handle_ID}`).innerHTML +=`
            <li class="list-group-item list-group-item-action d-flex pe-1 justify-content-between" title="${activity.category} - ${activity.activity_title}">
                <div class="test-truncate align-self-center"><small>${activity.category} - ${activity.activity_title}</small></div>
                <div class="btn btn-danger px-1 text-white ms-2 p-0" onclick="askActivityRemove(${activity.ID}, '${activity.activity_title}')"><small><i class="bi bi-trash-fill"></i></small></div>
            </li>`
        });
    }else{
        console.log(act)
    }
}

function askActivityRemove(ID, name) {
    activityModalDanger.show();
    document.querySelector("#activityDeleteMsg").innerHTML = `Are you sure you want to remove <i>${name}</i> from the activity list?`;
    document.querySelector("#activityDeleteYes").setAttribute("onclick", `setActivityDelete(${ID})`);
}

async function setActivityDelete(ID){
    let res = await POST({
        func: "setActivityDelete",
        ID: ID
    });
    if(resCheck(res, "POST")){
        document.querySelector("#activitySuccessMsg").innerHTML = 'Activity successfully removed'
        activityModalSuccess.show();
        setTeacherActivityManager()
    }else{
        alert(res);
    }
}

async function setTeacherActivityManagerHandleSelect() {
    let classes = document.querySelector("#activityHandle");
    let res = await getTeacherHandledClasses();
    if(resCheck(res, "GET")){
        res.forEach(element => {
            classes.innerHTML += `<option value="${element.subject_name}!@#${element.grade_level}!@#${element.section_name}!@#${element.subject_ID}!@#${element.ID}">${element.subject_name} - ${element.grade_level} ${element.section_name}</option>`
        });
    }else{
        console.log(res)
    }
}

async function setTeacherActivityAdd(){
    let handle = document.querySelector("#activityHandle").value;
    let category = document.querySelector("#activityCategory").value;
    let title = document.querySelector("#activityTitle").value;
    let error = document.querySelector("#activityError");
    handle = handle.split("!@#")
    if(handle && category && title){
        let res = await POST({
            func: "setTeacherActivityAdd",
            subject_name: handle[0],
            grade_level: handle[1],
            section_name: handle[2],
            subject_ID: handle[3],
            handle_ID: handle[4],
            category: category,
            title: title
        })
        if(resCheck(res, "POST")){
            activityModalSuccess.show()
            setTeacherActivityManager()
            document.querySelector("#activitySuccessMsg").innerHTML = 'Activity successfully added'
            document.querySelector("#activityHandle").value = ''
            document.querySelector("#activityCategory").value = ''
            document.querySelector("#activityTitle").value = ''
        }else{
            console.log(res)
            setVisibility(error, false)
        }
    }else{
        setVisibility(error, true)
    }
}

async function markActivityStatus(stat, elem, ID)
{
    let sibling = getSiblings(elem)
    console.log(sibling[0])
    let res = await POST({
        func: "setActivityStatus",
        ID: ID,
        status: stat
    });
    if(resCheck(res, "POST")){
        if(stat)
        {
            elem.classList.remove("bi-check-circle");
            elem.classList.add("bi-check-circle-fill");
            sibling[0].classList.remove("bi-x-circle-fill")
            sibling[0].classList.add("bi-x-circle")
        }else
        {
            elem.classList.remove("bi-x-circle");
            elem.classList.add("bi-x-circle-fill");
            sibling[0].classList.remove("bi-check-circle-fill")
            sibling[0].classList.add("bi-check-circle")
        }
    }

}

