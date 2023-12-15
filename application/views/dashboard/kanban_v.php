<link rel="stylesheet" href="<?= base_url('assets'); ?>/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.6.6/dragula.css" />

<style>
.is-dragged {
    box-shadow: 0 0.25rem 1.125rem rgba(115, 103, 240, 0.8) !important;
}
</style>
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="app-kanban">
            <!-- Kanban Wrapper -->
            <div class="kanban-wrapper ps" style="height: calc(100vh - 8.5rem);">
                <div class="kanban-container" style="width: 840px;">
                    <div class="kanban-board" style="width: 250px; margin-left: 15px; margin-right: 15px;">
                        <header class="kanban-board-header">
                            <div class="kanban-title-board">New</div>
                            <div class="dropdown"><i class="dropdown-toggle ti ti-dots-vertical cursor-pointer"
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
                            </div>
                            <button class="kanban-title-button btn" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasEnd" onclick="status_code(0)">+ Add New Item</button>

                        </header>
                        <main class="kanban-drag" id="0">
                            <?php foreach ($tasks as $t): ?>
                            <?php if ($t->CHR_STATUS == 0) : ?>
                            <div class="kanban-item" custom-task-id="<?= $t->INT_TASK_ID; ?>">
                                <div class="d-flex justify-content-between flex-wrap align-items-center mb-2 pb-1">
                                    <div class="item-badges">
                                        <div class="badge rounded-pill bg-label-<?= $t->CHR_TASK_TAG_COLOR; ?>">
                                            <?= $t->CHR_TASK_CATEGORY; ?></div>
                                    </div>
                                    <div class="dropdown kanban-tasks-item-dropdown">
                                        <i class="dropdown-toggle ti ti-dots-vertical" id="kanban-tasks-item-dropdown"
                                            data-bs-toggle="dropdown"></i>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="javascript:void(0)">Copy task link</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Duplicate task</a>
                                            <a class="dropdown-item delete-task" href="javascript:void(0)">Delete</a>
                                        </div>
                                    </div>
                                </div>
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
                                        <div class="avatar avatar-xs" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-original-title="<?= $user->CHR_FIRST_NAME; ?>">
                                            <img src="<?= base_url('assets'); ?>/img/avatars/<?= $user->CHR_PROFILE_PIC; ?>"
                                                alt="Avatar" class="rounded-circle  pull-up">
                                        </div>
                                        <?php endforeach; ?>
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
                            <div class="dropdown"><i class="dropdown-toggle ti ti-dots-vertical cursor-pointer"
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
                            </div><button class="kanban-title-button btn" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasEnd" onclick="status_code(1)">+ Add New Item</button>
                        </header>
                        <main class="kanban-drag" id='1'>
                            <?php foreach ($tasks as $t): ?>
                            <?php if ($t->CHR_STATUS == 1) : ?>
                            <div class="kanban-item" custom-task-id="<?= $t->INT_TASK_ID; ?>">
                                <div class="d-flex justify-content-between flex-wrap align-items-center mb-2 pb-1">
                                    <div class="item-badges">
                                        <div class="badge rounded-pill bg-label-<?= $t->CHR_TASK_TAG_COLOR; ?>">
                                            <?= $t->CHR_TASK_CATEGORY; ?></div>
                                    </div>
                                    <div class="dropdown kanban-tasks-item-dropdown">
                                        <i class="dropdown-toggle ti ti-dots-vertical" id="kanban-tasks-item-dropdown"
                                            data-bs-toggle="dropdown"></i>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="javascript:void(0)">Copy task link</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Duplicate task</a>
                                            <a class="dropdown-item delete-task" href="javascript:void(0)">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($t->CHR_IMAGE) : ?>
                                <img class="img-fluid rounded mb-2"
                                    src="<?= base_url('assets'); ?>/img/upload/<?= $t->CHR_IMAGE; ?>">
                                <?php endif; ?>
                                <span class="kanban-text mb-1"><?= $t->CHR_TASK_TITLE; ?></span>
                                <div class="d-flex justify-content-between align-items-center flex-wrap mt-2 pt-1">
                                    <div class="d-flex">
                                        <span class="d-flex align-items-center me-2">
                                            <i class="ti ti-paperclip ti-xs me-1"></i>
                                            <span class="attachments">4</span>
                                        </span>
                                        <span class="d-flex align-items-center ms-1">
                                            <i class="ti ti-message-dots ti-xs me-1"></i>
                                            <span> 12 </span>
                                        </span>
                                    </div>
                                    <div class="avatar-group d-flex align-items-center assigned-avatar">
                                        <?php foreach ($t->COL_ID as $user): ?>
                                        <div class="avatar avatar-xs" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-original-title="<?= $user->CHR_FIRST_NAME; ?>">
                                            <img src="<?= base_url('assets'); ?>/img/avatars/<?= $user->CHR_PROFILE_PIC; ?>"
                                                alt="Avatar" class="rounded-circle  pull-up">
                                        </div>
                                        <?php endforeach; ?>
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
                            <div class="dropdown"><i class="dropdown-toggle ti ti-dots-vertical cursor-pointer"
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
                            </div>
                            <button class="kanban-title-button btn" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasEnd" onclick="status_code(2)">+ Add New Item</button>

                        </header>
                        <main class="kanban-drag" id='2'>
                            <?php foreach ($tasks as $t): ?>
                            <?php if ($t->CHR_STATUS == 2) : ?>
                            <div class="kanban-item" custom-task-id="<?= $t->INT_TASK_ID; ?>">
                                <div class="d-flex justify-content-between flex-wrap align-items-center mb-2 pb-1">
                                    <div class="item-badges">
                                        <div class="badge rounded-pill bg-label-<?= $t->CHR_TASK_TAG_COLOR; ?>">
                                            <?= $t->CHR_TASK_CATEGORY; ?></div>
                                    </div>
                                    <div class="dropdown kanban-tasks-item-dropdown">
                                        <i class="dropdown-toggle ti ti-dots-vertical" id="kanban-tasks-item-dropdown"
                                            data-bs-toggle="dropdown"></i>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="javascript:void(0)">Copy task link</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Duplicate task</a>
                                            <a class="dropdown-item delete-task" href="javascript:void(0)">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($t->CHR_IMAGE) : ?>
                                <img class="img-fluid rounded mb-2"
                                    src="<?= base_url('assets'); ?>/img/upload/<?= $t->CHR_IMAGE; ?>">
                                <?php endif; ?>
                                <span class="kanban-text mb-1"><?= $t->CHR_TASK_TITLE; ?></span>
                                <div class="d-flex justify-content-between align-items-center flex-wrap mt-2 pt-1">
                                    <div class="d-flex">
                                        <span class="d-flex align-items-center me-2">
                                            <i class="ti ti-paperclip ti-xs me-1"></i>
                                            <span class="attachments">4</span>
                                        </span>
                                        <span class="d-flex align-items-center ms-1">
                                            <i class="ti ti-message-dots ti-xs me-1"></i>
                                            <span> 12 </span>
                                        </span>
                                    </div>
                                    <div class="avatar-group d-flex align-items-center assigned-avatar">
                                        <?php foreach ($t->COL_ID as $user): ?>
                                        <div class="avatar avatar-xs" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-original-title="<?= $user->CHR_FIRST_NAME; ?>">
                                            <img src="<?= base_url('assets'); ?>/img/avatars/<?= $user->CHR_PROFILE_PIC; ?>"
                                                alt="Avatar" class="rounded-circle  pull-up">
                                        </div>
                                        <?php endforeach; ?>
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
                            <div class="dropdown"><i class="dropdown-toggle ti ti-dots-vertical cursor-pointer"
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
                            </div>
                            <button class="kanban-title-button btn" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasEnd" onclick="status_code(3)">+ Add New Item</button>

                        </header>
                        <main class="kanban-drag" id='3'>
                            <?php foreach ($tasks as $t): ?>
                            <?php if ($t->CHR_STATUS == 3) : ?>
                            <div class="kanban-item" custom-task-id="<?= $t->INT_TASK_ID; ?>">
                                <div class="d-flex justify-content-between flex-wrap align-items-center mb-2 pb-1">
                                    <div class="item-badges">
                                        <div class="badge rounded-pill bg-label-<?= $t->CHR_TASK_TAG_COLOR; ?>">
                                            <?= $t->CHR_TASK_CATEGORY; ?></div>
                                    </div>
                                    <div class="dropdown kanban-tasks-item-dropdown">
                                        <i class="dropdown-toggle ti ti-dots-vertical" id="kanban-tasks-item-dropdown"
                                            data-bs-toggle="dropdown"></i>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item delete-board"
                                                href="<?= base_url('/dashboard_c/delete_task/') . $t->INT_TASK_ID; ?>">
                                                <i class="ti ti-trash ti-xs"></i>
                                                <span class="align-middle">Delete</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($t->CHR_IMAGE) : ?>
                                <img class="img-fluid rounded mb-2"
                                    src="<?= base_url('assets'); ?>/img/upload/<?= $t->CHR_IMAGE; ?>">
                                <?php endif; ?>
                                <span class="kanban-text mb-1"><?= $t->CHR_TASK_TITLE; ?></span>
                                <div class="d-flex justify-content-between align-items-center flex-wrap mt-2 pt-1">
                                    <div class="d-flex">
                                        <span class="d-flex align-items-center me-2">
                                            <i class="ti ti-paperclip ti-xs me-1"></i>
                                            <span class="attachments">4</span>
                                        </span>
                                        <span class="d-flex align-items-center ms-1">
                                            <i class="ti ti-message-dots ti-xs me-1"></i>
                                            <span> 12 </span>
                                        </span>
                                    </div>
                                    <div class="avatar-group d-flex align-items-center assigned-avatar">
                                        <?php foreach ($t->COL_ID as $user): ?>
                                        <div class="avatar avatar-xs" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-original-title="<?= $user->CHR_FIRST_NAME; ?>">
                                            <img src="<?= base_url('assets'); ?>/img/avatars/<?= $user->CHR_PROFILE_PIC; ?>"
                                                alt="Avatar" class="rounded-circle  pull-up">
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </main>
                    </div>

                    <form class="kanban-add-new-board">
                        <label class="kanban-add-board-btn" for="kanban-add-board-input">
                            <i class="ti ti-plus ti-xs"></i>
                            <span class="align-middle">Add new</span>
                        </label>
                        <input type="text" class="form-control w-px-250 kanban-add-board-input mb-2 d-none"
                            placeholder="Add Board Title" id="kanban-add-board-input" required="">
                        <div class="mb-3 kanban-add-board-input d-none">
                            <button class="btn btn-primary btn-sm me-2 waves-effect waves-light">Add</button>
                            <button type="button"
                                class="btn btn-label-secondary btn-sm kanban-add-board-cancel-btn waves-effect">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Task & Activities -->
        <div class="offcanvas offcanvas-end kanban-update-item-sidebar">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title">Edit Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="nav nav-tabs tabs-line">
                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-update">
                            <i class="ti ti-edit me-2"></i>
                            <span class="align-middle">Edit</span>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-activity">
                            <i class="ti ti-trending-up me-2"></i>
                            <span class="align-middle">Activity</span>
                        </button>
                    </li>
                </ul>
                <div class="tab-content px-0 pb-0">
                    <!-- Update item/tasks -->
                    <div class="tab-pane fade show active" id="tab-update" role="tabpanel">

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
        <form action="<?= base_url('dashboard_c/add_task'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" id="CHR_STATUS" name="CHR_STATUS" value="">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" class="form-control" placeholder="Name for your task" name="task-title">
            </div>
            <div class="mb-3">
                <label for="task-desc">Description</label>
                <textarea class="form-control" id="task-desc" style="height: 100px" placeholder='What is it about?'
                    name="task-desc"></textarea>
            </div>
            <div class="mb-3">
                <label for="task-category" class="form-label">Category</label>
                <input type="text" id="task-category" class="form-control"
                    placeholder="E.g. Sports, Grocery, Health etc." name="task-category">
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
                <input class="form-control" type="datetime-local" value="<?= date("Y-m-d\TH:i");; ?>" name="due-date" />
            </div>
            <div class="mb-3">
                <label class="form-label">Assigned</label>
                <div class="assigned d-flex flex-wrap mb-1" id="assigned">

                    <div class="avatar avatar-xs me-1" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-original-title="<?= $session['first-name']; ?>">
                        <input type="hidden" value="<?= $session['user-id']; ?>" name="assigned[]">
                        <img src="<?= base_url('assets'); ?>/img/avatars/<?= $session['profile']; ?>" alt="Avatar"
                            class="rounded-circle">
                    </div>

                    <div class="avatar avatar-xs ms-1" id="assigned_add">
                        <span class="avatar-initial rounded-circle bg-label-secondary dropup">
                            <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true">
                                <i class="ti ti-plus ti-xs text-heading"></i>
                            </a>
                            <div class="dropdown-menu" style="width: 200px;">
                                <div class="px-4 py-3 d-flex flex-column">
                                    <div class="mb-3">
                                        <label class="form-label fw-light mb-2">
                                            Add Member
                                        </label>
                                        <input type="text" id="username" class="form-control" placeholder="Username">
                                    </div>
                                    <button type="button" onclick="add_member()"
                                        class="btn btn-primary py-2 px-3x w-75 m-auto align-content-center">Add</button>
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
                <button type="submit" class="btn btn-primary me-3" data-bs-dismiss="offcanvas">
                    Update
                </button>
                <button type="button" class="btn btn-label-danger" data-bs-dismiss="offcanvas">
                    Delete
                </button>
            </div>
        </form>
    </div>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/dragula/3.6.6/dragula.min.js'></script>
