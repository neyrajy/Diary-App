<script>
    $(document).ready(function() {
        $('#class, #section').change(function() {
            var classId = $('#class').val();
            var sectionId = $('#section').val();
            
            if (classId && sectionId) {
                $.ajax({
                    url: '{{ route('get.students') }}',
                    type: 'GET',
                    data: { class_id: classId, section_id: sectionId },
                    success: function(data) {
                        $('#student').empty().append('<option value="">Select Student</option>');
                        $.each(data, function(index, student) {
                            $('#student').append('<option value="' + student.id + '">' + student.firstname + ' ' + student.lastname + '</option>');
                        });
                    }
                });
            } else {
                $('#student').empty().append('<option value="">Select Student</option>');
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        window.addSelector = function(){
            const appendChild = document.createElement('div');
            appendChild.innerHTML = `
            <div class="col-md-5" style="float:left; margin-left:0%;">
            <br>
                <label for="student">{{ __('Student') }}</label>
                <select class="form-control @error('student') is-invalid @enderror" name="student2" required>
                    <option value="">--select--</option>
                    @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->firstname }}, {{ $student->lastname }}</option>
                    @endforeach
                </select>
                @error('student')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>
                <br>
            `;
            document.querySelector('.col-md-5').appendChild(appendChild);
        }
    });
</script>