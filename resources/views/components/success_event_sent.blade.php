@if(session()->has('success_event_sent'))
<div class="flas-message-diaply">
    <p>{{session('success_event_sent')}}</p> <button class="closePopUp" onclick="hidePopUp()">&times;</button>
</div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function(){
        var flassMesgDiv = document.querySelector('.flas-message-diaply');
        setTimeout(() => {
            flassMesgDiv.style.display='none';
        }, 5000);
    });

    function hidePopUp(){
        location.reload();
    }
</script>

