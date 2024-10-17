@if(session()->has('error_message_out'))

    <p>{{session('error_message_out')}}</p> <button class="closePopUp" onclick="hidePopUp()">&times;</button>

@endif

<script>
    document.addEventListener('DOMContentLoaded', function(){
        var flassMesgDiv = document.querySelector('.flas-message-diaply');
        setTimeout(() => {
            flassMesgDiv.style.display='none';
        }, 5000);
    });

    function hidePopUp(){
        var flassMesgDiv = document.querySelector('.flas-message-diaply');
        flassMesgDiv.style.display='none';
    }
</script>