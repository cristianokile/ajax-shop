<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
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
	
<?php if(isset($_POST['form-nome'])) {
	$form_nome = $_POST['form-nome'] . "<br>";
};
if(isset($_POST['form-email'])) {
	$form_email = $_POST['form-email'] . "<br>";
};
if(isset($_GET['form-tel'])) {
	$form_tel = $_POST['form-tel'];
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
				<th style='text-align: center;''>Imagem</td>
				<th>Descrição</td>
				<th style='text-align: center;'>Categoria</td>
				<th style='text-align: center;'>Estoque</td>
				<th style='text-align: center;'>Qtde Desejada</td>
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
				<td style='text-align: center;'>
					<img style='width: 15%; height: auto;'src='" . $product_image . "' alt='" . $product_name . "' title='" . $product_name . "'>
				</td>
				<td style='text-align: center;'>
					<p>" . $product_name . "</p>
					<p><strong>Tamanho: </strong> " . $product_size . "</p>
				</td>
				<td style='text-align: center;'>
					" . $product_cat . "
					</div>
				</td>
				<td style='text-align: center;'>
					" . $product_stock . "
				</td>
				<td style='text-align: center;'>
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

$mail->setFrom('cristiano@chiapadesign.com.br', 'Chiapa User');
$mail->addAddress('criskile@gmail.com', 'Cristiano');     // Add a recipient
$mail->addReplyTo('criskile@hotmail.com', 'Cristiano Hotmail');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Orçamento de Produtos';
$mail->Body    = $mailbody;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Orçamento enviado!';
} ?>

</body>
</html>
