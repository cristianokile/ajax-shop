<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Solicitando Orçamento</title>
	<?php session_start(); ?>
	<style>
		*{font-family: arial, verdana, 'sans-serif'}
		table, th, td {
			border: 1px solid black;
		}
		th{background: #ccc; padding: 10px 0}
	</style>
</head>
<body>
	
<?php if(isset($_POST['cliente_nome'])) {
	$form_nome = $_POST['cliente_nome'] . "<br>";
};
if(isset($_POST['cliente_email'])) {
	$form_email = $_POST['cliente_email'] . "<br>";
};
if(isset($_POST['cliente_tel'])) {
	$form_tel = $_POST['cliente_tel'];
}; ?>

<?php  $cart_box 			=  "
<div class='col-md-12'>
	<h2>Dados do Solicitante</h2>
	<hr>
	<br>
	<p><strong>Nome:</strong> $form_nome</p>
	<p><strong>E-mail:</strong> $form_email</p>
	<p><strong>Telefone:</strong> $form_tel</p>
	<hr>
	<br>
";?>

<?php // -------------------- ?>

<?php $cart_box 			.=  "
		<h2>Produtos Solicitados</h2>
		<table style='border-collapse: collapse; width: 100%; border: 1px solid black;'>
			<tr>
				<th style='text-align: center; border: 1px solid black'>Imagem</th>
				<th style='border: 1px solid black'>Descrição</th>
				<th style='text-align: center; border: 1px solid black'>Categoria</th>
				<th style='text-align: center; border: 1px solid black'>Qtde Desejada</th>
			</tr>";?>
	
</table>
<?php
	if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){
		$cart_box .= "<ul class='col-md-12 lista-carrinho'>";
		$total 			= 0;

		foreach($_SESSION["products"] as $product){ 
			$product_id 		= $product["id"];
			$product_name 		= $product["product_name"];
			$product_code 		= $product["product_code"];
			$product_size 		= $product["product_size"];
			$product_cat 		= $product["product_cat"];
			$product_image 		= $product["product_image"];
			$product_image_hd	= $product["product_image_hd"];
			$product_price 		= $product["product_price"];
			$product_stock 		= $product["product_stock"];
			$product_qtde		= $product["product_qtde"];
			//$item_price 		= sprintf("%01.2f",($product_price * $product_qtde));

			$cart_box 			.=  "
			<tr>
				<td style='text-align: center; border: 1px solid black;'>
					<img style='width: 15%; height: auto;'src='http://www.chiapadesign.com.br/beta/rbc/" . $product_image . "' alt='" . $product_name . "' title='" . $product_name . "'>
				</td>
				<td style='text-align: center; border: 1px solid black;'>
					<p>" . $product_name . "</p>
					<p><strong>Tamanho: </strong> " . $product_size . "</p>
				</td>
				<td style='text-align: center; border: 1px solid black;'>
					" . $product_cat . "
				</td>
				<td style='text-align: center; border: 1px solid black;'>
					" . $product_qtde . "
				</td>
			</tr>";

				$subtotal 		= ($product_price * $product_qtde); 
				$total 			= ($total + $subtotal); 
			}

			$grand_total = $total; //grand total
			/*
			$cart_box .= "<li class=\"view-cart-total\">Total : $currency ".sprintf("%01.2f", $grand_total)."</li>";
			$cart_box .= "</ul>";

			*/
			$cart_box .="</table>
			<br>
			<p style='display:block; text-align:center'><small> - Orçamento solicitado via formulário do site <strong>RBC Global Business</strong> - </small>";	 
			}else{
				echo "<br><p class='text-center'>Você não possui produtos adicionados</p>";
			}?>
		</ul>

<?php // -------------------- ?>


<?php 
$mailbody = null;
$mailbody = $cart_box; ?>	

		
	</table>


<?php 
// ENVIO DE E-MAIL
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.chiapadesign.com.br';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'cristiano@chiapadesign.com.br';                 // SMTP username
$mail->Password = '5sydkzavg2ckcg99';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('cristiano@chiapadesign.com.br', 'RBC Global Business');
$mail->addAddress('criskile@gmail.com', 'Cristiano');     // Add a recipient
$mail->addReplyTo(" ' " . $form_email . " ' ", " ' " . $form_nome. " ' ");
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'RBC - Orcamento de Produtos';
$mail->Body    = $mailbody;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Orçamento enviado!';
} ?>

</body>
</html>