<script>
document.addEventListener("DOMContentLoaded", function() {

    // Initialize PerfectScrollbar for elements with class "ps"
    var elements = document.querySelectorAll(".ps");
    elements.forEach(function(element) {
        new PerfectScrollbar(element, {
            wheelPropagation: true,
            wheelSpeed: 0.2,
            scrollXMarginOffset: 10,
        });
    });
    // Initialize Select2
    select2 = $('.select2'); // ! Using jquery vars due to select2 jQuery dependency

    if (select2.length) {
        function renderLabels(option) {
            if (!option.id) {
                return option.text;
            }
            var $badge = "<div class='badge " + $(option.element).data('color') + " rounded-pill'> " +
                option.text + '</div>';
            return $badge;
        }
    }
    select2.each(function() {
        var $this = $(this);
        $this.wrap("<div class='position-relative'></div>").select2({
            placeholder: 'Select Label',
            dropdownParent: $this.parent(),
            templateResult: renderLabels,
            templateSelection: renderLabels,
            escapeMarkup: function(es) {
                return es;
            }
        });
    });

    // Handle drag events for elements with class "kanban-item"
    var draggable = document.querySelectorAll(".kanban-item");
    var droppable = Array.from(document.querySelectorAll(".kanban-drag"));
    console.log(droppable);


    const drake = dragula(droppable);
    drake.on('drop', function(el, target, source, sibling) {

        const draggedItemId = el.getAttribute("custom-task-id");
        const targetContainerId = target.id;
        const sourceContainerId = source.id;
        const siblingItemId = sibling ? sibling.id : null;

        $.ajax({
            async: false,
            url: "<?php echo site_url('dashboard_c/edit_status'); ?>",
            type: "POST",
            data: {
                id: draggedItemId,
                target: targetContainerId
            },
            dataType: "json",
        });

    })

});

