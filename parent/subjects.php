<div class="d-flex flex-column h-100">
    <div class="bg-white container border p-3 h-100 d-flex flex-column" style="border-radius: 25px;">
        <div>
            <h5 class="fw-bold text-darkish">Your Subjects</h5>
            <small class="text-black-50 d-block">Here you can find all your activities categorized by subjects</small>
        </div>
        <div class="mt-4 overflow-auto flex-grow-1 ">
            <div class="d-flex justify-content-between border-bottom border-secondary sticky-top bg-white">
                <h5 class="fw-bold text-darkish mb-1 ms-4">Subject</h5>
                <h5 class="fw-bold text-darkish mb-1 me-5 pe-2">Teacher</h5>
            </div>
            <?php
                $arr = ["0"=>["SubjectName"=>"English", "Teacher"=>"Teacher 1", "Activities"=>["Literary Analysis"=>"done","Deciphering Figurative Language"=>"done","Performance Task: Video Presentation"=>"not done"]],  "1"=>["SubjectName"=>"Filipino", "Teacher"=>"Teacher 2", "Activities"=>["Filipino Activity 1"=>"not done","Filipino Activity 2"=>"done","Filipino Activity 3"=>"not done","Test"=>"not done"]]]; 
                // array_push($arr,); 
                // print_r($arr);
            ?>
            <div class="accordion accordion-flush " id="accordionFlushExample">
                <div class="accordion-item">
                    <?php foreach($arr as $key => $val) :
                        $counter = $key;
                        // print_r($arr[$key])
                    ?>
                    <h2 class="accordion-header" id="flush-heading-<?= $counter?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse-<?= $counter?>" aria-expanded="false" aria-controls="flush-collapse-<?= $counter?>">
                            <div class="fs-5"><i class="bi bi-folder me-2"></i></div>
                            <div class="d-flex justify-content-between w-100 pe-4">
                                <div><?= $val["SubjectName"]?></div>
                                <div><?= $val["Teacher"]?></div>
                            </div>
                        </button>
                    </h2>
                    <div id="flush-collapse-<?= $counter?>" class="accordion-collapse collapse" aria-labelledby="flush-heading-<?= $counter?>"
                        data-bs-parent="#accordionFlushExample">
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
                                <tbody  class="border-0" style="border-color: #e7f1ff !important;">
                                    <?php foreach ($val["Activities"] as $activity => $status):?>
                                    <tr>
                                        <th colspan="2"></th>
                                        <td><small><?= $activity?></small></td>
                                        <?php
                                            if($status === "done")
                                            {
                                                $class = "bi-check-circle-fill text-success";
                                            }else
                                            {
                                                $class = "bi-x-circle-fill text-danger";
                                            }
                                        ?>
                                        <td class="text-center"><i class="bi <?= $class?>"></i></td>

                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>