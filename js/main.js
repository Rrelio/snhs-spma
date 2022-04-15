console.log("main");

async function GET(func, obj) {
    try {
        let jsonObj = '&obj=' + JSON.stringify(obj)
        let load = setTimeout(() => {
            setVisibility(document.querySelector("#loader"), true)
        }, 300);
        const response = await fetch('../php_helpers/getterPHP.php/?func=' + func + jsonObj);
        if (response.ok) {
            const result = await response.text()
            if (isValidJSON(result)) {
                clearTimeout(load);
                setVisibility(document.querySelector("#loader"), false)
                return JSON.parse(result);
            } else {
                clearTimeout(load);
                setVisibility(document.querySelector("#loader"), false)
                console.log(result)
            }
        }
        throw new Error('Request Failed!');
    } catch (error) {
        console.log(error);
    }
}

async function POST(obj) {
    try {
        let load = setTimeout(() => {
            setVisibility(document.querySelector("#loader"), true)
        }, 300);
        const response = await fetch('../php_helpers/setterPHP.php', {
            method: 'POST',
            body: JSON.stringify(obj)
        });
        if (response.ok) {
            const result = await response.text()
            if (isValidJSON(result)) {
                clearTimeout(load);
                setVisibility(document.querySelector("#loader"), false)
                return JSON.parse(result);
            } else {
                clearTimeout(load);
                setVisibility(document.querySelector("#loader"), false)
                console.log(result)
            }
        }
        throw new Error('Request Failed!');
    } catch (error) {
        console.log(error);
    }
}

async function uploadUserPicture(form_data) {
    try {
        let load = setTimeout(() => {
            setVisibility(document.querySelector("#loader"), true)
        }, 300);
        const response = await fetch('../php_helpers/upload.php', {
            method: 'POST',
            body: form_data
        });
        if (response.ok) {
            const result = await response.text()
            clearTimeout(load);
            setVisibility(document.querySelector("#loader"), false)
            return result;

        }
        throw new Error('Request Failed!');
    } catch (error) {
        console.log(error);
    }
}

function isValidJSON(text) {
    try {
        JSON.parse(text);
        return true;
    } catch {
        return false;
    }
}

function resCheck(res, method) {
    if(res!=null){
        if (method == "GET" && (res != '' || res != null)) {
            return true
        } else if (method == "POST" && res == "1") {
            return true
        } else if (typeof res == String && res != null) {
            if (res.includes("Error")) {
                console.log(res)
            }
            return false
        } else {
            return false
        }
    }else{return false}

}

function SessionStorage() {
    try {
        return JSON.parse(sessionStorage.userInfo);
    } catch (SyntaxError) {
        return "Session Error";
    }
}

function toCapitalize(str) {
    return str.trim().toLowerCase().replace(/\w\S*/g, (w) => (w.replace(/^\w/, (c) => c.toUpperCase())));
}

function checkRespose(res) {
    if (res != '0') {
        return true
    } else {
        console.log(res)
    }
}

function setVisibility(elem, val) {
    val == true ? elem.style.visibility = "visible" : elem.style.visibility = "hidden";
}

function disable(elem, val) {
    if (val) {
        elem.setAttribute("disabled", "true")
    } else {
        elem.removeAttribute("disabled")
    }
}

function nudgeElement(elem) {
    elem.classList.add("nudge")
    setTimeout(() => {
        elem.classList.remove("nudge")
    }, 450);
}

const date = new Date();
let userRole = "";

function setUserRole(val) {
    userRole = val
    console.log(userRole)
}

function passwordHide(passwordField, toggler) {
    let userPass = passwordField;
    userPass.setAttribute("type", "password");
    toggler.className = "bi bi-eye-fill"
}

function passwordToggle(passwordField, toggler) {
    let userPass = passwordField;
    console.log(userPass)
    if (userPass.getAttribute("type") == "password") {
        userPass.setAttribute("type", "text");
        toggler.className = "bi bi-eye-slash-fill";
        return false
    } else {
        userPass.setAttribute("type", "password");
        toggler.className = "bi bi-eye-fill"
        return true
    }
}

function createCode(size) {
    const givenSet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    let code = "";
    for (let i = 0; i < size; i++) {
        let pos = Math.floor(Math.random() * givenSet.length);
        code += givenSet[pos];
    }
    return code;
}

