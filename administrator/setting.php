<div class="d-flex flex-column h-100">
    <div class="bg-white container border p-3 h-100 d-flex flex-column" style="border-radius: 25px;">
        <div>
            <h5 class="fw-bold text-darkish">Settings</h5>
            <small class="text-black-50 d-block">This is where you configure your account</small>
        </div>
        <div class="d-flex flex-column mt-4 overflow-auto flex-grow-1 text-darkish">
            <div class="d-flex align-items-center">
                <div class="flex-fill pointer img-upload p-4" onclick="triggerClick('#formFileSm')">
                    <svg xmlns="http://www.w3.org/2000/svg"fill="currentColor"
                        class="" viewBox="0 0 16 16">
                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                        <path
                            d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z" />
                    </svg>
                </div>
                <div class="ms-3 mb-3  align-self-end">
                    <label for="formFileSm" class="form-label fw-bold">Change your profile picture</label>
                    <small class="text-black-50 d-block ms-2 lh-1">• It would be highly recommended to select an image
                        with a 1:1 aspect ratio.</small>
                    <small class="text-black-50 d-block ms-2 mb-1">• Image may stretch otherwise.</small>
                    <input class="form-control form-control-sm" id="formFileSm" type="file" onchange="setProfilePicture(this)">
                </div>
            </div>
            <hr>
            <div class="d-flex flex-column flex-fill justify-content-center">
                <div class="fw-bold">Change user name</div>
                <small class="text-black-50 d-block ms-2 mb-2">• Your user name is what we'll call you.</small>
                <button data-bs-toggle="modal" data-bs-target="#changeUserNameModal"
                    class="spma-button-2 w-50 align-self-center">Change user name</button>
            </div>
            <hr>
            <div class="">
                <div>
                    <div class="fw-bold">Set Theme</div>
                    <small class="text-black-50 d-block ms-2 mb-2">• Change the color of your account to your
                        liking</small>
                </div>

                <div class="py-2 text-center  ms-1 m-0 d-flex" style="overflow-x:auto;">
                        <div class="color-pick d-inline rounded-4 p-1 border pointer text-center text-transparent px-2"
                            style="background-color:rgb(128, 168, 63);" id="mamba-green" onclick="changeAccentColor(this)" value="128, 168, 63"><i
                                class="bi bi-check-circle"></i></div>
                        <div class="color-pick d-inline rounded-4 p-1 border pointer text-center text-transparent px-2"
                            style="background-color:rgb(227, 93, 106);" id="lovely-little-rosy" onclick="changeAccentColor(this)" value="227, 93, 106"><i
                                class="bi bi-check-circle"></i></div>
                        <div class="color-pick d-inline rounded-4 p-1 border pointer text-center text-transparent px-2"
                            style="background-color:rgb(253, 152, 67);" id="absolute-apricot" onclick="changeAccentColor(this)" value="253, 152, 67"><i
                                class="bi bi-check-circle"></i></div>
                        <div class="color-pick d-inline rounded-4 p-1 border pointer text-center text-transparent px-2"
                            style="background-color:rgb(255, 193, 7);" id="marigold" onclick="changeAccentColor(this)" value="255, 193, 7"><i
                                class="bi bi-check-circle"></i></div>
                        <div class="color-pick d-inline rounded-4 p-1 border pointer text-center text-transparent px-2"
                            style="background-color:rgb(71, 159, 118);" id="natural-orchestra" onclick="changeAccentColor(this)" value="71, 159, 118"><i
                                class="bi bi-check-circle"></i></div>
                        <div class="color-pick d-inline rounded-4 p-1 border pointer text-center text-transparent px-2"
                            style="background-color:rgb(10, 162, 192);" id="sea-wonder" onclick="changeAccentColor(this)" value="10, 162, 192"><i
                                class="bi bi-check-circle"></i></div>
                        <div class="color-pick d-inline rounded-4 p-1 border pointer text-center text-transparent px-2"
                            style="background-color:rgb(163, 112, 247);" id="purple-illusionist" onclick="changeAccentColor(this)" value="163, 112, 247"><i
                                class="bi bi-check-circle"></i></div>
                        <div class="color-pick d-inline rounded-4 p-1 border pointer text-center text-transparent px-2"
                            style="background-color:rgb(111, 66, 193);" id="purple-rain" onclick="changeAccentColor(this)" value="111, 66, 193"><i
                                class="bi bi-check-circle"></i></div>
                        <div class="color-pick rounded-4 p-1 border pointer text-center text-transparent px-2 px-2"
                            style="background-color:rgb(126, 203, 180);" id="pale-teal" onclick="changeAccentColor(this)" value="126, 203, 180"><i
                                class="bi bi-check-circle"></i></div>
                        <div class="color-pick rounded-4 p-1 border pointer text-center text-transparent px-2"
                            style="background-color:rgb(230, 133, 181);" id="fuchsia-blush" onclick="changeAccentColor(this)" value="230, 133, 181"><i
                                class="bi bi-check-circle"></i></div>
                        <div class="color-pick rounded-4 p-1 border pointer text-center text-transparent px-2"
                            style="background-color:rgb(222,184,135);" id="burlywood" onclick="changeAccentColor(this)" value="222,184,135"><i
                                class="bi bi-check-circle"></i></div>
                        <div class="color-pick rounded-4 p-1 border pointer text-center text-transparent px-2"
                            style="background-color:rgb(255, 187, 97);" id="orange-quench" onclick="changeAccentColor(this)" value="255, 187, 97"><i
                                class="bi bi-check-circle"></i></div>
                        <div class="color-pick rounded-4 p-1 border pointer text-center text-transparent px-2"
                            style="background-color:rgb(180, 180, 250);" id="purple-illusion" onclick="changeAccentColor(this)" value="180, 180, 250"><i
                                class="bi bi-check-circle"></i></div>
                        <div class="color-pick rounded-4 p-1 border pointer text-center text-transparent px-2"
                            style="background-color:rgb(0, 26, 56);" id="naval-night" onclick="changeAccentColor(this)" value="0, 26, 56"><i
                                class="bi bi-check-circle"></i></div>
                        <div class="color-pick rounded-4 p-1 border pointer text-center text-transparent px-2"
                            style="background-color:rgb(180, 180, 190);" id="enchanted-silver" onclick="changeAccentColor(this)" value="180, 180, 190"><i
                                class="bi bi-check-circle"></i></div>
                        <div class="color-pick rounded-4 p-1 border pointer text-center text-transparent px-2"
                            style="background-color:rgb(80, 80, 80);" id="fiftieth-shade-of-grey" onclick="changeAccentColor(this)" value="80, 80, 80"><i
                                class="bi bi-check-circle"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="changeUserNameModal" tabindex="-1" aria-labelledby="changeUserNameModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header borderless">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0">
                <h5 class="modal-title fw-bold d-block text-center" id="changeUserNameModalLabel">
                    Change User Name</h5>
                <form class="container mt-3">
                    <div>
                        <label for="adminUserName" class="form-label mt-4">
                            User Name</label>
                        <input type="text" class="form-control rounded-pill mx-1" id="adminUserName">
                    </div>
                    <div class="alert alert-danger p-1 my-2 mx-4 border-danger" role="alert" style="visibility:hidden;" id="adminUserNameError">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img"
                            aria-label="Warning:">
                            <path
                                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                        <small>Error: Username not set</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer borderless">
                <div class="w-50">
                    <button class="spma-button-2" type="button" onclick="setAdminUserName()" data-bs-dismiss="modal">Save new user name</button>
                </div>
            </div>
        </div>
    </div>
</div>