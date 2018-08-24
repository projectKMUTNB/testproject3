<?
@session_start();
require_once('includeteacher/connect.php');

if(!isset($_SESSION['teacher_code']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:login.php");
}
$student_code = $_GET['id'];
?>
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
<html>
<head></head>
<body>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">แบบประเมินนักศึกษา</h4>
      </div>
      <div class="modal-body">
        <div class="box-body table-responsive no-padding">
            <form role="form" id="form" name="form" method="POST" action="teacherformqstudentQuery.php">
              <table class="table table-hover">
               <tbody>

                 <tr><td rowspan="2"><center>หัวข้อการประเมิน</center></td>

                 <td colspan="7"><center>ระดับความคิดเห็น (1-4 หรือ 0)</center></td>
                 <tr>
                 <td align="center">4</td>
                 <td align="center">3</td>
                 <td align="center">2</td>
                 <td align="center">1</td>
                 <td align="center">0</td></tr>
                 </tr>
                <?php
                $i=0;
                $query = "SELECT * FROM mainrecordstudent where approve_status = '1'";
                $query = mysqli_query($conn,$query);
                $i=1;
                while ($m=mysqli_fetch_array($query))
                {
                  $a++;
                  $query1 = "SELECT crs_name FROM choicerecordstudent where mrs_id = $a and approve_status = '1'";
                  $query1 = mysqli_query($conn,$query1);
                  ?><tr >
                    <td><?
                    echo $a,' ',$m[1];
                    ?></td>
                      <?  if(mysqli_num_rows($query1)==0)
                      {?>
                        <p class="question">
                          <td align="center"><input name="radio_<?php echo $i?>"  type="radio" value="4"></td>
                          <td align="center"><input name="radio_<?php echo $i?>"  type="radio" value="3"></td>
                          <td align="center"><input name="radio_<?php echo $i?>"  type="radio" value="2"></td>
                          <td align="center"><input name="radio_<?php echo $i?>"  type="radio" value="1"></td>
                          <td align="center"><input name="radio_<?php echo $i?>"  type="radio" value="0"></td>
                          <p>
                            <? $i++; }?>
                          </td></tr><?
                          $b=0;
                while ($c=mysqli_fetch_array($query1))
                { $b++?>
                <tr>
                  <td >
                  <?php echo $a,'.',$b,' ',$c[0]; ?>
                <p class="question">
                  <td align="center"><input name="radio_<?php echo $i?>"  type="radio" value="4"></td>
                  <td align="center"><input name="radio_<?php echo $i?>"  type="radio" value="3"></td>
                  <td align="center"><input name="radio_<?php echo $i?>"  type="radio" value="2"></td>
                  <td align="center"><input name="radio_<?php echo $i?>"  type="radio" value="1"></td>
                  <td align="center"><input name="radio_<?php echo $i?>"  type="radio" value="0"></td>
                <p>
                  </td>
                  </tr>
                  <? $i++; }?>
                <? }?>
              </tr>
            </tbody>
          </table>
          <div class="form-group label-floating has-feedback">
            <label>ความคิดเห็นเพิ่มเติม</label>
            <textarea class="form-control css-require" rows="4" placeholder="กรอกความคิดเห็นเพิ่มเติม" name="commentstu_detail"></textarea>
          </div>
          <input type="hidden" name="Sc" value="<?echo $student_code?>">
          <input type="hidden" name="Max" value="<?=$i-1?>">
          <button type="submit" id="submit" name="submit"
          class="btn btn-success btn-round has-feedback">ยืนยันข้อมูล</button>
          <button class="btn btn-warning btn-round" data-dismiss="modal">ยกเลิก</button>
          </form>
        </div>
      </div>
</body>
</html>