function status_code(id) {
    var hiddenInput = $('#CHR_STATUS');
    hiddenInput.val(id);
    console.log(hiddenInput.val());
}

function add_member() {
    var current = get_current_user();
    var value = $('#username').val();
    var assigned = $('#assigned_add');
    $('#username').val('');

    $.ajax({
        async: false,
        url: "<?php echo site_url('dashboard_c/add_member'); ?>",
        type: "POST",
        data: {
            username: value,
        },
        dataType: "json",
        success: function(data) {
            if (current.includes(data.INT_USER_ID)) {
                $('#assigned_alert').text('User is already assigned');
            } else {
                if (data) {
                    console.log(data);
                    // Create elements
                    var avatarDiv = document.createElement('div');
                    avatarDiv.className = 'avatar avatar-xs me-1';
                    avatarDiv.setAttribute('data-bs-toggle', 'tooltip');
                    avatarDiv.setAttribute('data-bs-placement', 'top');
                    avatarDiv.setAttribute('data-bs-original-title', data.CHR_FIRST_NAME);

                    var hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.value = data.INT_USER_ID;
                    hiddenInput.name = "assigned[]";

                    var avatarImg = document.createElement('img');
                    avatarImg.src = "<?= base_url('assets'); ?>/img/avatars/" + data.CHR_PROFILE_PIC;
                    avatarImg.alt = "Avatar";
                    avatarImg.className = "rounded-circle";

                    // Append elements
                    avatarDiv.appendChild(hiddenInput);
                    avatarDiv.appendChild(avatarImg);
                    assigned.before(avatarDiv);

                    //Initialize tooltip
                    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
                    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap
                        .Tooltip(
                            tooltipTriggerEl))
                } else {
                    $('#assigned_alert').text('User not found');
                }
            }
        },
        error: function(request) {
            console.log(request.responseText);
        }
    });
}

function get_current_user() {
    var current = [];
    $('#assigned .avatar input[type="hidden"]').each(function(index, element) {
        current.push($(element).val());
    });
    return current;
}
</script>