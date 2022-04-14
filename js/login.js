const userSelect = document.querySelector("#userSelection");
const userLogin = document.querySelector("#userLogin");
const header = document.querySelector("#login-account");
const userCredential = document.querySelector("#userNameLabel");
let user_Role;
let isFirst = false;

async function GET(func, obj) {
    try {
        let jsonObj = '&obj=' + JSON.stringify(obj)
        const response = await fetch('php_helpers/getterPHP.php/?func=' + func + jsonObj);
        if (response.ok) {
            const result = await response.text()
            if (isValidJSON(result)) {
                return JSON.parse(result);
            } else {
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
        const response = await fetch('php_helpers/setterPHP.php', {
            method: 'POST',
            body: JSON.stringify(obj)
        });
        if (response.ok) {
            const result = await response.text()
            if (isValidJSON(result)) {
                return JSON.parse(result);
            } else {
                console.log(result)
            }
        }
        throw new Error('Request Failed!');
    } catch (error) {
        console.log(error);
    }
}

async function MAIL(obj) {
    try {
        let jsonObj = '&obj=' + JSON.stringify(obj)
        const response = await fetch('php_helpers/mail.php/?' + jsonObj);
        if (response.ok) {
            const result = await response.text()
            console.log(result)
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


function gotoLogin(user)
{
    user_Role = user.id
    let requestLabel = document.querySelector("#passRequestUserNameLabel")
    header.innerHTML = user_Role.toUpperCase()+" LOGIN";
    userSelect.style.display = "none";
    userLogin.style.display = "block";
    if(user_Role == "teacher")
    {
        userCredential.innerHTML = "Employee Number"
        requestLabel.innerHTML = "Employee Number"
    }else if(user_Role=="parent")
    {
        userCredential.innerHTML = "Child's LRN"
        requestLabel.innerHTML = "Child's LRN"
    }else
    {
        userCredential.innerHTML = "Learner's Reference Number"
        requestLabel.innerHTML = "Learner's Reference Number"
    }
}

function gotoSelect()
{
    document.querySelector("#userName").value = ""
    document.querySelector("#userPassword").value = ""
    let error = document.querySelector("#loginErrorHandler")
    passwordToggle(document.querySelector("#userPassword"), document.querySelector("#passwordToggler"))
    header.innerHTML = "CHOOSE AN ACCOUNT:";
    userSelect.style.display = "block";
    userLogin.style.display = "none";
    error.style.visibility = "hidden";
}

async function getUserCredentials() {
    let userName = document.querySelector("#userName").value
    let userPassword = document.querySelector("#userPassword").value
    let error = document.querySelector("#loginErrorHandler")
    let errorText = document.querySelector("#loginErrorHandlerText")
    let res = await GET("getUserCredentials", 
    {
        user: user_Role,
        credential: userName,
        password: userPassword
    })
    console.log(res)
    if(res != null && res != "")
    {
        sessionStorage.userInfo = JSON.stringify(res[0]);
        loginUser()
        // console.log(JSON.parse(sessionStorage.userInfo)["ID"])
    }else
    {
        if(error.style.visibility == "visible")
        {
            nudgeElement(error);
        }
        error.style.visibility = "visible";
        if(userName == '' || userPassword == '')
        {
            errorText.innerHTML = "No credentials entered"
        }else
        {
            errorText.innerHTML = "Incorrect user credentials"
        }
    }
}

function loginUser()
{
    console.log(JSON.parse(sessionStorage.userInfo)["initial"])
    var firstLoginModal = new bootstrap.Modal(document.getElementById('firstLoginModal'), {
        keyboard: false
    })
    if(JSON.parse(sessionStorage.userInfo)["initial"] == "1")
    {
        firstLoginModal.show();
    }else{
        firstLoginModal.hide();
        setUserRole(user_Role);
        let temp = JSON.parse(sessionStorage.userInfo)
        temp["role"]=user_Role
        sessionStorage.userInfo = JSON.stringify(temp)
        window.location.replace("http://localhost/snhs-spma/" + userRole);
    }
}

async function setInitialPassword() {
    let newPass = document.querySelector("#initUserPassword").value
    let newPassConfirm = document.querySelector("#initUserPasswordConfirm").value
    let errorMsg = document.querySelector("#initPassErrorMsg")
    let error = document.querySelector("#initPassError")
    console.log("pass "+newPass)
    console.log("conpass "+newPassConfirm)
    if(newPass != newPassConfirm)
    {
        setVisibility(error, false);
        errorMsg.innerHTML = "Passwords do not match"
    }else if(newPass.length < 8)
    {
        setVisibility(error, false);
        errorMsg.innerHTML = "Password must be atleast 8 characters"
    }else
    {
        let obj = {
            func: 'setInitialPassword',
            ID: JSON.parse(sessionStorage.userInfo)["ID"],
            user: user_Role,
            password: newPass
        }
        let res = await POST(obj);
        console.log(res)
        let userInfo = JSON.parse(sessionStorage.userInfo)
        userInfo["initial"] = "0";
        sessionStorage.userInfo = JSON.stringify(userInfo);
        loginUser()
    }
}

function loginAdmin()
{
    window.location.replace("http://localhost/snhs-spma/administrator/");
}

async function requestPasswordReset() {
    let credentials = document.querySelector("#passRequestUserName").value
    let button = document.querySelector("#passRequestButton")
    let res = await POST({
        func:"requestPasswordReset",
        user:user_Role,
        credential: credentials
    })
    if(res=="0")
    {
        setVisibility(document.querySelector("#passRequestError"), true)
    }else
    {
        button.innerHTML="Done"
        button.removeAttribute("onclick")
        button.setAttribute("data-bs-dismiss", "modal")
        document.querySelector("#requestResetContent").innerHTML = `<div class="text-center border-top pt-2">
        Your request to reset your password has been sent to the admin.
        Please wait until they reset it.
        <h1 style="color: #69BD45;"> <i class="bi bi-send-check-fill"></i> </h1>
        </div>`
    }
}

async function getAdminCredential() {
    let adminEmail = document.querySelector("#adminEmail").value;
    let res = await GET("getAdminCredential",{
        email: adminEmail
    })
    return res;
}

let mail;
let codes = createCode(8);
async function mailAdminLogin()
{
    let adminEmail = document.querySelector("#adminEmail").value;
    let error = document.querySelector("#adminError");
    let errorMsg = document.querySelector("#adminErrorMsg");
    let submit = document.querySelector("#adminSubmit");
    let isAdmin = await getAdminCredential();
    let submittedCode = document.querySelector("#adminVerificationCode").value;
    console.log(isAdmin)
    if(isAdmin==null){
        setVisibility(error, true)
        errorMsg.innerHTML = "Email not found"
        mail=null;
    }else if(isAdmin == "Invalid"){
        setVisibility(error, true)
        adminEmail==""?errorMsg.innerHTML = "Please enter an email address":errorMsg.innerHTML = "Invalid email address";
        mail=null;
    }else{
        console.log(mail);
        if(mail==null){
            mail = await mailCode()
            if(mail=="Sent"){
                submit.innerHTML = "Send Verification Code"
                document.querySelector(".admin-verification-container").classList.add("wipe-down");
                submit.innerHTML = "Login"
            }else if(mail=="Invalid Email"){
                submit.innerHTML = "Send Verification Code"
                setVisibility(error, true)
                errorMsg.innerHTML = "Invalid email address"
                mail=null;
            }else{
                submit.innerHTML = "Send Verification Code"
                setVisibility(error, true)
                errorMsg.innerHTML = "An error has occurred while sending the verification code"
                mail=null;
            }
        }else{
            console.log(codes)
            if(submittedCode==codes){
                isAdmin[0]["role"]="admin";
                console.log(isAdmin)
                sessionStorage.userInfo = JSON.stringify(isAdmin[0]);
                loginAdmin();
            }else{
                setVisibility(error, true)
                errorMsg.innerHTML = "Incorrect code submitted"
            }
        }
    }
}


async function mailCode()
{
    let adminEmail = document.querySelector("#adminEmail").value;
    let submit = document.querySelector("#adminSubmit");
    disable(submit, true)
    submit.innerHTML = `<div class="spinner-border text-light" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>`
    mail = await MAIL({
        email: adminEmail,
        code: codes
    })
    disable(submit, false)
    submit.innerHTML = "Login"
    return mail;
}