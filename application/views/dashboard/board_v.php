<link rel="stylesheet" href="<?= base_url('assets'); ?>/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-8">
                <div class="d-flex gap-2 justify-content-between mb-1">
                    <div>
                        <div class="progress mb-1" style="height: 16px;">
                            <div class="progress-bar" role="progressbar"
                                style="width: <?= round(($tasks_status_count['completed']/count($tasks)) * 100); ?>%;"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <?= round(($tasks_status_count['completed']/count($tasks)) * 100); ?>% Tasks Completed
                    </div>
                    <h4 class="mb-0">
                        Hello, Gilang
                    </h4>

                </div>

                <!-- TOP-LEFT -->

                <div class="row border-bottom border-1">

                    <div class="col-xl-4 col-6 mb-4 ">
                        <div class="card" style="border-bottom:4px rgba(40, 199, 111, 0.5) solid;">
                            <div class="card-body ">
                                <div class="badge p-2 bg-label-success mb-2 rounded">
                                    <i class="ti ti-clipboard-text"></i>
                                </div>
                                <h5 class="mb-1 pt-2">New Tasks</h5>
                                <h2 class="mb-0 ms-1 fw-light"><?= $tasks_status_count['new']; ?></h2>
                                <div class="mt-1">
                                    <span class="badge bg-label-secondary">Out of <?= count($tasks); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-6 mb-4 ">
                        <div class="card" style="border-bottom:4px rgba(255, 159, 67, 0.5) solid;">
                            <div class="card-body ">
                                <div class="badge p-2 bg-label-warning mb-2 rounded">
                                    <i class="ti ti-clipboard-list"></i>
                                </div>
                                <h5 class="mb-1 pt-2">On Progress</h5>
                                <h2 class="mb-0 ms-1 fw-light"><?= $tasks_status_count['progress']; ?></h2>
                                <div class="mt-1">
                                    <span class="badge bg-label-secondary">Out of <?= count($tasks); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-6 mb-4 ">
                        <div class="card" style="border-bottom:4px rgba(234, 84, 85, 0.5) solid;">
                            <div class="card-body ">
                                <div class="badge p-2 bg-label-danger mb-2 rounded">
                                    <i class="ti ti-checklist"></i>
                                </div>
                                <h5 class="mb-1 pt-2">Completed</h5>
                                <h2 class="mb-0 ms-1 fw-light"><?= $tasks_status_count['completed']; ?></h2>
                                <div class="mt-1">
                                    <span class="badge bg-label-secondary">Out of <?= count($tasks); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex gap-2 align-items-center my-3">
                    <div class="">
                        <h4 class="m-0">All Tasks</h4>
                    </div>

                </div>
                <div class="nav-align-top">
                    <div class="d-flex justify-content-between align-items-start">
                        <ul class="nav nav-pills mb-3" role="tablist">
                            <li class="nav-item">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-pills-top-new" aria-controls="navs-pills-top-new"
                                    aria-selected="true">New</button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-pills-top-on-progress"
                                    aria-controls="navs-pills-top-on-progress" aria-selected="false">On
                                    Progress</button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-pills-top-completed" aria-controls="navs-pills-top-completed"
                                    aria-selected="false">Completed</button>
                            </li>
                        </ul>

                        <a href='' class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                            <i class="ti ti-plus ti-xs"></i>
                            <span class="align-middle">Add new</span>
                        </a>
                    </div>



                    <div class="tab-content p-0 bg-transparent shadow-none">
                        <div class="tab-pane fade show active" id="navs-pills-top-new" role="tabpanel">
                            <!-- FIRST PANEL  -->
                            <div class="row overflow-auto position-relative vertical-scroll" style="max-height:50vh;">
                                <?php foreach ($tasks as $t): ?>
                                <?php if ($t->CHR_STATUS == 0) : ?>
                                <div class="col-12 col-md-12">
                                    <div class="card card-action mb-3">
                                        <div class="card-header ">
                                            <div class="card-action-title fw-bold"><?= $t->CHR_TASK_TITLE; ?></div>
                                            <div class="item-badges">
                                                <div
                                                    class="badge rounded-pill py-1 px-2 bg-label-<?= $t->CHR_TASK_TAG_COLOR; ?>">
                                                    <?= $t->CHR_TASK_CATEGORY; ?></div>
                                            </div>
                                            <div class="card-action-element">
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="card-collapsible"><i
                                                                class="tf-icons ti ti-chevron-right scaleX-n1-rtl ti-sm"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="collapse">
                                            <div class="card-body pt-0">
                                                <p class="card-text"><?= $t->CHR_TASK_DESC; ?>
                                                </p>
                                            </div>
                                            <div class="card-footer d-flex justify-content-between ">
                                                <div class="d-flex gap-2 align-items-center flex-wrap">
                                                    <small class='text-muted'>
                                                        <?= date("Y-m-d", strtotime($t->CHR_CREATED_DATE)); ?>
                                                    </small>

                                                </div>
                                                <div class=" btn-group">
                                                    <a type="button" class="dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="ti ti-dots-vertical"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item"
                                                                href="<?= base_url('/dashboard_c/update_stage_task/') . $t->INT_TASK_ID; ?>">Start</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                        </li>
                                                        <li><a class="dropdown-item"
                                                                href="<?= base_url('/dashboard_c/delete_task/') . $t->INT_TASK_ID; ?>">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="navs-pills-top-on-progress" role="tabpanel">
                            <!-- SECOND PANEL -->
                            <div class="row overflow-auto position-relative vertical-scroll" style="max-height:50vh;">
                                <?php foreach ($tasks as $t): ?>
                                <?php if ($t->CHR_STATUS == 1) : ?>
                                <div class="col-12 col-md-12">


                                    <div class="card card-action mb-3">
                                        <div class="card-header ">
                                            <div class="card-action-title fw-bold"><?= $t->CHR_TASK_TITLE; ?></div>

                                            <div class="card-action-element">
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="card-collapsible"><i
                                                                class="tf-icons ti ti-chevron-right scaleX-n1-rtl ti-sm"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="collapse">
                                            <div class="card-body pt-0">
                                                <p class="card-text"><?= $t->CHR_TASK_DESC; ?>
                                                </p>
                                            </div>
                                            <div class="card-footer d-flex justify-content-between ">
                                                <div class="d-flex gap-2 align-items-center flex-wrap">
                                                    <small class='text-muted'>
                                                        <?= date("Y-m-d", strtotime($t->CHR_CREATED_DATE)); ?>
                                                    </small>
                                                    <div class="item-badges">
                                                        <div
                                                            class="badge rounded-pill py-1 px-2 bg-label-<?= $t->CHR_TASK_TAG_COLOR; ?>">
                                                            <?= $t->CHR_TASK_CATEGORY; ?></div>
                                                    </div>
                                                </div>
                                                <div class=" btn-group">
                                                    <a type="button" class="dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="ti ti-dots-vertical"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item"
                                                                href="<?= base_url('/dashboard_c/update_stage_task/') . $t->INT_TASK_ID; ?>">Complete</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                        </li>
                                                        <li><a class="dropdown-item"
                                                                href="<?= base_url('/dashboard_c/delete_task/') . $t->INT_TASK_ID; ?>">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="navs-pills-top-completed" role="tabpanel">
                            <!-- THIRD PANEL  -->
                            <div class="row overflow-auto position-relative vertical-scroll" style="max-height:50vh;">
                                <?php foreach ($tasks as $t): ?>
                                <?php if ($t->CHR_STATUS == 2) : ?>
                                <div class="col-12 col-md-12">


                                    <div class="card card-action mb-3">
                                        <div class="card-header ">
                                            <div class="card-action-title fw-bold"><?= $t->CHR_TASK_TITLE; ?></div>

                                            <div class="card-action-element">
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="card-collapsible"><i
                                                                class="tf-icons ti ti-chevron-right scaleX-n1-rtl ti-sm"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="collapse">
                                            <div class="card-body pt-0">
                                                <p class="card-text"><?= $t->CHR_TASK_DESC; ?>
                                                </p>
                                            </div>
                                            <div class="card-footer d-flex justify-content-between ">
                                                <div class="d-flex gap-2 align-items-center flex-wrap">
                                                    <small class='text-muted'>
                                                        <?= date("Y-m-d", strtotime($t->CHR_CREATED_DATE)); ?>
                                                    </small>
                                                    <div class="item-badges">
                                                        <div
                                                            class="badge rounded-pill py-1 px-2 bg-label-<?= $t->CHR_TASK_TAG_COLOR; ?>">
                                                            <?= $t->CHR_TASK_CATEGORY; ?></div>
                                                    </div>
                                                </div>
                                                <div class=" btn-group">
                                                    <a type="button" class="dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="ti ti-dots-vertical"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">

                                                        <li><a class="dropdown-item"
                                                                href="<?= base_url('/dashboard_c/delete_task/') . $t->INT_TASK_ID; ?>">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 ">
                <h4 class="m-0 mb-2 text-center">Active tasks</h4>
                <div class="tab-content pt-0 mt-3 bg-transparent overflow-auto vertical-scroll" style="max-height:98vh;"
                    id='vertical'>
                    <?php $index=0; ?>
                    <?php foreach ($tasks as $t): ?>
                    <?php if ($t->CHR_STATUS == 1 && $index < 6) : ?>
                    <div class="col-12 col-md-12">


                        <div class="card card-action mb-3 bg-transparent"
                            style="border: solid rgba(115, 103, 240, 0.4) 2px;">
                            <div class="card-header">
                                <div class="card-action-title fw-bold"><?= $t->CHR_TASK_TITLE; ?></div>
                            </div>
                            <div class="show">
                                <div class="card-body pt-0">
                                    <p class="card-text"><?= $t->CHR_TASK_DESC; ?>
                                    </p>
                                </div>
                                <div class="card-footer d-flex justify-content-between ">
                                    <div class="d-flex gap-2 align-items-center flex-wrap">
                                        <small class='text-lighter'>
                                            <?= date("Y-m-d", strtotime($t->CHR_CREATED_DATE)); ?>
                                        </small>
                                        <div class="item-badges">
                                            <div
                                                class="badge rounded-pill py-1 px-2 bg-label-<?= $t->CHR_TASK_TAG_COLOR; ?>">
                                                <?= $t->CHR_TASK_CATEGORY; ?></div>
                                        </div>
                                    </div>
                                    <div class=" btn-group">
                                        <a type="button" class="dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu">

                                            <li><a class="dropdown-item"
                                                    href="<?= base_url('/dashboard_c/delete_task/') . $t->INT_TASK_ID; ?>">Delete</a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <?php $index+=1; ?>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
        <form action="<?= base_url('dashboard_c/add_task'); ?>" method="post">

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Add Task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" id="title" class="form-control" placeholder="Name for your task"
                                    name="task-title">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="task-desc">Description</label>
                                <textarea class="form-control" id="task-desc" style="height: 100px"
                                    placeholder='What is it about?' name="task-desc"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="task-category" class="form-label">Category</label>
                                <input type="text" id="task-category" class="form-control"
                                    placeholder="E.g. Sports, Grocery, Health etc." name="task-category">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="task-tag" class="form-label">Tag</label>
                                <select class="form-select" name="task-tag" id="task-tag">
                                    <option selected disabled>Tag</option>
                                    <option value="success" class="text-success">Green</option>
                                    <option value="warning" class="text-warning">Yellow</option>
                                    <option value="danger" class="text-danger">Red</option>
                                    <option value="info" class="text-info">Blue</option>
                                    <option value="primary" class="text-primary">Purple</option>
                                    <option value="dark" class="text-dark">Black</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save task</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {

        var elements = document.querySelectorAll(".vertical-scroll");
        console.log(elements);
        console.log('test elements');

        elements.forEach(function(element) {
            new PerfectScrollbar(element, {
                wheelPropagation: true,
                suppressScrollX: true,
                wheelSpeed: 0.2,
                scrollXMarginOffset: 10,
            });
        });
    });
    </script>