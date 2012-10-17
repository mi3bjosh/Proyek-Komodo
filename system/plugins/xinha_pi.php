<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function javascript_xinha( $textarea, $skin=NULL )
{
 $obj =& get_instance();
 $base = $obj->config->slash_item('base_url');
 ob_start();
?>

 <script type="text/javascript">
 _editor_url  = "<?php echo $base;?>xinha/";
 _editor_lang = "en";
 </script>

 <!--
 Bagian ini penting dan wajib di ikutsertakan
 karena berperan juga dalam proses pemuatan editor
 -->
 <script type="text/javascript" src="<?php echo $base;?>xinha/htmlarea.js"></script>

 <?php
 if($skin != NULL)
 {
 ?>
 <!-- Bagian ini untuk menentukan skin/tampilan dari Xinha WYSIWYG Editor -->
 <link rel="stylesheet" href="<?php echo $base;?>xinha/skins/<?php echo $skin;?>/skin.css" type="text/css">
 <?php
 }
 ?>
 <script type="text/javascript">
 xinha_editors = null;
 xinha_init = null;
 xinha_config  = null;
 xinha_plugins = null;

 xinha_init = xinha_init ? xinha_init : function()
 {

 xinha_plugins = xinha_plugins ? xinha_plugins :
 [

 <?php
 /*
 $plugin_names="";

 foreach ($plugins as $plugin){
 $plugin_names.= "'$plugin',";
 }

 $plugin_names = substr($plugin_names,0,-1);
 echo $plugin_names;
 */
 ?>
 ];

 if(!HTMLArea.loadPlugins(xinha_plugins, xinha_init)) return;

 xinha_editors = xinha_editors ? xinha_editors :
 [

 <?php
 $area="";
 foreach ($textarea as $item){
 $area.= "'$item',";
 }
 $area=substr($area,0,-1);
 echo $area;
 ?>
 ];

 xinha_config = xinha_config ? xinha_config() : new HTMLArea.Config();
 xinha_config.pageStyle = 'body { font-family: verdana,arial,sans-serif; font-size: .9em; }';
 xinha_editors = HTMLArea.makeEditors( xinha_editors, xinha_config, xinha_plugins);

 HTMLArea.startEditors(xinha_editors);
 }
 window.onload = xinha_init;
 </script>
 <?php
 $r = ob_get_contents();
 ob_end_clean();
 return $r;
}
?>