<?php
namespace app\helper;
	
	class Time { 	/** * Times */
	
	 public function tsince($ptime)
	{
		$etime = time() - $ptime;

				if( $etime < 1 )
				{
				    return 'less than '.$etime.' second ago';
				}

				$a = array( 12 * 30 * 24 * 60 * 60  =>  'year',
				            30 * 24 * 60 * 60       =>  'month',
				            24 * 60 * 60            =>  'day',
				            60 * 60             =>  'hour',
				            60                  =>  'minute',
				            1                   =>  'second'
				);

				foreach( $a as $secs => $str )
				{
				    $d = $etime / $secs;

				    if( $d >= 1 )
				    {
				        $r = round( $d );
				        return 'about ' . $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
				    }
				} 
		}

		public function ArMonth($namemonth)
		{
			switch ($namemonth)
				{
						case 1:
						$namemonth="يناير";
						break;
						case 2:
						$namemonth="فبراير";
						break;
						case 3:
						$namemonth="مارس";
						break;
						case 4:
						$namemonth="إبريل";
						break;
						case 5:
						$namemonth="مايو";
						break;
						case 6:
						$namemonth="يونيو";
						break;
						case 7:
						$namemonth="يوليو";
						break;
						case 8:
						$namemonth="اغسطس";
						break;
						case 9:
						$namemonth="سبتمبر";
						break;
						case 10:
						$namemonth="اكتوبر";
						break;
						case 11:
						$namemonth="نوفمبر";
						break;
						case 12:
						$namemonth="ديسمبر";
						break;
						}
					return $namemonth;
		}

}
?>