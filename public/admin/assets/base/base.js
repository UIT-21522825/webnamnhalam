function confirmDelete(){
    return new Promise((resolve, reject)=>{
        Swal.fire({
            title: 'Bạn chắc chắn muốn xóa?',
            text: "Dữ liệu sẽ không thể khôi phục sau khi xóa!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#75ac2b',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xác nhận',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                resolve(true);
            }else{
                reject(false)
            }
        })
    })
}

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
$(() => {
        $(document).on('click', '.btn-delete', function(e){
            e.preventDefault();
            let id = $(this).data('id');
            confirmDelete().then(function(){
                $(`#form-delete${id}`).submit();
            }).catch();
        })
    })