function resizeToOnebyOne_Width(element) {
    let element_width = element.offsetWidth;
    // let element_height = element.offsetHeight;
    while (element.offsetHeight != element_width) {
        element.style.height = element_width + "px";
    }
}

function resizeToOnebyOne_Height(element) {
    let element_height = element.offsetHeight;
    // let element_height = element.offsetHeight;
    while (element.offsetWidth != element_height) {
        element.style.width = element_height + "px !important";
    }
}

function convertMonth(index) {
    let months = ["January", "February", "March", "April", "May", "June", "July",
        "August", "September", "October", "November", "December"
    ];
    return months[index];
}

function getDaysPerMonth(month) {
    if (month == 0 || month == 2 || month == 4 || month == 6 || month == 7 || month == 10 || month == 11) {
        return 31;
    } else if (month == 1) {
        if (date.getFullYear() % 4 == 0) {
            return 29;
        } else {
            return 28;
        }
    } else {
        return 30;
    }
}

function convertDateTime(datetime) {
    let dateTimeArray = datetime.split("-");
    let month = convertMonth(Number(dateTimeArray[1]) - 1)
    let dateTime = `${month}, ${dateTimeArray[2]} ${dateTimeArray[0]} `
    return dateTime;
}

function setCalendarDate() {
    let week = {
        0: 0,
        1: 0,
        2: 0,
        3: 0,
        4: 0,
        5: 0,
        6: 0
    };
    let currentMonth = date.getMonth();
    // let weekDay = date.getDay();
    let weekDay = date.getDay();

    document.querySelector("#currentMonthAndYear").innerHTML = convertMonth(currentMonth) + " " + date.getFullYear();

    const miniCalendarDates = document.querySelectorAll(".mini-cal-dates");
    const currentDate = miniCalendarDates[weekDay];
    // resizeToOnebyOne_Width(currentDate.parentNode);

    let currentDay = date.getDate();
    // let currentDay = 1;
    week[weekDay] = currentDay

    currentDate.parentNode.classList.add("current-date");
    currentDate.innerHTML = currentDay;
    console.log(date.getDay())
    console.log(currentDay)


    let maxDays = getDaysPerMonth(1)
    let leftDays = currentDay;
    let rightDays = currentDay;

    for (let index = weekDay - 1; index >= 0; index--) {
        let subDay = leftDays--;
        week[index] = subDay - 1;
        if (subDay == 1) {
            break;
        }
    }
    for (let index = weekDay + 1; index < 7; index++) {
        let subDay = rightDays++;
        week[index] = subDay + 1;
        if (subDay == getDaysPerMonth(currentMonth) - 1) {
            break;
        }
    }
    for (let index = 0; index < 7; index++) {
        if (week[index] != 0) {
            miniCalendarDates[index].innerHTML = week[index]
        } else {
            miniCalendarDates[index].innerHTML = ""
        }
    }
    console.log(week)
}

function triggerClick(id) {
    document.querySelector(id).click();
}

function setElemHeight(elem) {
    console.log(elem)
    elem.style.height = elem.offsetHeight + "px";
}

function setElemWidth(elem) {
    console.log(elem)
    elem.style.width = elem.offsetWidth + "px";
}

