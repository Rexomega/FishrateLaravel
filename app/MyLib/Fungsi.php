<?php 
namespace App\MyLib;
use DB;
class Fungsi {
	public static $namaWebsite="Fishrate";
	public static $logoWebsite="logo.png";
	public static $iconWebsite="logo.png";

	public static $nama_bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

static function generate_bulan($x){
		$nama_bulan=array("Januar","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
		$x1=explode("-",$x);
		$str=$nama_bulan[$x1[1]-1]." ".$x1[0];
		return $str;
	}

	public static $hari = ["Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu"];
	
	static function formatUang($uang){
		$u="Rp. ". number_format($uang,0,",",".");
		
		return $u;	
	}

	 static function txtTanggal($id,$val="",$holder=""){
		?>
		<script>
       	$(document).ready(function(e) {
        	 $("#<?php echo $id?>").datepicker({
					//dateFormat  : "dd MM yy",        
			  
			  dateFormat  : "dd-mm-yy",        
			  changeMonth : true,
			  changeYear  : true,
			  // minDate: '-0',
			});
    	});
	   
        </script>
        <input class="form-control" type="text" readonly id="<?php echo $id?>" name="<?php echo $id?>" value="<?php echo $val?>" placeholder="<?php echo $holder?>"/>
		<?php
	}
	
	static function txtTanggalDepan($id,$val="",$holder=""){
		?>
		<script>
       	$(document).ready(function(e) {
        	 $("#<?php echo $id?>").datepicker({
					//dateFormat  : "dd MM yy",        
			 
			  dateFormat  : "dd-mm-yy",        
			  changeMonth : true,
			  changeYear  : true,
			  minDate: '-0',
			});
    	});
	   
        </script>
        <div class="input-group">
                <input id="<?php echo $id?>" readonly="readonly" type="text" class="date-picker form-control" name="<?php echo $id?>" value="<?php echo $val?>"  placeholder="<?php echo $holder?>"/>
                <label for="<?php echo $id?>" class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> Choose Date

                </label>
            </div>
		<?php
	}

	static function txtTanggalTertentu($id,$val="",$holder="",$disabledates){
		?>
		<script>
       	$(document).ready(function(e) {
       		var disabledates = [
       				<?php foreach($disabledates as $ds){?>
       				"<?php echo $ds?>",
       				<?php }?>
       				]
        	 $("#<?php echo $id?>").datepicker({
					//dateFormat  : "dd MM yy",        
			 
			  dateFormat  : "dd-mm-yy",        
			  changeMonth : true,
			  changeYear  : true,
			  minDate: '-0',
			  beforeShowDay: function(date){
		        var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
		        return [ disabledates.indexOf(string) == -1 ]
		    	}
			});
    	});
	   
        </script>
        <div class="input-group">
                <input id="<?php echo $id?>" readonly="readonly" type="text" class="date-picker form-control" name="<?php echo $id?>" value="<?php echo $val?>"  placeholder="<?php echo $holder?>"/>
                <label for="<?php echo $id?>" class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> Choose Date

                </label>
            </div>
		<?php
	}
	
	static function txtTanggalLaporan($id,$val="",$holder=""){
		?>
		<script>
       	$(document).ready(function(e) {
        	 $("#<?php echo $id?>").datepicker({
					//dateFormat  : "dd MM yy",        
			  
			  dateFormat  : "dd-mm-yy",        
			  changeMonth : true,
			  changeYear  : true,
			  maxDate: '+0',
			});
    	});
	   
        </script>
        <div class="input-group">
                <input id="<?php echo $id?>" readonly="readonly" type="text" class="date-picker form-control" name="<?php echo $id?>" value="<?php echo $val?>"  placeholder="<?php echo $holder?>"/>
                <label for="<?php echo $id?>" class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> Choose Date

                </label>
            </div>
		<?php
	}
	
	static function txtBulan($id,$val="",$holder=""){
		?>
		<script>
        	 $(document).ready(function(e) {
				 $('#<?php echo $id?>').datepicker( {
					
					changeMonth: true,
					changeYear: true,
					showButtonPanel: true,
					dateFormat: 'yy-mm',
					maxDate: '+0m' ,
					onClose: function(dateText, inst) { 
						var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
						var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
						$(this).datepicker('setDate', new Date(year, month, 1));
						$(".ui-datepicker-calendar").hide();
					}
				});
				
				$("#<?php echo $id?>").focus(function () {
					$(".ui-datepicker-calendar").hide();
					$("#ui-datepicker-div").position({
						my: "center top",
						at: "center bottom",
						of: $(this)
					});
				});
			});
        </script>
         <div class="input-group">
                <input id="<?php echo $id?>" type="text" readonly="readonly" class="date-picker form-control" name="<?php echo $id?>" value="<?php echo $val?>"  placeholder="<?php echo $holder?>"/>
                <label for="<?php echo $id?>" class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> Choose Month

                </label>
            </div>
		<?php
	}
	
	static function txtTanggalLahir($id,$val="",$holder=""){
		?>
		<script>
       	$(document).ready(function(e) {
			
				$("#<?php echo $id?>").datepicker({
						//dateFormat  : "dd MM yy",        
				  dateFormat  : "dd-mm-yy",        
				  changeMonth : true,
				  changeYear  : true,
				  yearRange: '-40:-20',
				});
			
			 
	   	});
		
		
	   
        </script>
        
        <div class="input-group">
                <input id="<?php echo $id?>" type="text" readonly="readonly" class="date-picker form-control" name="<?php echo $id?>" value="<?php echo $val?>"  placeholder="<?php echo $holder?>"/>
                <label for="<?php echo $id?>" class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> Choose Date

                </label>
            </div>
		<?php
	}

	static function cekPilihan($val1,$val2,$mode){
		if($val1==$val2){ echo $mode."='".$mode."'";}
	}
	
	static function cekPilihan2($val1,$val2){
		if($val1==$val2){ echo "active";}
	}

	static function alert($pesan){
		if(!empty($pesan)){
			?>
			<br><div class="alert alert-danger">
    <?php
    	echo  $pesan;
	?>
    
    </div>
			<?php
		}	
	}

	static function alertValidasi($pesan){
		if(!empty($pesan)){
			?>
			<br><div class="alert alert-danger">
				<ul>
		    <?php
		    	foreach($pesan as $p){
		    		?>
					<li><?php echo $p?></li>
		    		<?php
		    	}
		    	
			?>
		    </ul>
		    </div>
			<?php
		}	
	}

	static function generateID($table,$depan,$kolom,$kondisi=""){
		//$ci= & get_instance();
		$query = DB::table($table);
		if($kondisi!=""){
			$query->whereRaw($kondisi);
		}
		$hasil = $query->orderBy($kolom)->get();
		if(count($hasil)==0){
			$id=$depan.sprintf("%04d",1);
		}else{
			foreach($hasil as $h){
				if($h->$kolom !="Online"){
					$idx=$h->$kolom;
					$y=1;
				}else{
					$y=2;
				}

			}
			
			$belakang=substr($idx,strlen($idx)-4,4);
			
			$belakang+=$y;
			//dd($belakang);
			$id=$depan.sprintf("%04d",$belakang);
		}

		return $id;
	}

	static function tableAtas($namaKolom){
		$kolom=explode("^|^",$namaKolom);
		?>
        <script>
			$(document).ready(function(){
				 oTable = $('.display').dataTable({
							"bJQueryUI": true,
							"bRetrieve":true,
							//"bSort": false,
							"aaSorting":[],
							"sPaginationType": "full_numbers"
						});	
			});
		</script>
		<div class="table-responsive">
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover display">
			<thead>
				<tr>
                    <?php for($i=0;$i<=count($kolom)-1;$i++){?>
                    <th><?php echo $kolom[$i]?></th>
                    <?php }?>
				</tr>
			</thead>
			<tbody>
		<?php
	}
	
	static function tableTengah($isiKolom,$style=""){ 
		$kolom=explode("^|^",$isiKolom);
		?>
		<tr>
           <?php for($i=0;$i<=count($kolom)-1;$i++){?>
                <td style=" <?php echo $style?>"><?php echo $kolom[$i]?></td>
           <?php }?>
		</tr>
		<?php
	}
	
	static function tableBawah(){ 
		?>
        	</tbody>
        </table>
     </div>
		<?php	
	}

	static function sukses($pesan){
		
		if(!empty($pesan)){
			?>
			<br><div class="alert alert-info">
    <?php
    	echo  $pesan;
	?>
    
    </div>
			<?php
		}	
	}

	static function google_map($width,$height,$alamat){
			$address = $alamat;//'201 S. Division St., Ann Arbor, MI 48104'; // Google HQ
			$prepAddr = str_replace(' ','+',$address);
			 
			$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
			$output= json_encode($geocode);
			if (!empty(Fungsi::lat_long($alamat)[0])) {
				$lat = Fungsi::lat_long($alamat)[0];
				$long = Fungsi::lat_long($alamat)[1];

 ?>
 <iframe width="<?php echo $width; ?>" height="<?php echo $height; ?>" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="
				http://maps.google.com/maps
				?f=q
				&amp;source=s_q
				&amp;hl=en
				&amp;geocode=
				&amp;q=<?php echo $prepAddr; ?>
				&amp;aq=0
				&amp;ie=UTF8
				&amp;hq=
				&amp;hnear=<?php echo $prepAddr; ?>
				&amp;t=m
				&amp;z=12
				&amp;iwloc=
				&amp;output=embed"></iframe>
<?php
			}else{
?>
			 <iframe width="<?php echo $width; ?>" height="<?php echo $height; ?>" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="
							http://maps.google.com/maps
							?f=q
							&amp;source=s_q
							&amp;hl=en
							&amp;geocode=
							&amp;q=<?php echo $prepAddr; ?>
							&amp;aq=0
							&amp;ie=UTF8
							&amp;hq=
							&amp;hnear=<?php echo $prepAddr; ?>
							&amp;t=m
							&amp;z=12
							&amp;iwloc=
							&amp;output=embed"></iframe>
<?php
			}



			}
			
			
			static function lat_long($alamat){
				
				$address = $alamat;//'201 S. Division St., Ann Arbor, MI 48104'; // Google HQ
				
				$prepAddr = str_replace(' ','+',$address);
				 /*
				 
				$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
				 */
				$url="http://maps.google.com/maps/api/geocode/json?address=".$prepAddr."&sensor=false";

				//dd($url);
				 $ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				$geocode = curl_exec($ch);
				
				curl_close($ch);
				$output= json_decode($geocode);
				if($output!=NULL){
					if ($output->status != "ZERO_RESULTS" && $output->status != "OVER_QUERY_LIMIT"   ) {
						$lat = $output->results[0]->geometry->location->lat;
						$long = $output->results[0]->geometry->location->lng;
					}else{
						$lat = NULL;
						$long = NULL;

						//$lat = -6.27138;
						//$long = 106.817;
					}
				}else{
						$lat = -6.27138;
						$long = 106.817;
					}
				 
				 
				 $pos =array($lat,$long);
				 return $pos;

			}
			
			static function txtJam($id,$value="",$holder=""){
	?>
	<script>
		 
    	$(document).ready(function(e) {
            
			$('#<?php echo $id?>').timepicker({
    		
				
				 minuteStep: 1,
				 
				showSeconds: false,
				showMeridian: false,
				<?php if($value==""){?>
					defaultTime: 'current',
				<?php }?>
				
			
			});
       });
		
		
    </script>
    
      <div class="input-append bootstrap-timepicker"> <input  name="<?php echo $id?>" type="text" id="<?php echo $id?>"  placeholder="<?php echo $holder?>" value="<?php echo $value?>" size="5" maxlength="5" readonly="readonly" style="width:80px;float:left" class="form-control input-small"/>
                    <span class="add-on"><button id="btn<?php echo $id?>" class="btn btn-default" type="button"><i class="glyphicon glyphicon-time"></i> Pilih Jam</button></span>
                    <div style="clear:both"></div>
                </div>
    
	<?php	
}
			
		
	static function zenziva($noTujuan,$message){
			$userkeyanda="ax3ig5";
					$passkeyanda="bebas";
			$url = "https://reguler.zenziva.net/apps/smsapi.php";
			$curlHandle = curl_init();

curl_setopt($curlHandle, CURLOPT_URL, $url);

curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey='.$userkeyanda.'&passkey='.$passkeyanda.'&nohp='.$noTujuan.'&pesan='.urlencode($message));


curl_setopt($curlHandle, CURLOPT_HEADER, 0);

curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);

curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);

curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);

curl_setopt($curlHandle, CURLOPT_POST, 1);

$results = curl_exec($curlHandle);

curl_close($curlHandle);						
		}

	static function cetak(){
		?>
		<script>
        	window.print() ;
        </script>
		<?php	
	}

}