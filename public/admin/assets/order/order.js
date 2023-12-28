$(function () {
    $(document).on("change", ".select-status", function (e) {
        e.preventDefault();
        let url = $(this).data("action");
        let data = {
            status: $(this).val(),
        };

        $.post(url, data, (res) => {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Cập nhật trạng thái thành công!",
                showConfirmButton: false,
                timer: 1500,
            });
        });
    });
});