let currentClassManager = "switchSubject";
async function switchTab(location, elem) {
    fetcher(location, elem).then(() => {
        setAccentColor(JSON.parse(sessionStorage.userInfo).theme)
        switch (location) {
            case "dashboard":
                if (SessionStorage()['role'] == "admin") {
                    getActiveUserTotal()
                    setAdminIndex()
                    setNoteModal()
                    getNotes()
                }else if (SessionStorage()['role'] == "teacher") {
                    setTeacherIndex()
                    initializeTooltips()
                }else if (SessionStorage()['role'] == "student") {
                    setStudentIndex()
                    getActivityCount()
                    initializeTooltips()
                }else if (SessionStorage()['role'] == "parent") {
                    setParentIndex()
                }
                break;
            case "subjects":
                if (SessionStorage()['role'] == "teacher") {
                    setTeacherHandledClassesActivityHistory()
                }else if (SessionStorage()['role'] == "student") {
                    getStudentSubjectsAndTeachers()
                    initializeTooltips()
                }else if (SessionStorage()['role'] == "parent") {
                    getStudentSubjectsAndTeachers()
                    initializeTooltips()
                }
                break;
            case "activities":
                if (SessionStorage()['role'] == "teacher") {
                    setTeacherActivityModal()
                    setTeacherActivityManager()
                    setTeacherActivityManagerHandleSelect()
                }
                break;
            case "setting":
                    setSelectedAccent()
                    if(SessionStorage()['role'] == "teacher"||SessionStorage()['role'] == "student"||SessionStorage()['role'] == "parent"){
                        setSettingModal()
                    }
                break;
            case "accounts":
                if (SessionStorage()['role'] == "admin") {
                    getStudentAccounts(0);
                }
                break;
            case "add":
                if (SessionStorage()['role'] == "admin") {
                    setAddRole(0)
                    setAddModal()
                }
                break;
            case "credentials":
                if (SessionStorage()['role'] == "admin") {
                    getStudentResets(0);
                }
                break;
            case "events":
                if (SessionStorage()['role'] == "admin") {
                    setEventModal()
                    getEvents();
                }
                break;
            case "grades":
                currentClassManager = "switchSubject";
                if (SessionStorage()['role'] == "admin") {
                    setClassModal()
                    getSubjects()
                }
                break;
            default:
                break;
        }
    })
    return true
}

async function fetcher(val, elem) {
    let siblings = getSiblings(elem);
    let container = document.querySelector("#tab-content");
    await fetch(val + ".php")
        .then(response => response.text())
        .then(text => container.innerHTML = text)
    clearSiblingsClass(siblings)
    elem.classList.add("active-tab");
}

async function asreadTextFile(file) {
    let content;

    console.log(content);
    return content;
    // outputs the content of the text file
}

function tabTest() {
    fetch("grades.php")
        .then(response => response.text())
        .then(text => document.querySelector("#tab-content").innerHTML = text)
}

async function initialTab() {
    await switchTab("dashboard", document.querySelector("#home"))
    getUpcomingEvents()
    return true;
}


function test() {
    console.log("hey");
}

let getSiblings = function (e) {
    let siblings = [];
    if (!e.parentNode) {
        return siblings;
    }
    let sibling = e.parentNode.firstChild;
    while (sibling) {
        if (sibling.nodeType === 1 && sibling !== e) {
            siblings.push(sibling);
        }
        sibling = sibling.nextSibling;
    }
    return siblings;
};

function clearSiblingsClass(elems) {
    elems.forEach(element => {
        element.className = "";
    });
}

async function changeAccentColor(elem) {
    let colour = elem.getAttribute("value")
    console.log(elem.getAttribute("value"))
    console.log(JSON.parse(sessionStorage.userInfo).role)
    let res = await POST({
        func: "setAccentColor",
        role: JSON.parse(sessionStorage.userInfo).role,
        ID: JSON.parse(sessionStorage.userInfo).ID,
        color:colour
    });
    if(resCheck(res, "POST")){
        let colorPicks = document.querySelectorAll(".color-pick");
        colorPicks.forEach(element => {
            element.classList.remove("text-white")
        });
        elem.classList.add("text-white");
        setAccentColor(elem.getAttribute("value"));
        let temp = JSON.parse(sessionStorage.userInfo)
        temp.theme = elem.getAttribute("value");
        sessionStorage.userInfo = JSON.stringify(temp)
    }
}

function setSelectedAccent() {
    let accent = JSON.parse(sessionStorage.userInfo).theme
    setAccentColor(accent)
    let colorPicks = document.querySelectorAll(".color-pick");
    if(accent==''){
        document.querySelector('.color-pick[value="128, 168, 63"]').classList.add("text-white");
    }else{
        colorPicks.forEach(element => {
            // console.log(`${accent} == ${element.getAttribute("value") == accent}`)
            if(element.getAttribute("value") == accent)
            {
                element.classList.add("text-white");
            }
        });
    }
}

let newPasswordModal;
let newPasswordSuccessModal;
function setSettingModal() {
    newPasswordModal = new bootstrap.Modal(document.querySelector("#changePasswordModal"));
    newPasswordSuccessModal = new bootstrap.Modal(document.querySelector("#settingSuccess"));

}

