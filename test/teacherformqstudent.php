<html>
<body>
  <?
  @session_start();
  require_once('includeteacher/connect.php');

  if(!isset($_SESSION['teacher_code']))
  header("location:login.php");
  if(isset($_GET['logout'])){
    session_destroy();
    header("location:login.php");
  }
  ?>
  <div id="qstudent" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
            <div class="content">
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <div class="card">
                      <div class="card-header" data-background-color="green">
                          <h4 class="title">แบบประเมินนักศึกษา</h4>
                          <p class="category">แบบประเมินนักศึกษาโดยอาจารย์เป็นผู้ประเมิน</p>
                      </div>
                      <div class="card-content table-responsive">
                          <form role="form" id="form" name="form" method="POST" action="teacherformqstudentQuery.php">
                            <div class="table-responsive">
                        <table class="table" border="1">
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
                              $query = "SELECT * FROM mainrecordstudent";
                              $query = mysqli_query($conn,$query);
                              $i=1;
                              while ($m=mysqli_fetch_array($query))
                              {
                                $a++;
                                $query1 = "SELECT crs_name FROM choicerecordstudent where mrs_id = $a";
                                $query1 = mysqli_query($conn,$query1);
                                ?><tr >
                                  <td ><?
                                  echo $a,' ',$m[1];
                                  ?>
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
                        </div>
                        <input type="hidden" name="Sc" value="<?=$sc?>">
                        <input type="hidden" name="Max" value="<?=$i-1?>">
                        <button type="submit"  id="submit" name="submit"
                        class="btn btn-success btn-round has-feedback">ยืนยันข้อมูล</button>
                        <button class="btn btn-warning btn-round" data-dismiss="modal">ยกเลิก</button>
                        </form>
                      </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</body>
</html>
