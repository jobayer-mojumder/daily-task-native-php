$(document).ready(function () {
    $(".mark-as-done").click(function () {
        var id = $(this).attr("data-id");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/tasks/" + id + "/complete",
            type: "POST",
            success: function (data) {
                location.reload();
            }
        });
    });

    $(".delete-task").click(function () {
        var id = $(this).attr("data-id");
        if (confirm("Are you sure you want to delete this task?")) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "/tasks/" + id,
                type: "DELETE",
                ataType: 'json',
                success: function (data) {
                    location.reload();
                }
            });
        }
    });
});
