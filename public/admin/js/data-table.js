$(document).ready(function() {
    var table = $('#testimonialsTable').DataTable({
        searching: true,
        search: {
            caseInsensitive: true
        },
        columnDefs: [
            { targets: 6, visible: false } // Hide the status filter column
        ]
    });

    // Search functionality
    $('#searchTestimonials').on('keyup', function() {
        table.search(this.value).draw();
    });

    // Status filter functionality
    $('#statusFilter').on('change', function() {
        var status = $(this).val();
        table.column(6).search(status ? '^' + status + '$' : '', true, false).draw();
    });
});