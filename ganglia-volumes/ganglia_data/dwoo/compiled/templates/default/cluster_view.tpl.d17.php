<?php
/* template head */
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
/* end template head */ ob_start(); /* template body */ ?><!-- Begin cluster_view.tpl -->
<?php if ((isset($this->scope["heatmap_data"]) ? $this->scope["heatmap_data"] : null)) {
?>
<script type="text/javascript" src="<?php echo $this->scope["conf"]["protovis_js_path"];?>"></script>
<?php 
}?>

<script type="text/javascript">
function Heatmap(elem_id, data) {
  this.elem_id = elem_id;
  this.data = data;
  this.num_cols = data.length;
  this.cell_size = $("#" + elem_id).height() / this.num_cols;
  var this_map = this;

  this.vis = new pv.Panel()
    .width($("#" + elem_id).width())
    .height($("#" + elem_id).height())
    .margin(2)
    .strokeStyle("#aaa")
    .lineWidth(4)
    .antialias(false);

  this.fill = pv.Scale.linear().
    domain(0, 0.25, 0.5, 0.75, 1.00).
    range("#e2ecff", "#caff98", "#ffde5e", "#ffa15e", "#ff634f");

  this.row = this.vis.add(pv.Panel)
    .data(pv.range(this.num_cols))
    .height(this.cell_size)
    .top(function(d) { return d * this_map.cell_size;});

  this.cell = this.row.add(pv.Panel)
    .data(pv.range(this.num_cols))
    .height(this.cell_size)
    .width(this.cell_size)
    .left(function(d) { return d * this_map.cell_size;})
    .fillStyle(function(col_index, row_index) { return this_map.fill(this_map.data[row_index][col_index].load);})
    .title(function(col_index, row_index) { return this_map.data[row_index][col_index].host + ", load = " + (this_map.data[row_index][col_index].load * 100).toFixed(0) + "%";});
}

Heatmap.prototype.setData = function(data) {
  this.data = data;
  this.num_cols = data.length;
  this.cell_size = $("#" + this.elem_id).height() / this.num_cols;
}

Heatmap.prototype.render = function() {
  this.vis.render();
}

function refreshClusterView() {
  $.get('cluster_view.php?' + jQuery.param.querystring() + '&refresh', function(data) {
    var item = data.split("<!-- || -->");

    $('#cluster_title').html(item[1]);

    $('#cluster_overview').html(item[2]);

    if ($('#load_pie').length)
      $('#load_pie').attr("src", item[3].replace(/&amp;/g, "&"));

    if ($('#heatmap-fig').length) {
      eval("heatmap.setData(" + item[4] + ")");
      heatmap.render();
    }

    if ($('#stacked_graph').length) {
      var localtimestamp = parseInt(item[0]);
      var src = $('#stacked_graph').attr('src');
      $('#stacked_graph').attr("src", jQuery.param.querystring(src, "&st=" + localtimestamp));
    }

    var host_metric_graphs = $('#host_metric_graphs');
    host_metric_graphs.css('height', host_metric_graphs.height() + "px");
    host_metric_graphs.html(item[5]);
  });

  $("#optional_graphs img").each(function (index) {
    var src = $(this).attr("src");
    if ((src.indexOf("graph.php") == 0) ||
        (src.indexOf("./graph.php") == 0)) {
      var d = new Date();
      $(this).attr("src", jQuery.param.querystring(src, "&_=" + d.getTime()));
    }
  });
}

$(function() {
  // Modified from http://jqueryui.com/demos/toggle/
  // run the currently selected effect
  function runEffect(id){
    // most effect types need no options passed by default
    var options = { };

    options = { to: { width: 200,height: 60 } };

    // run the effect
    $("#"+id+"_div").toggle("blind",options,500);
  };

  // set effect from select menu value
  $('.button').click(function(event) {
    runEffect(event.target.id);
    return false;
  });

  $("#edit_optional_graphs").dialog({ autoOpen:
                                      false, minWidth: 550,
                                      beforeClose: function(event, ui) {
                                        location.reload(true);
                                      }});
  $("#edit_optional_graphs_button").button();
  $("#save_optional_graphs_button").button();
  $("#close_edit_optional_graphs_link").button();

  $("#edit_optional_graphs_button").click(function(event) {
    $("#edit_optional_graphs").dialog('open');
    $('#edit_optional_graphs_content').html('<img src="img/spinner.gif">');
    $.get('edit_optional_graphs.php',
          "clustername=<?php echo $this->scope["cluster"];?>",
          function(data) {
            $('#edit_optional_graphs_content').html(data);
          });
    return false;
  });

  $("#save_optional_graphs_button").click(function(event) {
    $.get('edit_optional_graphs.php',
          $("#edit_optional_reports_form").serialize(),
          function(data) {
            $('#edit_optional_graphs_content').html(data);
            $("#save_optional_graphs_button").hide();
            setTimeout(function() {
              $('#edit_optional_graphs').dialog('close');}, 5000);
          });
    return false;
  });

   var $show_hosts_scaled = $("#show_hosts_scaled");
   $show_hosts_scaled.children(":radio").each(function() {
     $(this).checkboxradio( { icon: false } );
   });
   $show_hosts_scaled.controlgroup();


  <?php if ((isset($this->scope["picker_autocomplete"]) ? $this->scope["picker_autocomplete"] : null)) {
?>
    var cache = { }, lastXhr;
    $("#metrics-picker").autocomplete({
      minLength: 2,
      source: function( request, response ) {
        var term = request.term;
        if ( term in cache ) {
          response( cache[term] );
          return;
        }
        lastXhr = $.getJSON("api/metrics_autocomplete.php",
                            request,
                            function( data, status, xhr ) {
                              cache[term] = data.message;
                              if ( xhr == lastXhr ) {
                                response(data.message);
                              }
                            });
      }
    });
  <?php 
}
else {
?>
    $("#metrics-picker").chosen({ max_selected_options:1,
                                  search_contains:true,
                                  no_results_text:"No metrics matched",
                                  placeholder_text_single:"Select a metric"}).
    on('change', function (evt, params) { ganglia_form.submit();});
  <?php 
}?>

});
</script>

