<?php 
require_once('class/ICT_Maintenance_db.php');
    $id = $_GET['id'];

    $tasks = $store->get_affirmedby($id);

    $userdetails = $store->get_userdata();

    if(isset($userdetails)){
        if($userdetails['access'] !="Admin"){
            header("Location: login.php");
        }
    }else{
        header("Location: login.php");
    }
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $con = mysqli_connect('localhost','root','123456','ict_maintenance_db') or die("ERROR");



    if(isset($_POST['signaturesubmit'])){ 
        $employee = $tasks['employee_id'];
        $signature = $_POST['signature'];
        $signatureFileName = $tasks['affirmedby'].$_GET['id'].'.png';
        $signature = str_replace('data:image/png;base64,', '', $signature);
        $signature = str_replace(' ', '+', $signature);
        $data = base64_decode($signature);
        $file = 'photos/'.$signatureFileName;
        file_put_contents($file, $data);
    
    
            file_put_contents($file, $data);
    
        $sql = "UPDATE `employees_signature` SET `signature` = '$signatureFileName', `mr_id` = '$id' WHERE employees_signature.id = '$id'";
                $query=mysqli_query($con,$sql);
    
        $msg = "<div class='alert alert-success'>Signature Uploaded</div>";

        echo header("Location: add_task_done.php?id=$employee");
    } 
    ?>
    <html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ICT Maintenance Record System</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../dist/css/adminlte.min.css">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
        <!-- Toastr -->
        <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
        <!-- Google Font: Source Sans Pro -->
        <style>
            #canvasDiv{
                position: relative;
                border: 2px dashed grey;
                height:300px;
            }
        </style>
    </head>
    
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <br>
                    <?php echo isset($msg)?$msg:''; ?>
                    <h2>Update Signature</h2>
                    <hr>
                    <div id="canvasDiv"></div>
                    <br>
                    <a href="add_task_done.php?id=<?php echo $tasks['employee_id'];?>" class="btn btn btn-secondary btn-lg"><i class = "fas fa-arrow-left"></i> Back</a>
                    <button type="button" class="btn btn btn-danger btn-lg" id="reset-btn"><i class = "fas fa-broom"></i> Clear</button>
                    <button type="button" class="btn btn btn-success btn-lg" id="btn-save"><i class = "fas fa-check"></i> Update</button>
                </div>
                <form id="signatureform" action=""  method="post">
           
                    <input type="hidden" id="signature" name="signature">
                    <input type="hidden" name="signaturesubmit" value="1">
                </form>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
    <script>
        $(document).ready(() => {
            var canvasDiv = document.getElementById('canvasDiv');
            var canvas = document.createElement('canvas');
            canvas.setAttribute('id', 'canvas');
            canvasDiv.appendChild(canvas);
            $("#canvas").attr('height', $("#canvasDiv").outerHeight());
            $("#canvas").attr('width', $("#canvasDiv").width());
            if (typeof G_vmlCanvasManager != 'undefined') {
                canvas = G_vmlCanvasManager.initElement(canvas);
            }
            
            context = canvas.getContext("2d");
            $('#canvas').mousedown(function(e) {
                var offset = $(this).offset()
                var mouseX = e.pageX - this.offsetLeft;
                var mouseY = e.pageY - this.offsetTop;
    
                paint = true;
                addClick(e.pageX - offset.left, e.pageY - offset.top);
                redraw();
            });
    
            $('#canvas').mousemove(function(e) {
                if (paint) {
                    var offset = $(this).offset()
                    //addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
                    addClick(e.pageX - offset.left, e.pageY - offset.top, true);
                    console.log(e.pageX, offset.left, e.pageY, offset.top);
                    redraw();
                }
            });
    
            $('#canvas').mouseup(function(e) {
                paint = false;
            });
    
            $('#canvas').mouseleave(function(e) {
                paint = false;
            });
    
            var clickX = new Array();
            var clickY = new Array();
            var clickDrag = new Array();
            var paint;
    
            function addClick(x, y, dragging) {
                clickX.push(x);
                clickY.push(y);
                clickDrag.push(dragging);
            }
    
            $("#reset-btn").click(function() {
                context.clearRect(0, 0, window.innerWidth, window.innerWidth);
                clickX = [];
                clickY = [];
                clickDrag = [];
            });
    
            $(document).on('click', '#btn-save', function() {
                var mycanvas = document.getElementById('canvas');
                var img = mycanvas.toDataURL("image/png");
                anchor = $("#signature");
                anchor.val(img);
                $("#signatureform").submit();
            });
    
            var drawing = false;
            var mousePos = {
                x: 0,
                y: 0
            };
            var lastPos = mousePos;
    
            canvas.addEventListener("touchstart", function(e) {
                mousePos = getTouchPos(canvas, e);
                var touch = e.touches[0];
                var mouseEvent = new MouseEvent("mousedown", {
                    clientX: touch.clientX,
                    clientY: touch.clientY
                });
                canvas.dispatchEvent(mouseEvent);
            }, false);
    
    
            canvas.addEventListener("touchend", function(e) {
                var mouseEvent = new MouseEvent("mouseup", {});
                canvas.dispatchEvent(mouseEvent);
            }, false);
    
    
            canvas.addEventListener("touchmove", function(e) {
    
                var touch = e.touches[0];
                var offset = $('#canvas').offset();
                var mouseEvent = new MouseEvent("mousemove", {
                    clientX: touch.clientX,
                    clientY: touch.clientY
                });
                canvas.dispatchEvent(mouseEvent);
            }, false);
    
    
    
            // Get the position of a touch relative to the canvas
            function getTouchPos(canvasDiv, touchEvent) {
                var rect = canvasDiv.getBoundingClientRect();
                return {
                    x: touchEvent.touches[0].clientX - rect.left,
                    y: touchEvent.touches[0].clientY - rect.top
                };
            }
    
    
            var elem = document.getElementById("canvas");
    
            var defaultPrevent = function(e) {
                e.preventDefault();
            }
            elem.addEventListener("touchstart", defaultPrevent);
            elem.addEventListener("touchmove", defaultPrevent);
    
    
            function redraw() {
                //
                lastPos = mousePos;
                for (var i = 0; i < clickX.length; i++) {
                    context.beginPath();
                    if (clickDrag[i] && i) {
                        context.moveTo(clickX[i - 1], clickY[i - 1]);
                    } else {
                        context.moveTo(clickX[i] - 1, clickY[i]);
                    }
                    context.lineTo(clickX[i], clickY[i]);
                    context.closePath();
                    context.stroke();
                }
            }
        })
    
    </script>
    </html>