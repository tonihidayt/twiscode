
<script type="text/javascript">
    function conPro(products_id){
        swal({
            title             : "Are you sure?",
            text              : "Please confirm you would like to do this.",
            type              : "warning",
            showCancelButton  : true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText : "Yes",
            cancelButtonText  : "No, Cancel",
            closeOnConfirm    : false,
            closeOnCancel     : false
        },
        function(isConfirm){
            if(isConfirm) window.location.href="products/delete/"+products_id;
            else swal.close();
        });
    }
</script>