<style type="text/css">
  .toggler { width: 500px; height: 200px; }
  a.button { padding: .15em 1em; text-decoration: none; }
  #effect { width: 240px; height: 135px; padding: 0.4em; position: relative; }
  #effect h3 { margin: 0; padding: 0.4em; text-align: center; }
  #heatmap-fig {
    width: 200px;
    height: 200px;
  }
</style>

<div id="edit_optional_graphs">
  <div style="text-align:center">
    <button  id='save_optional_graphs_button'>Save</button>
  </div>
  <div id="edit_optional_graphs_content">Empty</div>
</div>

<div style="background:rgb(238,238,238);text-align:center;">
  <font size="+1"
        id="cluster_title">Overview of <?php echo $this->scope["cluster"];?> @ <?php echo $this->scope["localtime"];?></font>
</div>

<table border="0" cellspacing=4 width="100%">
  <tr>
    <td align="left" valign="top">
      <div id="cluster_overview">
        <?php echo Dwoo_Plugin_include($this, 'cluster_overview.tpl', null, null, null, '_root', null);?>

      </div>
      <?php if (((isset($this->scope["extra"]) ? $this->scope["extra"] : null) !== null)) {
?>
        <?php echo Dwoo_Plugin_include($this, "".(isset($this->scope["extra"]) ? $this->scope["extra"] : null)."", null, null, null, '_root', null);?>

      <?php 
}?>

    </td>
    <td rowspan=2 align="center" valign=top>
      <div id="optional_graphs" style="padding-bottom:4px">
        <?php 
$_fh0_data = (isset($this->scope["optional_reports"]) ? $this->scope["optional_reports"] : null);
if ($this->isTraversable($_fh0_data) == true)
{
	foreach ($_fh0_data as $this->scope['graph'])
	{
/* -- foreach start output */
?>
          <a href="./graph_all_periods.php?<?php echo $this->scope["graph"]["graph_args"];?>&amp;g=<?php echo $this->scope["graph"]["name"];?>&amp;z=large">
            <img border=0
                 <?php if ((isset($this->scope["graph"]["zoom_support"]) ? $this->scope["graph"]["zoom_support"]:null)) {
?>class="cluster_zoomable"<?php 
}?>

                 title="<?php echo $this->scope["cluster"];?> <?php echo $this->scope["graph"]["name"];?>"
                 src="./graph.php?<?php echo $this->scope["graph"]["graph_args"];?>&amp;g=<?php echo $this->scope["graph"]["name"];?>&amp;z=<?php echo $this->scope["graph"]["size"];?>"></a>
        <?php 
/* -- foreach end output */
	}
}?>

        <br>
        <?php 
$_fh1_data = (isset($this->scope["optional_graphs"]) ? $this->scope["optional_graphs"] : null);
if ($this->isTraversable($_fh1_data) == true)
{
	foreach ($_fh1_data as $this->scope['graph'])
	{
/* -- foreach start output */
?>
          <a href="./graph_all_periods.php?<?php echo $this->scope["graph"]["graph_args"];?>&amp;g=<?php echo $this->scope["graph"]["name"];?>_report&amp;z=large">
            <img border=0
                 <?php if ((isset($this->scope["graph"]["zoom_support"]) ? $this->scope["graph"]["zoom_support"]:null)) {
?>class="cluster_zoomable"<?php 
}?>

                 title="<?php echo $this->scope["cluster"];?> <?php echo $this->scope["graph"]["name"];?>"
                 src="./graph.php?<?php echo $this->scope["graph"]["graph_args"];?>&amp;g=<?php echo $this->scope["graph"]["name"];?>_report&amp;z=medium"></a>
        <?php 
/* -- foreach end output */
	}
}?>

      </div>
      <?php if ((isset($this->scope["user_may_edit"]) ? $this->scope["user_may_edit"] : null)) {
?>
        <button id="edit_optional_graphs_button">Edit Optional Graphs</button>
      <?php 
}?>

    </td>
  </tr>
  <tr>
    <td align="center" valign="top">
      <?php if ((isset($this->scope["php_gd"]) ? $this->scope["php_gd"] : null) && ! (isset($this->scope["heatmap_data"]) ? $this->scope["heatmap_data"] : null)) {
?>
        <img id="load_pie" src="./pie.php?<?php echo $this->scope["pie_args"];?>" border="0" />
      <?php 
}?>

      <?php if ((isset($this->scope["heatmap_data"]) ? $this->scope["heatmap_data"] : null) && (isset($this->scope["overview"]["num_nodes"]) ? $this->scope["overview"]["num_nodes"]:null) > 0) {
?>
        Server Load Distribution<br />
        <div id="heatmap-fig">
          <script type="text/javascript">
           var heatmap = new Heatmap("heatmap-fig", <?php echo $this->scope["heatmap_data"];?>);
           heatmap.render();
          </script>
        </div>
      <?php 
}?>

    </td>
  </tr>
