@if(session()->has('success_post_activity'))
<div class="flas-message-diaply">
    <p>{{session('success_post_activity')}}</p> <button class="closePopUp" onclick="hidePopUp()">&times;</button>
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

