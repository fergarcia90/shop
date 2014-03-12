<?php
	session_start();
	include('class.ezpdf.php');
	mysql_connect("localhost","root","");
	mysql_select_db("tienda");
	$user=$_SESSION['user_id'];
	$qry="SELECT * FROM carrito WHERE userId='".$user."';";
	$resultado=mysql_query($qry) or die(mysql_error());

	$pdf = new Cezpdf();
		$pdf->selectFont('/opt/lampp/lib/fonts/Helvetica.afm');

		$pdf->ezText('Buy More',14);
		$pdf->ezText('Siente la Tecnologia',10);
		$pdf->ezText('',12);

		$i=0;
		while( $row=mysql_fetch_array($resultado) )
		{
			$data[$i]=array('upc'=>$row['upc'],'marca'=>$row['marca'],'modelo'=>$row['modelo'],'precio'=>$row['precio']);
			$i++;
		}

		$pdf->ezTable($data,"","Productos",array('width'=>500));

		$pdf->ezStream();
		exit;
?>