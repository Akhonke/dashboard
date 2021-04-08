<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Attendance List</h3>
                    </div>
                    <div class="card-body">
                     <div id="calendarContainer"></div>
                     <div id="organizerContainer"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?= BASEURL ?>/assets/calender/calender.js"></script>
<script type="text/javascript">
        "use strict";// function that creates dummy data for demonstration
        function createDummyData() {
           // var date = new Date();
          
            var data = {};

            <?php 
            if(!empty($record)){
                foreach ($record as $key =>$value) {
                  $day = $value->day;
                  $month = $value->month;
                  $year = $value->year;
                  $reason = $value->reason;
                  $attachment_one = $value->attachment_one;
                  $attachment_two = $value->attachment_two;
                  $result[] = array('days'=>$day,
                               'reason'=>$reason,
                               'month'=>$month,
                               'year'=> $year,
                               'attachment_one'=>$attachment_one,
                             'attachment_two'=>$attachment_two);

                ?>
                var months = parseInt("<?= $month ?>");
            for (var i = 0; i < months; i++) {
                data[<?= $year ?> + i] = {};
              for (var j = 0; j < months; j++) {
                 data[<?= $year ?> + i][j + 1] = {};
                <?php 
                
              foreach ($result as $keyone => $value_one):
                $reason_one = $value_one['reason'];
                $attachmentone = $value_one['attachment_one'];
                $attachmenttwo = $value_one['attachment_two'];
                $day_one = $value_one['days'];
                $months_one= $value_one['month'];
                $year_one= $value_one['year'];
                ?>

                 var months_one = parseInt("<?= $months_one ?>");
                 var num = parseInt("<?= $day_one ;?>");
                for (var k = 0; k < months_one; k++) {
                  if(j + 1 == months_one && <?= $year_one ?> + i == <?= $year_one ?>){
                  var l = num;
                  try {
                    var p = 0;
                    data[<?= $year_one ?> + i][j + 1][p].push({
                    });
                  } catch (e) {
                    data[<?= $year_one ?> + i][j + 1][l] = [];
                    data[<?= $year_one ?> + i][j + 1][l].push({
                      Reason: "<?= $reason_one ?>"
                      <?php if(!empty($attachmentone)){ ?>
                      , Attendance1:"<?= 'uploads/attendance/attachment_one/'.$attachmentone ?>"
                      <?php }
                       if(!empty($attachmenttwo)){ 
                      ?>
                      ,Attendance2:"<?= 'uploads/attendance/attachment_two/'.$attachmenttwo ?>"
                      <?php } ?>
                    });
                  }
                }
                }
              <?php endforeach ?>
            } 
          }
        <?php } } ?>
         return data;
        }
    // creating the dummy static data
    var data = createDummyData();

    // initializing a new calendar object, that will use an html container to create itself
    var calendar = new Calendar(
      "calendarContainer", // id of html container for calendar
      "small", // size of calendar, can be small | medium | large
      [
        "Monday", // left most day of calendar labels
        3 // maximum length of the calendar labels
      ],
      [
        "#E91E63", // primary color
        "#C2185B", // primary dark color
        "#FFFFFF", // text color
        "#F8BBD0" // text dark color
      ]
    );

    // initializing a new organizer object, that will use an html container to create itself
    var organizer = new Organizer(
      "organizerContainer", // id of html container for calendar
      calendar, // defining the calendar that the organizer is related to
      data // giving the organizer the static data that should be displayed
    );
</script>
<style>
  ol.cjslib-list li {
    display:inline-block;
  }
  ol.cjslib-list li img{
    width: 100px;
    padding: 5px;
  }
  ol.cjslib-list li a {
    background: #e91e63;
    padding: 15px;
    margin: 10px;
    border-radius: 5px;
    color: #fff;
  }
  </style>