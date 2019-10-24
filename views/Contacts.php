<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Contacts</title>
	<base href=<?php echo $GLOBALS['site']->baseUrl ;?> />
			<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="" />
	<meta name="keywords" content="" />
	<!-- Facebook Open Graph -->
	<meta property="og:title" content="Contacts" />
	<meta property="og:description" content="" />
	<meta property="og:image" content="" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content=<?php echo $GLOBALS['site']->baseUrl.$_SERVER['REQUEST_URI']; ?> />
	<!-- Facebook Open Graph end -->
		
	<link href="public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<script src="public/js/jquery-1.11.3.min.js" type="text/javascript"></script>
	<script src="public/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="public/js/main.js?v=20191007155957" type="text/javascript"></script>

	<link href="public/css/font-awesome/font-awesome.min.css?v=4.7.0" rel="stylesheet" type="text/css" />
	<link href="public/css/site.css?v=20190917130617" rel="stylesheet" type="text/css" id="wb-site-stylesheet" />
	<link href="public/css/common.css?ts=1571478066" rel="stylesheet" type="text/css" />
	<link href="public/css/3.css?ts=1571478066" rel="stylesheet" type="text/css" id="wb-page-stylesheet" />
	<script type="text/javascript">
	window.useTrailingSlashes = true;
</script>
	
	<link href="public/css/flag-icon-css/css/flag-icon.min.css" rel="stylesheet" type="text/css" />	
	<!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
	<![endif]-->

	</head>


<body class="site"><div class="root"><div class="vbox wb_container" id="wb_header">
	
<div class="wb_cont_inner"><div id="wb_element_instance6" class="wb_element wb-menu wb-menu-mobile"><a class="btn btn-default btn-collapser"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a><ul class="hmenu"><li><a href="/" target="_self">Accueil</a></li><li class="active"><a href="Contacts" target="_self">Contacts</a></li><li><a href="Se-connecter" target="_self">Se connecter</a></li></ul><div class="clearfix"></div></div><div id="wb_element_instance7" class="wb_element wb_text_element" style=" line-height: normal;"><h4 class="wb-stl-pagetitle"><span style="color:rgba(230,54,0,1);"><strong>5booster</strong></span></h4>
</div></div><div class="wb_cont_outer"></div><div class="wb_cont_bg"></div></div>
<div class="vbox wb_container" id="wb_main">
	
<div class="wb_cont_inner"><div id="wb_element_instance10" class="wb_element wb_text_element"  style=" line-height: normal;"><h2 class="wb-stl-heading2">Contacts</h2>

<p> </p>
<?php if(isset($_COOKIE['contact'])): ?>
<h4>We have received your massage, thank you for contacting!</h4>
<?php endif ?>
<p>Tu peux envoyer un mail ici mais c'est pas sûr qu'on reçoive :3</p>
</div><div id="wb_element_instance11" class="wb_element">


<form class="wb_form wb_mob_form" method="post" enctype="multipart/form-data"><input type="hidden" name="wb_form_id" value="e39f0d02"><textarea name="message" rows="3" cols="20" class="hpc" autocomplete="off"></textarea><table><tr><th>Nom&nbsp;&nbsp;</th><td><input type="hidden" name="wb_input_0" value="Nom"><input class="form-control form-field" type="text" value="" name="nom" required="required"></td></tr><tr><th>E-mail&nbsp;&nbsp;</th><td><input type="hidden" name="wb_input_1" value="E-mail"><input class="form-control form-field" type="text" value="" name="email" required="required"></td></tr><tr class="area-row"><th>Message&nbsp;&nbsp;</th><td><input type="hidden" name="wb_input_2" value="Message"><textarea class="form-control form-field form-area-field" rows="3" cols="20" name="message" required="required"></textarea></td></tr><tr class="form-footer"><td colspan="2"><button type="submit" class="btn btn-default">Envoyer</button></td></tr></table></form>
			
				
	</div></div><div class="wb_cont_outer"><div id="wb_element_instance12" class="wb_element wb_element_shape"><img src="public/images/ec620b81d1096c768f7dbe4268547e60.jpg" height="400" width="1262"/></div></div><div class="wb_cont_bg"></div></div>
<div class="vbox wb_container" id="wb_footer">
	
<div class="wb_cont_inner" style="height: 260px;"><div id="wb_element_instance8" class="wb_element wb_text_element" style=" line-height: normal;"><p class="wb-stl-footer">© 2019 <a href="http://5booster.com">5booster.com</a></p></div><div id="wb_element_instance9" class="wb_element wb_text_element" style=" line-height: normal;"><p class="wb-stl-custom4" style="text-align: center;">Ce site est en cours de création</p>
</div><div id="wb_element_instance13" class="wb_element" style="text-align: center; width: 100%;"><div class="wb_footer"></div><script type="text/javascript">
			$(function() {
				var footer = $(".wb_footer");
				var html = (footer.html() + "").replace(/^\s+|\s+$/g, "");
				if (!html) {
					footer.parent().remove();
					footer = $("#wb_footer, #wb_footer .wb_cont_inner");
					footer.css({height: ""});
				}
			});
			</script></div></div><div class="wb_cont_outer"></div><div class="wb_cont_bg"></div></div><div class="wb_sbg"></div></div></body>
</html>
