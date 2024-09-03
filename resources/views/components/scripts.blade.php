<script>
    $(document).ready(function() {
        $('#mytable').DataTable();
    });

    $(document).ready(function() {
        $("#confirm-delete").click(function() {
            message();
        });
        $("#cancel").click(function() {
            hide();
        });
    });

    function message() {
        $("#delete_message").fadeToggle(250);
        $('.app-component').not("#confirm-delete").css("opacity","0.2");
    }
    
    function hide() {
        $("#delete_message").fadeOut("slow");
        $('.app-component').not("#confirm-delete").css("opacity","1");
    }
</script>