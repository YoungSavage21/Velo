<script type="text/javascript">
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
    var droppable = Array.from(document.querySelectorAll(".kanban-drag"));

    const drake = dragula(droppable);
    drake.on('drop', function(el, target) {

        const draggedItemId = el.getAttribute("custom-task-id");
        const targetContainerId = target.id;

        $.ajax({
            url: "<?php echo site_url('dashboard_c/edit_status'); ?>",
            type: "POST",
            data: {
                id: draggedItemId,
                target: targetContainerId
            },
            dataType: "json",
        });

    })

    drake.on('drag', function(el) {
        $(el).addClass('is-grabbing');
        $('.kanban-content').addClass('is-grabbing');
    });

    drake.on('dragend', function(el) {
        $(el).removeClass('is-grabbing');
        $('.kanban-content').removeClass('is-grabbing');
    });

    $(document).on('click', '.edit-board', function() {
        var id = $(this).closest('.kanban-item').attr('custom-task-id');
        var element = $(this).closest('.kanban-item').find(".avatar-xs");
        var assigned = $('#assigned_edit');

        $.ajax({
            async: false,
            url: "<?php echo site_url('dashboard_c/get_task_by_id'); ?>",
            type: "POST",
            data: {
                INT_TASK_ID: id,
            },
            dataType: "json",
            success: function(data) {
                $("#edit-status").val(data.CHR_STATUS);
                $("#edit-id").val(data.INT_TASK_ID);
                $("#edit-title").val(data.CHR_TASK_TITLE);
                $("#edit-desc").val(data.CHR_TASK_DESC);
                $("#edit-category").val(data.CHR_TASK_CATEGORY);
                $("#edit-tag").val(data.CHR_TASK_TAG_COLOR).trigger('change.select2');
                $("#edit-date").val(data.DAT_DUE_DATE);
                $('#assigned_edit_wrapper').find(".avatar-profile").remove();

                // Create elements
                element.each(function(index, e) {
                    var avatarDiv = document.createElement('div');
                    if ($(e).attr('custom-user-id') == data.INT_USER_ID) {
                        avatarDiv.className =
                            'avatar avatar-xs me-1 avatar-profile';
                    } else {
                        avatarDiv.className =
                            'avatar avatar-xs me-1 avatar-delete avatar-profile';
                    }
                    avatarDiv.setAttribute('data-bs-toggle', 'tooltip');
                    avatarDiv.setAttribute('data-bs-placement', 'top');
                    avatarDiv.setAttribute('data-bs-original-title', $(e).attr(
                        'data-bs-original-title'));

                    var hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.value = $(e).attr('custom-user-id');
                    hiddenInput.name = "assigned[]";

                    var avatarImg = document.createElement('img');
                    avatarImg.src = $(e).find('img').attr('src');
                    avatarImg.alt = "Avatar";
                    avatarImg.className = "rounded-circle";

                    // Append elements
                    avatarDiv.appendChild(hiddenInput);
                    avatarDiv.appendChild(avatarImg);
                    assigned.before(avatarDiv);

                    //Initialize tooltip
                    const tooltipTriggerList = document.querySelectorAll(
                        '[data-bs-toggle="tooltip"]')
                    const tooltipList = [...tooltipTriggerList].map(
                        tooltipTriggerEl =>
                        new bootstrap
                        .Tooltip(tooltipTriggerEl))
                });

            },
            error: function(request) {
                console.log(request.responseText);
            }
        });

    });

    $(document).on('click', '.kanban-content', function() {
        var id = $(this).attr('custom-task-id');
        console.log(id);
        $.ajax({
            async: false,
            url: "<?php echo site_url('dashboard_c/get_task_by_id'); ?>",
            type: "POST",
            data: {
                INT_TASK_ID: id,
            },
            dataType: "json",
            success: function(data) {
                $("#view-title").text(data.CHR_TASK_TITLE);
                if (data.CHR_TASK_DESC) {
                    $("#view-desc").text(data.CHR_TASK_DESC);
                } else {
                    $("#view-desc").text('No Description Available');
                }
                $("#view-category").text(data.CHR_TASK_CATEGORY);
                $("#view-category").removeClass();
                $("#view-category").addClass('badge rounded-pill bg-label-' + data
                    .CHR_TASK_TAG_COLOR);
                $("#view-date").text(data.FORMATED_DATE);
                if (data.CHR_IMAGE === '') {
                    $("#view-image").attr("src", "");
                    $("#view-image").addClass('d-none');
                } else {
                    $("#view-image").attr("src", "<?= base_url('assets');?>/img/upload/" +
                        data.CHR_IMAGE);
                    $("#view-image").removeClass('d-none');
                }

            },
            error: function(request) {
                console.log(request.responseText);
            }
        });

    });

    $(document).on('click', '.avatar-delete', function() {
        var avatarElement = $(this).closest('.avatar');
        avatarElement.tooltip('hide');
        avatarElement.remove();
    });

});

