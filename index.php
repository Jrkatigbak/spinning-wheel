<?php include 'get.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spinning Wheel</title>

    <!-- Fonts and icons -->
	<script src="assets/js/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/reaper.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    
    <div class="deal-wheel">
        <ul class="spinner"></ul>
        <figure class="cap">
            <?php include('reaper.html');?>
        </figure>
        <div class="ticker"></div>
        <input type="text" id="key" oninput="myFunction()" autofocus>
        <button class="btn-spin" >Spin the wheel</button>
       
    </div>
    <a href="#" id="showTeams" class="text-center options">Manage Teams</a>

    <script>
        var options = <?= $jsonPrizes; ?>;

       
    </script>
    <?php include('modal/options_mngt.php'); ?>
	<!--   Core JS Files   -->
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>

    <!-- Sweet Alert -->
	<script src="assets/js/sweetalert/sweetalert.min.js"></script>

    <!-- Application JS -->
     <script>
        // Show modal for Versions
        $("#showTeams").on('click',function(){
            $('#addRowModal').modal('show');
            $('#addRowModal').find('.modal-title').text('Basketball Teams');
        })

        // This is Delete Function
        $(".btnDelete").click(function(e){ 
            e.preventDefault(e);
            let id = $(this).attr('data-id');
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this data!",
                icon: "warning",
                buttons: [
                    'No, cancel it!',
                    'Yes, I am sure!'
                ],
                dangerMode: true,
                }).then(function(isConfirm) {
                if (isConfirm) {
                    
                    $.ajax({
                        type: 'ajax',
                        method: 'post',
                        url: "delete.php?id="+id,
                        async: false,
                        dataType: 'text',
                        success: function(data){
                            
                        },
                        error: function(){
                            swal('Could not edit data');
                        }
                    });
            
                    swal({
                    title: 'Deleted Successfully!',
                    text: '',
                    icon: 'success'
                    }).then(function() {
                        //RELOAD THE PAGE TO SHOW CHANGES AFTER DELETE
                        location.reload();
                    });

                } else {
                    swal("Cancelled", "", "error");
                }
            })
        })
     </script>
    <script src="assets/js/spin-wheel.js"></script>
</body>
</html>