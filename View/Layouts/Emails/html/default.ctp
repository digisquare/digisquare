<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta name="viewport" content="width=device-width">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><?php echo $title_for_layout; ?></title>
</head>
<body bgcolor="#FFFFFF" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0" style="margin:0;padding:0;height:100%;width:100%!important;">
	<table class="head-wrap" bgcolor="#000000" style="margin:0;padding:0;width:100%;">
		<tr>
			<td></td>
			<td class="header container" style="margin:0 auto!important;padding:0;display:block!important;max-width:600px!important;clear:both!important;">
				<div class="content" style="margin:0 auto;padding:15px 0;max-width:600px;display:block;">
					<table bgcolor="#000000" style="margin: 0;padding: 0;width: 100%;">
						<tr>
							<td>
								<img src="https://digisquare.net/img/logos/headline.png" style="margin:0;padding:0;max-width:100%;">
							</td>
						</tr>
					</table>
				</div>
			</td>
			<td></td>
		</tr>
	</table>
	<table class="body-wrap" bgcolor="#FFFFFF" style="margin:0;padding:0;width:100%;">
		<tr>
			<td></td>
			<td class="container" bgcolor="#FFFFFF" style="margin:0 auto!important;padding:0;display:block!important;max-width:600px!important;clear:both!important;">
				<?php echo $this->fetch('content'); ?>
			</td>
			<td></td>
		</tr>
	</table>
</body>
</html>