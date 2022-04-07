<div class="d-flex flex-column h-100">
    <div class="bg-white container border p-3 h-100 d-flex flex-column" style="border-radius: 25px;">
        <div>
            <h5 class="fw-bold text-darkish">Activity History</h5><small class="text-black-50 d-block">Your can update the status of student activity here</small>
        </div>
        <div class="mt-4 overflow-auto flex-grow-1 ">
            <div class="d-flex justify-content-between border-bottom border-secondary sticky-top bg-white">
                <h5 class="fw-bold text-darkish mb-1 ms-4">Subject</h5>
                <h5 class="fw-bold text-darkish mb-1 me-5 pe-2"></h5>
            </div>
            <div class="accordion accordion-flush" id="accordionFlushExamples">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne"><button class="accordion-button collapsed"
                            type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                            aria-expanded="false" aria-controls="flush-collapseOne">
                            <div class="fs-5"><i class="bi bi-folder me-2"></i></div>

                            English 7
                        </button></h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>