async function setNewPassword() {
    let oldPassword = document.querySelector("#userPassword").value
    let newPassword = document.querySelector("#initUserPassword").value
    let confirmPassword = document.querySelector("#initUserPasswordConfirm").value
    let newPassErrorMsg = document.querySelector("#newPasswordErrorMsg")
    let newPassError = document.querySelector("#newPasswordError")
    if(oldPassword && newPassword && confirmPassword){
        let res = await GET("checkUserPassword", {
            ID:SessionStorage().ID,
            role:SessionStorage().role,
            oldPassword: oldPassword
        })
        if(res=="0"){
            setVisibility(newPassError, true)
            newPassErrorMsg.innerHTML = `Incorrect Password`;
        }else{
            if(newPassword.length<8){
                setVisibility(newPassError, true)
                newPassErrorMsg.innerHTML = `Password must be atleast 8 characters`;
            }else{
                if(newPassword===confirmPassword){
                    let res = await POST({
                        func: "setNewPassword",
                        ID:SessionStorage().ID,
                        role:SessionStorage().role,
                        newPassword: newPassword
                    })
                    if(resCheck(res, "POST")){
                        setVisibility(newPassError, false)
                        newPasswordModal.hide()
                        document.querySelector("#userPassword").value = ""
                        document.querySelector("#initUserPassword").value = ""
                        document.querySelector("#initUserPasswordConfirm").value = ""
                        newPasswordSuccessModal.show()
                    }else{
                        setVisibility(newPassError, true)
                        newPassErrorMsg.innerHTML = `Something went wrong ${res}`;
                    }
                }else{
                    setVisibility(newPassError, true)
                    newPassErrorMsg.innerHTML = `New password do not match`;
                }
            }
        }
    }else{
        setVisibility(newPassError, true)
        newPassErrorMsg.innerHTML = `Invalid value(s) entered`;
    }
}



function setAccentColor(color) {
    let root = document.documentElement;
    root.style.setProperty('--accent-color', color); 
}

function logout() {
    window.location.replace("http://localhost/snhs-spma");
}

async function getUpcomingEvents() {
    let container = document.querySelector("#upcomingEvents")
    container.innerHTML = "";
    let res = await GET("getUpcomingEvents", {})
    if (resCheck(res, "GET")) {
        console.log(res)
        res.forEach(event => {
            
            container.innerHTML += `
            <div class="row mx-0 mt-2">
                <div class="col-4 d-flex align-items-center pe-0" style="border-right:5px ${event.color} solid;">
                    <strong>${convertMonth(Number(event.date.split("-")[1])-1).length<=3? convertMonth(Number(event.date.split("-")[1])-1): convertMonth(Number(event.date.split("-")[1])-1).substring(0,3)+"."} ${event.date.split("-")[2]}</strong>
                </div>
                <div class="col-8 pe-0">
                    <small class="d-block text-truncate">${event.holiday}</small>
                    <strong class="d-block text-truncate">${event.holiday_info}</strong>
                </div>
            </div>`;
        });
    } else {
        console.log(res)
    }
}

function ValidateEmail(mail) 
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
  {
    return (true)
  }
    // alert("You have entered an invalid email address!")
    return (false)
}

async function setProfilePicture(elem){
    let file = elem.files[0];
    if(!['image/jpeg', 'image/png'].includes(file.type)){
		alert("Only .jpg and .png image are allowed");
		elem.value = '';
		return;
	}
	if(file.size > 2 * 1024 * 1024){
		alert("File must be less than 2 MB");
		elem.value = '';
		return;
	}
    const form_data = new FormData();
    form_data.append('sample_image', file);
    form_data.append('role', SessionStorage().role)
    form_data.append('ID', SessionStorage().ID)
    // console.log(form_data)
    let res = await uploadUserPicture(form_data);
    if(resCheck(res, "GET")){
        console.log(JSON.parse(res))
        let resu = await POST({
            func: "setUserImage",
            role: SessionStorage().role,
            ID: SessionStorage().ID,
            image: JSON.parse(res)[0]
        })
        if(resCheck(resu, "POST")){
            let temp = SessionStorage()
            temp.profile_image = JSON.parse(res)[0]
            sessionStorage.userInfo = JSON.stringify(temp)
            location.reload()
        }else{
            alert("Something went wrong")
        }
    }else{
        alert("Sorry, there was an error uploading your file.")
    }
}

async function setUserImage(role, directory) {
    
}
  