<?
@session_start();
require_once('includesecondary/connect.php');

if(!isset($_SESSION['username']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:login.php");
}
?>
<html lang="en">
<head>
</head>
<body>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
 <script type="text/javascript">
 $(function(){

     var obj_check=$(".css-require");
     $("#form").on("submit",function(){
         obj_check.each(function(i,k){
             var status_check=0;
             if(obj_check.eq(i).find(":radio").length>0 || obj_check.eq(i).find(":checkbox").length>0){
                 status_check=(obj_check.eq(i).find(":checked").length==0)?0:1;
             }else{
                 status_check=($.trim(obj_check.eq(i).val())=="")?0:1;
             }
             formCheckStatus($(this),status_check);
         });
         if($(this).find(".has-error").length>0){
              return false;
         }
     });

     obj_check.on("change",function(){
         var status_check=0;
         if($(this).find(":radio").length>0 || $(this).find(":checkbox").length>0){
             status_check=($(this).find(":checked").length==0)?0:1;
         }else{
             status_check=($.trim($(this).val())=="")?0:1;
         }
         formCheckStatus($(this),status_check);
     });

     var formCheckStatus = function(obj,status){
         if(status==1){
             obj.parent(".form-group").removeClass("has-error").addClass("has-success");
             obj.next(".glyphicon").removeClass("glyphicon-warning-sign").addClass("glyphicon-ok");
         }else{
             obj.parent(".form-group").removeClass("has-success").addClass("has-error");
             obj.next(".glyphicon").removeClass("glyphicon-ok").addClass("glyphicon-warning-sign");
         }
     }
 });

</script>
      <div id="mainrecordcompanyAdd" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="content">
                  <div class="container-fluid">
                      <div class="row">
                          <div class="col-md-12">
                              <div class="card">
                                <div class="card-header" data-background-color="orange">
                                    <h4 class="title">เพิ่มข้อมูลหัวข้อหลักสำหรับประเมินสถานประกอบการ</h4>
                                    <p class="category">เพิ่มข้อมูลหัวข้อหลักสำหรับประเมินสถานประกอบการที่อาจารย์ไปนิเทศงานนักศึกษา</p>
                                </div>
                                        <div class="col-lg-12">
                                            <form role="form" id="form" name="form" method="post" action="addmainrecordcompanysecondaryQuery.php">
                                              <div class="form-group label-floating has-feedback">
                                                <label class="control-label">ชื่อหัวข้อหลักสำหรับประเมินสถานประกอบการ</label>
                                                <input type="text" name="mrc_name" class="form-control css-require">
                                              </div>
                                              <button type="submit"  id="submit" name="submit"
                                              class="btn btn-success btn-round has-feedback">ยืนยันข้อมูล</button>
                                              <button class="btn btn-warning btn-round" data-dismiss="modal">ยกเลิก</button>
                                        </div>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
</body>
</html>
