<footer>
    <div class="row">
        <div class="col-lg-12">
            <p>&copy;<?php
						$startYear = 2015;
						$thisYear = date('Y');
						if ($startYear == $thisYear) {
						 echo $startYear;
						} else {
						 echo "{$startYear}&ndash;{$thisYear}";
						}
						?>
				Benedict Sch. Þorsteinsson & Daði Sigursveinn Harðarson
			</p>
        </div>
    </div>
    <!-- /.row -->
</footer>