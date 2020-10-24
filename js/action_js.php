<script>
    function add_like(blogpost_id) {
        var xhr = false;
        if(window.XMLHttpRequest) {
            xhr = new XMLHttpRequest();
        } else {
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
        if(xhr) {
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById("likecount").innerHTML = xhr.responseText;
                }
            }
        }
        xhr.open("GET", "lib/models/add_like.php?blogpost_id="+blogpost_id, true);
        xhr.send(null);
    }

    window.onload = function () {
        let likebtn = document.getElementById('likebtn');
        if(likebtn != null) {
            likebtn.addEventListener("click", function () {
                likebtn.classList.add("hidden");
            });
        }
    }
</script>