<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><link type="text/css" href="<?php echo $this->scope["conf"]["jqueryui_smoothness_css_path"];?>" rel="stylesheet" />
<link type="text/css" href="css/jquery.liveSearch.css" rel="stylesheet" />
<link type="text/css" href="css/jquery.multiselect.css" rel="stylesheet" />
<link type="text/css" href="css/jquery.flot.events.css" rel="stylesheet" />
<link type="text/css" href="<?php echo $this->scope["conf"]["fullcalendar_css_path"];?>" rel="stylesheet" />
<link type="text/css" href="css/qtip.min.css" rel="stylesheet" />
<link type="text/css" href="<?php echo $this->scope["conf"]["chosen_css_path"];?>" rel="stylesheet" />
<style type="text/css">
.chosen-container-multi .chosen-choices li.search-field input[type="text"] {
  height: auto;
}
</style>
<link type="text/css" href="<?php echo $this->scope["conf"]["select2_css_path"];?>" rel="stylesheet" />
<link type="text/css" href="./styles.css" rel="stylesheet" />
<link type="text/css" href="<?php echo $this->scope["conf"]["jstree_css_path"];?>" rel="stylesheet" />
<script type="text/javascript" src="<?php echo $this->scope["conf"]["jquery_js_path"];?>"></script>
<script type="text/javascript">$.uiBackCompat = false;</script>
<script type="text/javascript" src="<?php echo $this->scope["conf"]["jqueryui_js_path"];?>"></script>
<script type="text/javascript" src="<?php echo $this->scope["conf"]["jquery_flot_base_path"];?>.min.js"></script>
<script type="text/javascript" src="js/jquery.livesearch.min.js"></script>
<script type="text/javascript" src="js/ganglia.js"></script>
<script type="text/javascript" src="js/jquery.gangZoom.js"></script>
<script type="text/javascript" src="<?php echo $this->scope["conf"]["jquery_cookie_js_path"];?>"></script>
<script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="js/jquery.ba-bbq.min.js"></script>
<script type="text/javascript" src="js/combobox.js"></script>
<script type="text/javascript" src="<?php echo $this->scope["conf"]["jquery_scrollTo_js_path"];?>"></script>
<script type="text/javascript" src="<?php echo $this->scope["conf"]["jstree_js_path"];?>"></script>
<script type="text/javascript" src="js/jquery.qtip.min.js"></script>
<script type="text/javascript" src="<?php echo $this->scope["conf"]["chosen_js_path"];?>"></script>
<script type="text/javascript" src="<?php echo $this->scope["conf"]["select2_js_path"];?>"></script>
<script type="text/javascript" src="<?php echo $this->scope["conf"]["jstz_js_path"];?>"></script>
<script type="text/javascript" src="<?php echo $this->scope["conf"]["moment_js_path"];?>"></script>
<script type="text/javascript" src="<?php echo $this->scope["conf"]['moment-timezone_js_path'];?>"></script>
<script type="text/javascript" src="<?php echo $this->scope["conf"]["fullcalendar_js_path"];?>"></script>
<script type="text/javascript" src="js/jquery.multiselect.js"></script>
<script type="text/javascript" src="js/jquery.multiselect.filter.js"></script>
<script type="text/javascript" src="<?php echo $this->scope["conf"]["jquery_flot_base_path"];?>.crosshair.min.js"></script>
<script type="text/javascript" src="<?php echo $this->scope["conf"]["jquery_flot_base_path"];?>.stack.min.js"></script>
<script type="text/javascript" src="<?php echo $this->scope["conf"]["jquery_flot_base_path"];?>.selection.min.js"></script>
<script type="text/javascript" src="js/jquery.flot.ganglia-time.js"></script>
<script type="text/javascript" src="js/jquery.flot.events.js"></script>
<script type="text/javascript" src="js/jquery.flot.dashes.js"></script>
<script type="text/javascript" src="js/flot_graph.js"></script>
<script type="text/javascript" src="<?php echo $this->scope["conf"]["jquery_visible_js_path"];?>"></script>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>