</table>

<?php if ((isset($this->scope["stacked_graph_args"]) ? $this->scope["stacked_graph_args"] : null)) {
?>
  <center>
    <table width="100%" border=0>
      <tr>
        <td colspan="1">
          <font size="+1"
                style="text-align:center">Stacked Graph - <?php echo $this->scope["metric"];?></font>
        </td>
      </tr>
      <tr>
        <td>
          <center><img id="stacked_graph"
                       src="stacked.php?<?php echo $this->scope["stacked_graph_args"];?>"
                       alt="<?php echo $this->scope["cluster"];?> <?php echo $this->scope["metric"];?>"></center>
        </td>
      </tr>
    </table>
  </center>
<?php 
}?>


<div id="cluster_view_chooser" style="padding:5px;background:rgb(238,238,238);">
  <div style="text-align:center;padding:5px;">
    <?php if ((isset($this->scope["showhosts"]) ? $this->scope["showhosts"] : null) != 0) {
?>
      <div class="nobr"><?php echo $this->scope["cluster"];?> <strong><?php echo $this->scope["metric"];?></strong>
        last <strong><?php echo $this->scope["overview"]["range"];?></strong>
        sorted <strong><?php echo $this->scope["sort"];?></strong>
      </div>
      <div style="display:inline;padding:5px 0 0 0;">
        Metric&nbsp;
        <?php if ((isset($this->scope["picker_autocomplete"]) ? $this->scope["picker_autocomplete"] : null)) {
?>
          <input name="m" id="metrics-picker" />
        <?php 
}
else {
?>
          <select name="m" id="metrics-picker"><?php echo $this->scope["picker_metrics"];?></select>
        <?php 
}?>

      </div>
    <?php 
}?>

    <div style="padding:5px 0 0 0;">Show Hosts Scaled:&nbsp;&nbsp;
      <div id="show_hosts_scaled">
        <?php 
$_fh2_data = (isset($this->scope["showhosts_levels"]) ? $this->scope["showhosts_levels"] : null);
$this->globals["foreach"]['default'] = array
(
	"iteration"		=> 1,
	"last"		=> null,
	"total"		=> $this->count($_fh2_data),
);
$_fh2_glob =& $this->globals["foreach"]['default'];
if ($this->isTraversable($_fh2_data) == true)
{
	foreach ($_fh2_data as $this->scope['id']=>$this->scope['showhosts'])
	{
		$_fh2_glob["last"] = (string) ($_fh2_glob["iteration"] === $_fh2_glob["total"]);
/* -- foreach start output */
?>
          <input type="radio"
                 name="sh"
                 value="<?php echo $this->scope["id"];?>"
                 id="shch<?php echo $this->scope["id"];?>"
                 OnClick="ganglia_form.submit();" <?php echo $this->scope["showhosts"]["checked"];?>>
          <label for="shch<?php echo $this->scope["id"];?>"><?php echo $this->scope["showhosts"]["name"];?></label>
        <?php 
/* -- implode */
if (!$_fh2_glob["last"]) {
	echo "";
}
/* -- foreach end output */
		$_fh2_glob["iteration"]+=1;
	}
}?>

      </div>
      <?php if (((isset($this->scope["columns_size_dropdown"]) ? $this->scope["columns_size_dropdown"] : null) !== null) && ( (isset($this->scope["showhosts"]) ? $this->scope["showhosts"] : null) != 0 )) {
?>
        <div style="display:inline;padding-left:10px;"
             class="nobr">Size&nbsp;&nbsp;<?php echo $this->scope["size_menu"];?></div>
        <div style="display:inline;padding-left:10px;"
             class="nobr">Columns&nbsp;&nbsp;<?php echo $this->scope["cols_menu"];?> (0 = metric + reports)</div>
      <?php 
}?>

    </div>
    <div style="text-align:center;padding:5px 0 0 0;">
      <?php echo $this->scope["additional_filter_options"];?>

    </div>
  </div>
</div>

<div id="host_metric_graphs">
  <?php echo Dwoo_Plugin_include($this, 'cluster_host_metric_graphs.tpl', null, null, null, '_root', null);?>

</div>

<!-- End cluster_view.tpl -->
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>