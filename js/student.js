if(sessionStorage.userInfo){
    if(SessionStorage().role == "student"){
        console.log(SessionStorage())
    }else{
        window.location.replace("http://localhost/snhs-spma");
    }
}else{
    window.location.replace("http://localhost/snhs-spma");
}

async function setStudentIndex(){
    document.querySelector("#studentName").innerHTML = `${SessionStorage().first_name} ${SessionStorage().last_name}`
    document.querySelector("#studentGradeSection").innerHTML = `${SessionStorage().grade_level} - ${SessionStorage().section}`
    
    if(SessionStorage().profile_image == ''){
        document.querySelector("#userProfilePic").setAttribute("src", "../images/default_avatar.png")

    }else{
        document.querySelector("#userProfilePic").setAttribute("src", SessionStorage().profile_image)
    }
}

async function getStudentSubjectsAndTeachers()
{
    let container = document.querySelector("#studentSubjects");
    let res = await GET("getStudentSubjectsAndTeachers", {
        grade_level: SessionStorage().grade_level,
        section: SessionStorage().section
    });
    let handleIDs = [];
    if(resCheck(res, "GET")){
        console.log(res)
        container.innerHTML = '';
        await res.forEach(element => {
            container.innerHTML += `
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-heading-${element.ID}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-${element.ID}" aria-expanded="false" aria-controls="flush-collapse-${element.ID}">
                        <div class="fs-5"><i class="bi bi-folder me-2"></i></div>
                        <div class="d-flex justify-content-between w-100 pe-4">
                            <div>${element.subject_name} ${element.grade_level}</div>
                            <div>${element.first_name} ${element.last_name}</div>
                        </div>
                    </button>
                </h2>
                <div id="flush-collapse-${element.ID}" class="accordion-collapse collapse" aria-labelledby="flush-heading-${element.ID}" data-bs-parent="#studentSubjects">
                    <div class="accordion-body p-0" >
                        <table class="table table-sm" style="background-color:#fdfdfd;">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-none text-white">_</th>
                                    <th scope="col"><i class="fs-5 bi bi-arrow-return-right"></i></th>
                                    <th scope="col" class="ps-3">Activity</th>
                                    <th scope="col" class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody  class="border-0" style="border-color: #e7f1ff !important;" id="studentSubjectActivity-${element.ID}">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>`
            handleIDs.push(element.ID)
        });
        await getStudentSubjectActivities(handleIDs);
    }else{console.log(res)}
}

async function getStudentSubjectActivities(handleIDs){
    let res = await GET("getStudentSubjectActivities", {
        handle_ID:handleIDs,
        LRN:SessionStorage().LRN
    })
    let status = '';
    let category = '';
    if(resCheck(res, "GET")){
        res.forEach(element => {
            if(element.status=="1"){
                status="bi bi-check-circle-fill text-success" 
            }else{
                status="bi bi-x-circle-fill text-danger" 
            }
            switch (element.category) {
                case "Assignment":
                    category='#2E9BB4'
                    break;
                case "Quiz":
                    category='#FF7543'
                    break;
                case "Performance Task":
                    category='#88CCE1'
                    break;
                case "Other":
                    category='#FFBB61'
                    break;
                default:
                    category='#FAFAFA'
                    break;
            }
            document.querySelector(`#studentSubjectActivity-${element.handle_ID}`).innerHTML += `
            <tr>
                <th colspan="2"></th>
                <td><span style="color:${category};" data-bs-toggle="tooltip" data-bs-placement="top" title="${element.category}" data-bs-original-title="${element.category}">▉</span><small> <i>${element.category}</i> - ${element.activity_title}</small></td>
                <td class="text-center"><i class="${status}"></i></td>
            </tr>`
        });
    }else{
        console.log(res)
    }
}

async function getActivityCount(){
    let res = await GET("getActivityCount", {
        LRN: SessionStorage().LRN,
        grade_level: SessionStorage().grade_level,
        section_name: SessionStorage().section
    })
    let root = document.documentElement;
    if(resCheck(res, "GET")){
        console.log(res)
        document.querySelector("#activityTotalPercentageMini").innerHTML = Math.round(res.TotalPercent) + "%";
        document.querySelector("#activityTotalPercentage").innerHTML = Math.round(res.TotalPercent) + "%";
        root.style.setProperty('--assignment-percent', (res.Assignment.Percent*180)/100 + "deg"); 
        root.style.setProperty('--activity-percent', (res.Quiz.Percent*180)/100 + "deg"); 
        root.style.setProperty('--performance-percent', (res["Performance Task"].Percent*180)/100 + "deg"); 
        root.style.setProperty('--other-percent', (res.Other.Percent*180)/100 + "deg"); 
        document.querySelector("#activityFinished").innerHTML = res.TotalFinished;
        document.querySelector("#activityNotFinished").innerHTML = res.TotalActivities - res.TotalFinished
        document.querySelector("#activityTotal").innerHTML = res.TotalActivities
        document.querySelector("#assignmentLegend").setAttribute("data-bs-original-title", `${res.Assignment.Finished}/${res.Assignment.Total} : ${res.Assignment.Percent.toFixed(1)}%`);
        document.querySelector("#quizLegend").setAttribute("data-bs-original-title", `${res.Quiz.Finished}/${res.Quiz.Total} : ${res.Quiz.Percent.toFixed(1)}%`);
        document.querySelector("#performanceLegend").setAttribute("data-bs-original-title", `${res["Performance Task"].Finished}/${res["Performance Task"].Total} : ${res["Performance Task"].Percent.toFixed(1)}%`);
        document.querySelector("#otherLegend").setAttribute("data-bs-original-title", `${res.Other.Finished}/${res.Other.Total} : ${res.Other.Percent.toFixed(1)}%`);
    }else{console.log(res)}
}

function initializeTooltips() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
}