function status_code(id) {
    var hiddenInput = $('#CHR_STATUS');
    hiddenInput.val(id);
}

function add_member() {
    var current = get_current_user();
    var value = $('#username').val();
    var assigned = $('#assigned_add');
    $('#username').val("");

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
                    avatarDiv.className = 'avatar avatar-xs me-1 avatar-delete';
                    avatarDiv.setAttribute('data-bs-toggle', 'tooltip');
                    avatarDiv.setAttribute('data-bs-placement', 'top');
                    avatarDiv.setAttribute('data-bs-original-title', data.CHR_FIRST_NAME);

                    var hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.value = data.INT_USER_ID;
                    hiddenInput.name = "assigned[]";

                    var avatarImg = document.createElement('img');
                    avatarImg.src = "<?= base_url('assets'); ?>/img/avatars/" + data
                        .CHR_PROFILE_PIC;
                    avatarImg.alt = "Avatar";
                    avatarImg.className = "rounded-circle";

                    // Append elements
                    avatarDiv.appendChild(hiddenInput);
                    avatarDiv.appendChild(avatarImg);
                    assigned.before(avatarDiv);

                    //Initialize tooltip
                    const tooltipTriggerList = document.querySelectorAll(
                        '[data-bs-toggle="tooltip"]')
                    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl =>
                        new bootstrap
                        .Tooltip(tooltipTriggerEl))
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

function add_member_for_edit() {
    var current = get_current_user_for_edit();
    console.log(current);
    var value = $('#username_edit').val();
    var assigned = $('#assigned_edit');
    $('#username_edit').val("");


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
                $('#assigned_alert_edit').text('User is already assigned');
            } else {
                if (data) {
                    console.log(data);
                    // Create elements
                    var avatarDiv = document.createElement('div');
                    avatarDiv.className = 'avatar avatar-xs me-1 avatar-delete avatar-profile';
                    avatarDiv.setAttribute('data-bs-toggle', 'tooltip');
                    avatarDiv.setAttribute('data-bs-placement', 'top');
                    avatarDiv.setAttribute('data-bs-original-title', data.CHR_FIRST_NAME);

                    var hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.value = data.INT_USER_ID;
                    hiddenInput.name = "assigned[]";

                    var avatarImg = document.createElement('img');
                    avatarImg.src = "<?= base_url('assets'); ?>/img/avatars/" + data
                        .CHR_PROFILE_PIC;
                    avatarImg.alt = "Avatar";
                    avatarImg.className = "rounded-circle";

                    // Append elements
                    avatarDiv.appendChild(hiddenInput);
                    avatarDiv.appendChild(avatarImg);
                    assigned.before(avatarDiv);

                    //Initialize tooltip
                    const tooltipTriggerList = document.querySelectorAll(
                        '[data-bs-toggle="tooltip"]')
                    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl =>
                        new bootstrap
                        .Tooltip(tooltipTriggerEl))
                } else {
                    $('#assigned_alert_edit').text('User not found');
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
    $('#assigned_wrapper .avatar input[type="hidden"]').each(function(index, element) {
        current.push($(element).val());
    });
    return current;
}

function get_current_user_for_edit() {
    var current = [];
    $('#assigned_edit_wrapper .avatar input[type="hidden"]').each(function(index, element) {
        current.push($(element).val());
    });
    return current;
}

function get_task_by_id(id) {
    var image = $(this);
    console.log(image.prop('outerHTML'));
    $.ajax({
        async: false,
        url: "<?php echo site_url('dashboard_c/get_task_by_id'); ?>",
        type: "POST",
        data: {
            INT_TASK_ID: id,
        },
        dataType: "json",
        success: function(data) {
            $("#edit-title").val(data.CHR_TASK_TITLE);
            $("#edit-desc").val(data.CHR_TASK_DESC);
            $("#edit-category").val(data.CHR_TASK_CATEGORY);
            $("#edit-tag").val(data.CHR_TASK_TAG_COLOR).trigger('change.select2');
            $("#edit-date").val(data.DAT_DUE_DATE);
        },
        error: function(request) {
            console.log(request.responseText);
        }
    });
}
</script>