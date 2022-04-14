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
    if(resCheck(res, "GET")){
        res.forEach(element => {
            activityHistoryClasses.innerHTML += `
                    <h2 class="accordion-header" id="flush-heading${element.ID}"><button class="accordion-button collapsed"
                            type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse${element.ID}"
                            aria-expanded="false" aria-controls="flush-collapse${element.ID}">
                            <div class="fs-5"><i class="bi bi-folder me-2"></i></div>

                            ${element.subject_name} - ${element.grade_level} ${element.section_name}
                        </button></h2>
                    <div id="flush-collapse${element.ID}" class="accordion-collapse collapse" aria-labelledby="flush-heading${element.ID}"
                        data-bs-parent="#accordionFlushExamples">
                        <div class="accordion-body py-2 px-4 d-flex">
                            <div class="px-3">
                                <i class="fs-5 bi bi-arrow-return-right"></i>
                            </div>
                            <div class="accordion accordion-flush flex-fill ps-2" id="accordionFlushExample">
                                <div class="accordion-item ">
                                    <h2 class="accordion-header" id="flush-headingTwo"><button
                                            class="accordion-button collapsed p-2" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                            aria-expanded="false" aria-controls="flush-collapseTwo"><i class="bi bi-file-earmark-text mx-1"></i> Activity 1</button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body p-0 ps-1">
                                            <table class="table table-sm" style="table-layout:fixed;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Student Name</th>
                                                        <th scope="col" class="text-end w-25"><span class="me-2"> Status </span></th>
                                                    </tr>
                                                </thead>
                                                <tbody style="border-color: rgba(0,0,0,.125);">
                                                    <tr>
                                                        <td ><small class="d-block text-truncate">José Protacio Rizal Mercado y Alonso RealondaJosé Protacio Rizal Mercado y Alonso Realonda</small></td>
                                                        <td class="d-flex justify-content-end">
                                                            <i class="fs-5 pointer px-1 me-2 bi bi-check-circle text-success " onclick="markActivityStatus(true, this)"></i>
                                                            <i class="fs-5 pointer px-1 bi bi-x-circle text-danger " onclick="markActivityStatus(false, this)"></i>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>Student 2</small></td>
                                                        <td class="d-flex justify-content-end">
                                                            <i class="fs-5 pointer px-1 me-2 bi bi-check-circle text-success " onclick="markActivityStatus(true, this)"></i>
                                                            <i class="fs-5 pointer px-1 bi bi-x-circle text-danger " onclick="markActivityStatus(false, this)"></i>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>Student 3</small></td>
                                                        <td class="d-flex justify-content-end">
                                                            <i class="fs-5 pointer px-1 me-2 bi bi-check-circle text-success " onclick="markActivityStatus(true, this)"></i>
                                                            <i class="fs-5 pointer px-1 bi bi-x-circle text-danger " onclick="markActivityStatus(false, this)"></i>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingThree"><button
                                            class="accordion-button collapsed p-2" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                            aria-expanded="false" aria-controls="flush-collapseThree"><i class="bi bi-file-earmark-text mx-1"></i> Activity
                                            2</button></h2>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">Placeholder content for this accordion,
                                            which is intended to demonstrate the <code>.accordion-flush</code>class.
                                            This is the third item's accordion body. Nothing more exciting happening
                                            here in terms of content, but just filling up the space to make it look, at
                                            least at first glance, a bit more representative of how this would look in a
                                            real-world application.</div>
                                    </div>
                                </div>
                            </div>
                        </div>`
        });
    }else{
        console.log(res)
    }
}

async function setTeacherActivityManager() {
    let classes = document.querySelector("#teacherActivitiesHandles");
    let res = await getTeacherHandledClasses();
    if(resCheck(res, "GET")){
        res.forEach(element => {
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
                    <ul class="list-group w-100">
                        <li class="list-group-item list-group-item-action d-flex pe-1">
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
            </div>`
        });
    }else{
        console.log(res)
    }
}

async function setTeacherActivityManagerHandleSelect() {
    let classes = document.querySelector("#activityHandle");
    let res = await getTeacherHandledClasses();
    if(resCheck(res, "GET")){
        res.forEach(element => {
            classes.innerHTML += `<option value="['${element.subject_name}',${element.grade_level},'${element.section_name}']">${element.subject_name} - ${element.grade_level} ${element.section_name}</option>`
        });
    }else{
        console.log(res)
    }
}

async function setTeacherActivityAdd(){
    let subject_ID = document.querySelector("#activityHandle").value;
    let category = document.querySelector("#activityCategory").value;
    let title = document.querySelector("#activityTitle").value;
    let error = document.querySelector("#activityError");
    if(subject_ID && category && title){
        setVisibility(error, false)

    }else{
        setVisibility(error, true)
    }
}

function markActivityStatus(stat, elem)
{
    let sibling = getSiblings(elem)
    // console.log(typeof(siblings))
    console.log(sibling[0])
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

