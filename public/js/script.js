$(document).ready(function () {
    $(".data-table").DataTable({
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        paging: true,
        columnDefs: [
            {
                targets: "datatable-nosort",
                orderable: false,
            },
        ],
        lengthMenu: [
            [10, 50, 100, 500, -1],
            [10, 50, 100, 500, "All"],
        ],
        language: {
            searchPlaceholder: "Tìm Kiếm",
            paginate: {
                next: ">",
                previous: "<",
            },
        },
    });
});
