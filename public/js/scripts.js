$('#class').on('change', function() {
    let classId = $(this).val();
    
    if (classId) {
        $.ajax({
            url: '{{ route("getSectionsByClass") }}',
            type: 'GET',
            data: {
                class_id: classId
            },
            success: function(data) {
                // Update sections dropdown based on the response
                $('#section').empty();
                $('#section').append('<option value="">Select Section</option>');
                
                $.each(data, function(key, section) {
                    $('#section').append('<option value="'+ section.id +'">'+ section.name +'</option>');
                });
            }
        });
    } else {
        $('#section').empty(); 
    }
});


$(document).ready(function () {
    $('#region').change(function () {
        const regionId = $(this).val();
        const districtDropdown = $('#district');

        districtDropdown.html('<option value="">Loading...</option>');

        // Fetch districts based on the selected region
        $.ajax({
            url: `/regions/${regionId}/districts`,
            method: 'GET',
            success: function (response) {
                districtDropdown.html('<option value="" selected disabled>Select District</option>');

                // Populate districts
                response.forEach(function (district) {
                    districtDropdown.append(`<option value="${district.id}">${district.name}</option>`);
                });
            },
            error: function (error) {
                console.error('Error fetching districts:', error);
                districtDropdown.html('<option value="" selected disabled>Error loading districts</option>');
            }
        });
    });
});
