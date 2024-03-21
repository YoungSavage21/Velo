<style>
.kanban-item:hover {
    cursor: grab;
}

.kanban-content:hover {
    cursor: pointer;
}

.is-grabbing {
    cursor: grabbing !important;
}

.app-kanban .kanban-wrapper .kanban-container .kanban-board .kanban-board-header .kanban-title-board {
    font-weight: 500;
}
</style>
<?php include FCPATH . 'assets/js/kanban_script.php'; ?>
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="app-kanban">
            <!-- Kanban Wrapper -->
            <!-- <input type="text" id="username" class="form-control" placeholder="Username"> -->

            <div class="kanban-wrapper ps pb-5" style="height: calc(100vh - 8.5rem);">
                <?php $alert = $this->session->flashdata('alert') ?>
                <?php if ($alert):?>
                <div class="alert alert-<?= $alert['color'];?> alert-dismissible ms-3 me-3" role="alert">
                    <?= $alert['message'];?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
                <?php endif; ?>
                <div class="kanban-container" style="width: 840px;">
                    <div class="kanban-board" style="width: 250px; margin-left: 15px; margin-right: 15px;">
                        <header class="kanban-board-header">
                            <div class="kanban-title-board">New</div>
                            <!-- <div class="dropdown"><i class="dropdown-toggle ti ti-dots-vertical cursor-pointer"
                                    id="board-dropdown" data-bs-toggle="dropdown"></i>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item delete-board" href="javascript:void(0)">
                                        <i class="ti ti-trash ti-xs" me-1=""></i>
                                        <span class="align-middle">Delete</span></a><a class="dropdown-item"
                                        href="javascript:void(0)"><i class="ti ti-edit ti-xs" me-1=""></i>
                                        <span class="align-middle">Rename</span></a><a class="dropdown-item"
                                        href="javascript:void(0)"><i class="ti ti-archive ti-xs" me-1=""></i>
                                        <span class="align-middle">Archive</span></a>
                                </div>
                            </div> -->
                            <button class="kanban-title-button btn" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasEnd" onclick="status_code(0)">+ Add New Item</button>

                        </header>
                        <main class="kanban-drag" id="0">
                            <?php foreach ($tasks as $t): ?>
                            <?php if ($t->CHR_STATUS == 0) : ?>
                            <div class="kanban-item" custom-task-id="<?= $t->INT_TASK_ID; ?>">
                                <div class=" d-flex justify-content-between flex-wrap align-items-center mb-2 pb-1">
                                    <div class="item-badges">
                                        <div class="badge rounded-pill bg-label-<?= $t->CHR_TASK_TAG_COLOR; ?>">
                                            <?= $t->CHR_TASK_CATEGORY; ?></div>
                                    </div>
                                    <div class="dropdown kanban-tasks-item-dropdown">
                                        <i class="dropdown-toggle ti ti-dots-vertical" id="kanban-tasks-item-dropdown"
                                            data-bs-toggle="dropdown"></i>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item"
                                                href="<?= base_url('/dashboard_c/delete_task/') . $t->INT_TASK_ID; ?>">
                                                <i class="ti ti-trash ti-xs"></i>
                                                <span class="align-middle">Delete</span>
                                            </a>
                                            <a class="dropdown-item edit-board" data-bs-toggle="offcanvas"
                                                data-bs-target="#offcanvasEdit">
                                                <i class="ti ti-edit ti-xs"></i>
                                                <span class="align-middle">Edit</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="kanban-content" custom-task-id="<?= $t->INT_TASK_ID; ?>"
                                    data-bs-toggle="modal" data-bs-target="#modalScrollable">
                                    <?php if ($t->CHR_IMAGE) : ?>
                                    <img class="img-fluid rounded mb-2"
                                        src="<?= base_url('assets'); ?>/img/upload/<?= $t->CHR_IMAGE; ?>">
                                    <?php endif; ?>
                                    <span class="kanban-text mb-1"><?= $t->CHR_TASK_TITLE; ?></span>
                                    <div class="d-flex justify-content-between align-items-center flex-wrap mt-2 pt-1">
                                        <div class="d-flex">
                                            <small class='text-lighter'>
                                                <?= date("Y-m-d", strtotime($t->CHR_CREATED_DATE)); ?>
                                            </small>
                                        </div>
                                        <div class="avatar-group d-flex align-items-center assigned-avatar">
                                            <?php foreach ($t->COL_ID as $user): ?>
                                            <div class="avatar avatar-xs" data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                data-bs-original-title="<?= $user->CHR_FIRST_NAME; ?>"
                                                custom-user-id="<?= $user->INT_USER_ID; ?>">
                                                <img src="<?= base_url('assets'); ?>/img/avatars/<?= $user->CHR_PROFILE_PIC; ?>"
                                                    alt="Avatar" class="rounded-circle  pull-up">
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </main>

                    </div>
                    <div data-id="board-in-review" data-order="2" class="kanban-board"
                        style="width: 250px; margin-left: 15px; margin-right: 15px;">
                        <header class="kanban-board-header">
                            <div class="kanban-title-board">In Progress</div>
                            <!-- <div class="dropdown"><i class="dropdown-toggle ti ti-dots-vertical cursor-pointer"
                                    id="board-dropdown" data-bs-toggle="dropdown"></i>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item delete-board" href="javascript:void(0)">
                                        <i class="ti ti-trash ti-xs" me-1=""></i>
                                        <span class="align-middle">Delete</span></a><a class="dropdown-item"
                                        href="javascript:void(0)"><i class="ti ti-edit ti-xs" me-1=""></i>
                                        <span class="align-middle">Rename</span></a><a class="dropdown-item"
                                        href="javascript:void(0)"><i class="ti ti-archive ti-xs" me-1=""></i>
                                        <span class="align-middle">Archive</span></a>
                                </div>
                            </div>-->
                            <button class="kanban-title-button btn" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasEnd" onclick="status_code(1)">+ Add New Item</button>
                        </header>
                        <main class="kanban-drag" id="1">
                            <?php foreach ($tasks as $t): ?>
                            <?php if ($t->CHR_STATUS == 1) : ?>
                            <div class="kanban-item" custom-task-id="<?= $t->INT_TASK_ID; ?>">
                                <div class=" d-flex justify-content-between flex-wrap align-items-center mb-2 pb-1">
                                    <div class="item-badges">
                                        <div class="badge rounded-pill bg-label-<?= $t->CHR_TASK_TAG_COLOR; ?>">
                                            <?= $t->CHR_TASK_CATEGORY; ?></div>
                                    </div>
                                    <div class="dropdown kanban-tasks-item-dropdown">
                                        <i class="dropdown-toggle ti ti-dots-vertical" id="kanban-tasks-item-dropdown"
                                            data-bs-toggle="dropdown"></i>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item"
                                                href="<?= base_url('/dashboard_c/delete_task/') . $t->INT_TASK_ID; ?>">
                                                <i class="ti ti-trash ti-xs"></i>
                                                <span class="align-middle">Delete</span>
                                            </a>
                                            <a class="dropdown-item edit-board" data-bs-toggle="offcanvas"
                                                data-bs-target="#offcanvasEdit">
                                                <i class="ti ti-edit ti-xs"></i>
                                                <span class="align-middle">Edit</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="kanban-content" custom-task-id="<?= $t->INT_TASK_ID; ?>"
                                    data-bs-toggle="modal" data-bs-target="#modalScrollable">
                                    <?php if ($t->CHR_IMAGE) : ?>
                                    <img class="img-fluid rounded mb-2"
                                        src="<?= base_url('assets'); ?>/img/upload/<?= $t->CHR_IMAGE; ?>">
                                    <?php endif; ?>
                                    <span class="kanban-text mb-1"><?= $t->CHR_TASK_TITLE; ?></span>
                                    <div class="d-flex justify-content-between align-items-center flex-wrap mt-2 pt-1">
                                        <div class="d-flex">
                                            <small class='text-lighter'>
                                                <?= date("Y-m-d", strtotime($t->CHR_CREATED_DATE)); ?>
                                            </small>
                                        </div>
                                        <div class="avatar-group d-flex align-items-center assigned-avatar">
                                            <?php foreach ($t->COL_ID as $user): ?>
                                            <div class="avatar avatar-xs" data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                data-bs-original-title="<?= $user->CHR_FIRST_NAME; ?>"
                                                custom-user-id="<?= $user->INT_USER_ID; ?>">
                                                <img src="<?= base_url('assets'); ?>/img/avatars/<?= $user->CHR_PROFILE_PIC; ?>"
                                                    alt="Avatar" class="rounded-circle  pull-up">
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </main>

                    </div>
                    <div data-id="board-done" data-order="3" class="kanban-board"
                        style="width: 250px; margin-left: 15px; margin-right: 15px;">
                        <header class="kanban-board-header">
                            <div class="kanban-title-board">In Review</div>
                            <!-- <div class="dropdown"><i class="dropdown-toggle ti ti-dots-vertical cursor-pointer"
                                    id="board-dropdown" data-bs-toggle="dropdown"></i>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item delete-board" href="javascript:void(0)">
                                        <i class="ti ti-trash ti-xs" me-1=""></i>
                                        <span class="align-middle">Delete</span></a><a class="dropdown-item"
                                        href="javascript:void(0)"><i class="ti ti-edit ti-xs" me-1=""></i>
                                        <span class="align-middle">Rename</span></a><a class="dropdown-item"
                                        href="javascript:void(0)"><i class="ti ti-archive ti-xs" me-1=""></i>
                                        <span class="align-middle">Archive</span></a>
                                </div>
                            </div> -->
                            <button class="kanban-title-button btn" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasEnd" onclick="status_code(2)">+ Add New Item</button>

                        </header>
                        <main class="kanban-drag" id="2">
                            <?php foreach ($tasks as $t): ?>
                            <?php if ($t->CHR_STATUS == 2) : ?>
                            <div class="kanban-item" custom-task-id="<?= $t->INT_TASK_ID; ?>">
                                <div class=" d-flex justify-content-between flex-wrap align-items-center mb-2 pb-1">
                                    <div class="item-badges">
                                        <div class="badge rounded-pill bg-label-<?= $t->CHR_TASK_TAG_COLOR; ?>">
                                            <?= $t->CHR_TASK_CATEGORY; ?></div>
                                    </div>
                                    <div class="dropdown kanban-tasks-item-dropdown">
                                        <i class="dropdown-toggle ti ti-dots-vertical" id="kanban-tasks-item-dropdown"
                                            data-bs-toggle="dropdown"></i>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item"
                                                href="<?= base_url('/dashboard_c/delete_task/') . $t->INT_TASK_ID; ?>">
                                                <i class="ti ti-trash ti-xs"></i>
                                                <span class="align-middle">Delete</span>
                                            </a>
                                            <a class="dropdown-item edit-board" data-bs-toggle="offcanvas"
                                                data-bs-target="#offcanvasEdit">
                                                <i class="ti ti-edit ti-xs"></i>
                                                <span class="align-middle">Edit</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="kanban-content" custom-task-id="<?= $t->INT_TASK_ID; ?>"
                                    data-bs-toggle="modal" data-bs-target="#modalScrollable">
                                    <?php if ($t->CHR_IMAGE) : ?>
                                    <img class="img-fluid rounded mb-2"
                                        src="<?= base_url('assets'); ?>/img/upload/<?= $t->CHR_IMAGE; ?>">
                                    <?php endif; ?>
                                    <span class="kanban-text mb-1"><?= $t->CHR_TASK_TITLE; ?></span>
                                    <div class="d-flex justify-content-between align-items-center flex-wrap mt-2 pt-1">
                                        <div class="d-flex">
                                            <small class='text-lighter'>
                                                <?= date("Y-m-d", strtotime($t->CHR_CREATED_DATE)); ?>
                                            </small>
                                        </div>
                                        <div class="avatar-group d-flex align-items-center assigned-avatar">
                                            <?php foreach ($t->COL_ID as $user): ?>
                                            <div class="avatar avatar-xs" data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                data-bs-original-title="<?= $user->CHR_FIRST_NAME; ?>"
                                                custom-user-id="<?= $user->INT_USER_ID; ?>">
                                                <img src="<?= base_url('assets'); ?>/img/avatars/<?= $user->CHR_PROFILE_PIC; ?>"
                                                    alt="Avatar" class="rounded-circle  pull-up">
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </main>
                    </div>

                    <div data-id="board-done" data-order="3" class="kanban-board"
                        style="width: 250px; margin-left: 15px; margin-right: 15px;">
                        <header class="kanban-board-header">
                            <div class="kanban-title-board">Completed</div>
                            <!-- <div class="dropdown"><i class="dropdown-toggle ti ti-dots-vertical cursor-pointer"
                                    id="board-dropdown" data-bs-toggle="dropdown"></i>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item delete-board" href="">
                                        <i class="ti ti-trash ti-xs"></i>
                                        <span class="align-middle">Delete</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="ti ti-edit ti-xs"></i>
                                        <span class="align-middle">Rename</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="ti ti-archive ti-xs"></i>
                                        <span class="align-middle">Archive</span>
                                    </a>
                                </div>
                            </div> -->
                        </header>
                        <main class="kanban-drag" id="3">
                            <?php foreach ($tasks as $t): ?>
                            <?php if ($t->CHR_STATUS == 3) : ?>
                            <div class="kanban-item" custom-task-id="<?= $t->INT_TASK_ID; ?>">
                                <div class=" d-flex justify-content-between flex-wrap align-items-center mb-2 pb-1">
                                    <div class="item-badges">
                                        <div class="badge rounded-pill bg-label-<?= $t->CHR_TASK_TAG_COLOR; ?>">
                                            <?= $t->CHR_TASK_CATEGORY; ?></div>
                                    </div>
                                    <div class="dropdown kanban-tasks-item-dropdown">
                                        <i class="dropdown-toggle ti ti-dots-vertical" id="kanban-tasks-item-dropdown"
                                            data-bs-toggle="dropdown"></i>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item"
                                                href="<?= base_url('/dashboard_c/delete_task/') . $t->INT_TASK_ID; ?>">
                                                <i class="ti ti-trash ti-xs"></i>
                                                <span class="align-middle">Delete</span>
                                            </a>
                                            <a class="dropdown-item edit-board" data-bs-toggle="offcanvas"
                                                data-bs-target="#offcanvasEdit">
                                                <i class="ti ti-edit ti-xs"></i>
                                                <span class="align-middle">Edit</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="kanban-content" custom-task-id="<?= $t->INT_TASK_ID; ?>"
                                    data-bs-toggle="modal" data-bs-target="#modalScrollable">
                                    <?php if ($t->CHR_IMAGE) : ?>
                                    <img class="img-fluid rounded mb-2"
                                        src="<?= base_url('assets'); ?>/img/upload/<?= $t->CHR_IMAGE; ?>">
                                    <?php endif; ?>
                                    <span class="kanban-text mb-1"><?= $t->CHR_TASK_TITLE; ?></span>
                                    <div class="d-flex justify-content-between align-items-center flex-wrap mt-2 pt-1">
                                        <div class="d-flex">
                                            <small class='text-lighter'>
                                                <?= date("Y-m-d", strtotime($t->CHR_CREATED_DATE)); ?>
                                            </small>
                                        </div>
                                        <div class="avatar-group d-flex align-items-center assigned-avatar">
                                            <?php foreach ($t->COL_ID as $user): ?>
                                            <div class="avatar avatar-xs" data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                data-bs-original-title="<?= $user->CHR_FIRST_NAME; ?>"
                                                custom-user-id="<?= $user->INT_USER_ID; ?>">
                                                <img src="<?= base_url('assets'); ?>/img/avatars/<?= $user->CHR_PROFILE_PIC; ?>"
                                                    alt="Avatar" class="rounded-circle  pull-up">
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Offcanvas Add New Item -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEndLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasEndLabel" class="offcanvas-title">Add Task</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mb-auto mx-0 flex-grow-0">
        <form id="add_form" action="<?= base_url('dashboard_c/add_task'); ?>" method="post"
            enctype="multipart/form-data">
            <input type="hidden" id="CHR_STATUS" name="CHR_STATUS" value="">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" class="form-control" placeholder="Name for your task" name="task-title">
                <small class="text-danger ps-1 d-none" id="add_title_alert">Task title is required</small>
            </div>
            <div class="mb-3">
                <label for="task-desc">Description</label>
                <textarea class="form-control" id="task-desc" style="height: 100px" placeholder='What is it about?'
                    name="task-desc"></textarea>
                <small class="text-danger ps-1 d-none" id="add_desc_alert">Task description is required</small>

            </div>
            <div class="mb-3">
                <label for="task-category" class="form-label">Category</label>
                <input type="text" id="task-category" class="form-control"
                    placeholder="E.g. Sports, Grocery, Health etc." name="task-category">
                <small class="text-danger ps-1 d-none" id="add_category_alert">Task category is required</small>

            </div>
            <div class="mb-3">
                <label for="task-tag" class="form-label">Tag</label>
                <select class="select2 select2-label form-select" name="task-tag" id="task-tag">
                    <option value="success" data-color="bg-label-success">Green</option>
                    <option value="warning" data-color="bg-label-warning">Yellow</option>
                    <option value="danger" data-color="bg-label-danger">Red</option>
                    <option value="info" data-color="bg-label-info">Blue</option>
                    <option value="primary" data-color="bg-label-primary">Purple</option>
                    <option value="secondary" data-color="bg-label-secondary">Gray</option>
                    <option value="dark" data-color="bg-label-dark">Black</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="due-date">Due Date</label>
                <input class="form-control" type="datetime-local" value="<?= date("Y-m-d\TH:i"); ?>" name="due-date" />
            </div>

            <div class="mb-3">
                <label class="form-label">Assigned</label>
                <div class="assigned d-flex flex-wrap mb-1" id="assigned_wrapper">

                    <div class="avatar avatar-xs me-1" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-original-title="<?= $session['first-name']; ?>">
                        <input type="hidden" value="<?= $session['user-id']; ?>" name="assigned[]">
                        <img src="<?= base_url('assets'); ?>/img/avatars/<?= $session['profile']; ?>" alt="Avatar"
                            class="rounded-circle">
                    </div>

                    <div class="avatar avatar-xs ms-1" id="assigned_add">
                        <span class="avatar-initial rounded-circle bg-label-secondary dropup">
                            <a data-bs-toggle="dropdown" class="dropdown" data-bs-auto-close="outside">
                                <i class="ti ti-plus ti-xs text-heading"></i>
                            </a>
                            <div class="dropdown-menu" style="width: 300px;">
                                <div class="px-4 py-3 d-flex flex-column">
                                    <div class="mb-3">
                                        <label class="form-label fw-light mb-2">
                                            Add Member
                                        </label>
                                        <span class="text-lowercase">
                                            <input type="text" id="username" class="form-control typeahead"
                                                placeholder="Username">
                                        </span>
                                    </div>
                                    <button type="button" onclick="add_member()"
                                        class="btn btn-primary py-2 px-3x w-50 m-auto align-content-center">Add</button>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
                <small class="text-danger" id="assigned_alert"></small>
            </div>

            <div class="mb-4">
                <label class="form-label" for="attachments">Add Image</label>
                <input type="file" class="form-control" id="attachments" name="image" />
            </div>
            <div class="d-flex flex-wrap">
                <button type="button" onclick="add_validation()" class="btn btn-primary me-3">
                    Add
                </button>
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Offcanvas Edit Item -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEdit" aria-labelledby="offcanvasEndLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasEndLabel" class="offcanvas-title">Edit Task</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mb-auto mx-0 flex-grow-0">
        <form id="edit_form" action="<?= base_url('dashboard_c/edit_task'); ?>" method="post"
            enctype="multipart/form-data">
            <input type="hidden" name="CHR_STATUS" value="" id="edit-status">
            <input type="hidden" name="INT_TASK_ID" value="" id="edit-id">
            <div class="mb-3">
                <label for="edit-title" class="form-label">Title</label>
                <input type="text" id="edit-title" class="form-control" placeholder="Name for your task"
                    name="task-title">
                <small class="text-danger ps-1 d-none" id="edit_title_alert">Task title is required</small>

            </div>
            <div class="mb-3">
                <label for="edit-desc">Description</label>
                <textarea class="form-control" id="edit-desc" style="height: 100px" placeholder='What is it about?'
                    name="task-desc"></textarea>
                <small class="text-danger ps-1 d-none" id="edit_desc_alert">Task title is required</small>

            </div>
            <div class="mb-3">
                <label for="edit-category" class="form-label">Category</label>
                <input type="text" id="edit-category" class="form-control"
                    placeholder="E.g. Sports, Grocery, Health etc." name="task-category">
                <small class="text-danger ps-1 d-none" id="edit_category_alert">Task title is required</small>

            </div>
            <div class="mb-3">
                <label for="task-tag" class="form-label">Tag</label>
                <select class="select2 select2-label form-select" name="task-tag" id="edit-tag">
                    <option value="success" data-color="bg-label-success">Green</option>
                    <option value="warning" data-color="bg-label-warning">Yellow</option>
                    <option value="danger" data-color="bg-label-danger">Red</option>
                    <option value="info" data-color="bg-label-info">Blue</option>
                    <option value="primary" data-color="bg-label-primary">Purple</option>
                    <option value="secondary" data-color="bg-label-secondary">Gray</option>
                    <option value="dark" data-color="bg-label-dark">Black</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="due-date">Due Date</label>
                <input id='edit-date' class="form-control" type="datetime-local" name="due-date" />
            </div>
            <div class="mb-3">
                <label class="form-label">Assigned</label>
                <div class="assigned d-flex flex-wrap mb-1" id="assigned_edit_wrapper">

                    <div class="avatar avatar-xs me-1 avatar-profile" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-original-title="<?= $session['first-name']; ?>">
                        <input type="hidden" value="<?= $session['user-id']; ?>" name="assigned[]">
                        <img src="<?= base_url('assets'); ?>/img/avatars/<?= $session['profile']; ?>" alt="Avatar"
                            class="rounded-circle">
                    </div>

                    <div class="avatar avatar-xs ms-1" id="assigned_edit">
                        <span class="avatar-initial rounded-circle bg-label-secondary dropup">
                            <a data-bs-toggle="dropdown" class="dropdown" data-bs-auto-close="outside">
                                <i class="ti ti-plus ti-xs text-heading"></i>
                            </a>
                            <div class="dropdown-menu" style="width: 300px;">
                                <div class="px-4 py-3 d-flex flex-column">
                                    <div class="mb-3">
                                        <label class="form-label fw-light mb-2">
                                            Add Member
                                        </label>
                                        <span class="text-lowercase">
                                            <input type="text" id="username_edit" class="form-control typeahead"
                                                placeholder="Username">
                                        </span>
                                    </div>
                                    <button type="button" onclick="add_member_for_edit()"
                                        class="btn btn-primary py-2 px-3x w-50 m-auto align-content-center">Add</button>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
                <small class="text-danger" id="assigned_alert_edit"></small>
            </div>

            <div class="mb-4">
                <label class="form-label" for="attachments">Add Image</label>
                <input type="file" class="form-control" id="attachments" name="image" />
            </div>
            <div class="d-flex flex-wrap">
                <button type="button" onclick="edit_validation()" class="btn btn-primary me-3">
                    Update
                </button>
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modalScrollable" tabindex="-1" aria-labelledby="modalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body pt-0 pb-1">
                <img src="<?= base_url('assets');?>/img/upload/test_image.jpg" class="mb-2 img-fluid w-100"
                    id="view-image">
                <div class="mt-2 ms-2">
                    <h3 class="mb-3" id="view-title">Enable One Time Password</h3>
                    <p class="mt-2" id="view-desc"></p>
                </div>
            </div>

            <div class="modal-footer">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <div class="badge rounded-pill bg-label-success" id="view-category">
                        Planning
                    </div>
                    <div>
                        <small class='text-lighter me-3' id="view-date">
                            12-28-2003
                        </small>
                        <button type="button" class="btn btn-primary me-2" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>