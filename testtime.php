
<div id="testtime" class="modal fade" role="dialog">
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
                        <div class="card-header" data-background-color="green">
                            <h4 class="title">ข้อมูลวันเวลาที่อาจารย์จะมานิเทศนักศึกษา</h4>
                            <p class="category">รายละเอียดข้อมูลเวลาในการนิเทศนักศึกษา</p>
                        </div>
              <div class="modal-body">
                <form role="form" name="form" method="post" action="deletecompany.php" >
                  <div class="row">
                      <div class="col-lg-12">
                      <div class="table-responsive">
                        <table class="table">
                        <tr><td>วัน/เดือน/ปี ที่อาจารย์มานิเทศนักศึกษา </td><td>8 มิถุนายน 2561</td></tr>
                        <tr><td>เวลา </td><td>10.00 น.</td></tr>
                        <tr><td>อาจารย์ที่จะมานิเทศนักศึกษา </td><td>นพเก้า ทองใบ</td></tr>
                        </table>
                        <input type="hidden" name="g" value="<? echo $g ?>">
                      </div>
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
</div>
</div>
