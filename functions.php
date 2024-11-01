<?php
function vrt_get_def_settings()
{
	$vrt_settings = array('bannerWidth' => '736',
			'bannerHeight' => '600',
			'backgroundColor' => '#ffffff',
			'wmode' => 'transparent',
			'delay' => '6000',
			'slideshow_bg_color' => '003366',
			'bg_gradient_color_2' => '000000',
			'titlebar_bg_color' => 'FFFFFF',
			'descriptionBackgroundAlpha' => '0.5',
			'fontcolor' => '#000000',
			'fontsize' => '15',
			'thumbnail_width' => '100',
			'thumbnail_height' => '65',
			'thumbnail_spacing' => '5',
			'thumbnail_bg_color' => '003366',
			'thumbnail_bar_position' => 'left',
			'tooltip_font_size' => '18',
			'tooltipAlpha' => '1',
			'tooltip_font_color' => '#FFFFFF',
			'tooltip_bg_color' => '3399FF',
			'fullscreen' => 'on',
			'bg_gradient_color_1' => '003366',
			'bg_gradient_angle' => '0',
			'gradient_filltype' => 'radial',
			'gradient_enable' => '1',
			'thumb_highlight_color' => 'FF0000',
			'thumb_marker_alpha' => '0.5',
			'marker_thickness' => '5',
			'marker_type' => 'line',
			'thumb_scroll_speed' => '10',
			'image_Scale' => '0',
			'thumbnail_Scale' => '0',
			'showimg_title' => 'yes',
			'show_desc' => 'yes',
			'imglink_enable' => '1',
			'target' => '_self'		
			);
	return $vrt_settings;
}
function __get_vrt_xml_settings()
{
	$ops = get_option('vrt_settings', array());
	
	$xml_settings = '<delay>'.$ops['delay'].'</delay>
	<titlebar_bg_color>0x'.$ops['titlebar_bg_color'].'</titlebar_bg_color>

<tooltip_bg_color>0x'.$ops['tooltip_bg_color'].'</tooltip_bg_color>
<effects>0</effects>
<thumbnail_bg_color>0x'.$ops['thumbnail_bg_color'].'</thumbnail_bg_color>

<thumbnail_width>'.$ops['thumbnail_width'].'</thumbnail_width>
<thumbnail_height>'.$ops['thumbnail_height'].'</thumbnail_height>
<thumbnail_spacing>'.$ops['thumbnail_spacing'].'</thumbnail_spacing>
<thumbnail_Scale>'.$ops['thumbnail_Scale'].'</thumbnail_Scale>
<thumbnail_bar_position>'.$ops['thumbnail_bar_position'].'</thumbnail_bar_position>

<thumb_highlight_color>0x'.$ops['thumb_highlight_color'].'</thumb_highlight_color>
<thumb_scroll_speed>'.$ops['thumb_scroll_speed'].'</thumb_scroll_speed>
	<fullscreen>'.trim($ops['fullscreen']).'</fullscreen>
<slideshow_bg_color>0x'.$ops['slideshow_bg_color'].'</slideshow_bg_color>
	<background_gradient_color_1>0x'.$ops['bg_gradient_color_1'].'</background_gradient_color_1> 
<background_gradient_color_2>0x'.$ops['bg_gradient_color_2'].'</background_gradient_color_2> 
<background_gradient_angle>'.$ops['bg_gradient_angle'].'</background_gradient_angle>
<gradient_filltype>'.$ops['gradient_filltype'].'</gradient_filltype>
<gradient_enable>'.$ops['gradient_enable'].'</gradient_enable>
<image_Scale>'.$ops['image_Scale'].'</image_Scale>


<descriptionBackgroundAlpha>'.$ops['descriptionBackgroundAlpha'].'</descriptionBackgroundAlpha>
<tooltipAlpha>'.$ops['tooltipAlpha'].'</tooltipAlpha>
	<selectedThumbMarker>
<color>0x'.$ops['thumb_highlight_color'].'</color>
<alpha>'.$ops['thumb_marker_alpha'].'</alpha>
<thickness>'.$ops['marker_thickness'].'</thickness>
<type>'.$ops['marker_type'].'</type>
</selectedThumbMarker>';
	return $xml_settings;
}
function vrt_get_album_dir($album_id)
{
	global $gvrt;
	$album_dir = VRT_PLUGIN_UPLOADS_DIR . "/{$album_id}_uploadfolder";
	return $album_dir;
}
/**
 * Get album url
 * @param $album_id
 * @return unknown_type
 */
function vrt_get_album_url($album_id)
{
	global $gvrt;
	$album_url = VRT_PLUGIN_UPLOADS_URL . "/{$album_id}_uploadfolder";
	return $album_url;
}
function vrt_get_table_actions(array $tasks)
{
	?>
	<div class="bulk_actions">
		<form action="" method="post" class="bulk_form">Bulk action
			<select name="task">
				<?php foreach($tasks as $t => $label): ?>
				<option value="<?php print $t; ?>"><?php print $label; ?></option>
				<?php endforeach; ?>
			</select>
			<button class="button-secondary do_bulk_actions" type="submit">Do</button>
		</form>
	</div>
	<?php 
}
function shortcode_display_vrt_gallery($atts)
{
	$vars = shortcode_atts( array(
									'cats' => '',
									'imgs' => '',
								), 
							$atts );
	//extract( $vars );
	
	$ret = display_vrt_gallery($vars);
	return $ret;
}
function display_vrt_gallery($vars)
{
	global $wpdb, $gvrt;
	$ops = get_option('vrt_settings', array());
	//print_r($ops);
	$albums = null;
	$images = null;
	$cids = trim($vars['cats']);
	if (strlen($cids) != strspn($cids, "0123456789,")) {
		$cids = '';
		$vars['cats'] = '';
	}
	$imgs = trim($vars['imgs']);
	if (strlen($imgs) != strspn($imgs, "0123456789,")) {
		$imgs = '';
		$vars['imgs'] = '';
	}
	$categories = '';
	$xml_filename = '';
	if( !empty($cids) && $cids{strlen($cids)-1} == ',')
	{
		$cids = substr($cids, 0, -1);
	}
	if( !empty($imgs) && $imgs{strlen($imgs)-1} == ',')
	{
		$imgs = substr($imgs, 0, -1);
	}
	//check for xml file
	if( !empty($vars['cats']) )
	{
		$xml_filename = "cat_".str_replace(',', '', $cids) . '.xml';	
	}
	elseif( !empty($vars['imgs']))
	{
		$xml_filename = "image_".str_replace(',', '', $imgs) . '.xml';
	}
	else
	{
		$xml_filename = "vrt_all.xml";
	}
	//die(VRT_PLUGIN_XML_DIR . '/' . $xml_filename);


	
	if( !empty($vars['cats']) )
	{
		$query = "SELECT * FROM {$wpdb->prefix}vrt_albums WHERE album_id IN($cids) AND status = 1 ORDER BY `order` ASC";
		//print $query;
		$albums = $wpdb->get_results($query, ARRAY_A);
		foreach($albums as $key => $album)
		{
			$images = $gvrt->vrt_get_album_images($album['album_id']);
			if ($images && !empty($images) && is_array($images)) {
				$album_dir = vrt_get_album_url($album['album_id']);//VRT_PLUGIN_UPLOADS_URL . '/' . $album['album_id']."_".$album['name'];
				foreach($images as $key => $img)
				{
					if( $img['status'] == 0 ) continue;
					
					$categories .= '<picture>';
					if (false === strpos($img['image'], '://')) {
						$categories .= ' <big>'.$album_dir."/big/".$img['image'].'</big>';
					}else{
						$categories .= ' <big>'.$img['image'].'</big>';
					}

					if (false === strpos($img['thumb'], '://')) {
						$categories .= ' <small>'.$album_dir."/thumb/".$img['thumb'].'</small>';
					}else{
						$categories .= ' <small>'.$img['thumb'].'</small>';
					}
					if ($ops['show_desc'] == 'yes') {
						$categories .= ' <detail><![CDATA[<font color="'.$ops['fontcolor'].'" size="'.$ops['fontsize'].'">'.$img['description'].'</font>]]></detail>';
					}else{
						$categories .= ' <detail><![CDATA[]]></detail>';
					}
					if($img['title']!=""){
						if ($ops['showimg_title'] == 'yes') {
							$categories .= '<tolltip><![CDATA[<font size="'.$ops['tooltip_font_size'].'" color="'.$ops['tooltip_font_color'].'">'.$img['title'].'</font>]]></tolltip>';
						}else{
							$categories .= '<tolltip><![CDATA[]]></tolltip>';
						}
					}else{
						$categories .= '<tolltip><![CDATA[]]></tolltip>';
					}
					$categories .= '	<link><![CDATA['.$img['link'].']]></link>';
					$categories .= '	<target>'.$ops['target'].'</target>';
					$categories .= '</picture> ';
				}
			}
		}
		//$xml_filename = "cat_".str_replace(',', '', $cids) . '.xml';
	}
	elseif( !empty($vars['imgs']))
	{
		$query = "SELECT * FROM {$wpdb->prefix}vrt_images WHERE image_id IN($imgs) AND status = 1 ORDER BY `order` ASC";
		$images = $wpdb->get_results($query, ARRAY_A);
		if ($images && !empty($images) && is_array($images)) {
			foreach($images as $key => $img)
			{
				$album = $gvrt->vrt_get_album($img['category_id']);
				$album_dir = vrt_get_album_url($album['album_id']);//VRT_PLUGIN_UPLOADS_URL . '/' . $album['album_id']."_".$album['name'];
				if( $img['status'] == 0 ) continue;
				
				$categories .= '<picture>';
					if (false === strpos($img['image'], '://')) {
						$categories .= ' <big>'.$album_dir."/big/".$img['image'].'</big>';
					}else{
						$categories .= ' <big>'.$img['image'].'</big>';
					}

					if (false === strpos($img['thumb'], '://')) {
						$categories .= ' <small>'.$album_dir."/thumb/".$img['thumb'].'</small>';
					}else{
						$categories .= ' <small>'.$img['thumb'].'</small>';
					}
					if ($ops['show_desc'] == 'yes') {
						$categories .= ' <detail><![CDATA[<font color="'.$ops['fontcolor'].'" size="'.$ops['fontsize'].'">'.$img['description'].'</font>]]></detail>';
					}else{
						$categories .= ' <detail><![CDATA[]]></detail>';
					}
					if($img['title']!=""){
						if ($ops['showimg_title'] == 'yes') {
							$categories .= '<tolltip><![CDATA[<font size="'.$ops['tooltip_font_size'].'" color="'.$ops['tooltip_font_color'].'">'.$img['title'].'</font>]]></tolltip>';
						}else{
							$categories .= '<tolltip><![CDATA[]]></tolltip>';
						}
					}else{
						$categories .= '<tolltip><![CDATA[]]></tolltip>';
					}
					$categories .= '	<link><![CDATA['.$img['link'].']]></link>';
					$categories .= '	<target>'.$ops['target'].'</target>';
					$categories .= '</picture> ';
			}
		}
	}
	//no values paremeters setted
	else//( empty($vars['cats']) && empty($vars['imgs']))
	{
		$query = "SELECT * FROM {$wpdb->prefix}vrt_albums WHERE status = 1 ORDER BY `order` ASC";
		$albums = $wpdb->get_results($query, ARRAY_A);
		foreach($albums as $key => $album)
		{
			$images = $gvrt->vrt_get_album_images($album['album_id']);
			$album_dir = vrt_get_album_url($album['album_id']);//VRT_PLUGIN_UPLOADS_URL . '/' . $album['album_id']."_".$album['name'];
			if ($images && !empty($images) && is_array($images)) {
				
				foreach($images as $key => $img)
				{
					if($img['status'] == 0 ) continue;
					
					$categories .= '<picture>';
					if (false === strpos($img['image'], '://')) {
						$categories .= ' <big>'.$album_dir."/big/".$img['image'].'</big>';
					}else{
						$categories .= ' <big>'.$img['image'].'</big>';
					}

					if (false === strpos($img['thumb'], '://')) {
						$categories .= ' <small>'.$album_dir."/thumb/".$img['thumb'].'</small>';
					}else{
						$categories .= ' <small>'.$img['thumb'].'</small>';
					}
					if ($ops['show_desc'] == 'yes') {
						$categories .= ' <detail><![CDATA[<font color="'.$ops['fontcolor'].'" size="'.$ops['fontsize'].'">'.$img['description'].'</font>]]></detail>';
					}else{
						$categories .= ' <detail><![CDATA[]]></detail>';
					}
					if($img['title']!=""){
						if ($ops['showimg_title'] == 'yes') {
							$categories .= '<tolltip><![CDATA[<font size="'.$ops['tooltip_font_size'].'" color="'.$ops['tooltip_font_color'].'">'.$img['title'].'</font>]]></tolltip>';
						}else{
							$categories .= '<tolltip><![CDATA[]]></tolltip>';
						}
					}else{
						$categories .= '<tolltip><![CDATA[]]></tolltip>';
					}
					$categories .= '	<link><![CDATA['.$img['link'].']]></link>';
					$categories .= '	<target>'.$ops['target'].'</target>';
					$categories .= '</picture> ';
				}
			}
		}
		//$xml_filename = "vrt_all.xml";
	}
	
	$xml_tpl = __get_vrt_xml_template();
	$settings = __get_vrt_xml_settings();
	$xml = str_replace(array('{settings}', '{categories}'), 
						array($settings, $categories), $xml_tpl);
	//write new xml file
	$fh = fopen(VRT_PLUGIN_XML_DIR . '/' . $xml_filename, 'w+');
	fwrite($fh, $xml);
	fclose($fh);
	//print "<h3>Generated filename: $xml_filename</h3>";
	//print $xml;
	if( file_exists(VRT_PLUGIN_XML_DIR . '/' . $xml_filename ) )
	{
		$fh = fopen(VRT_PLUGIN_XML_DIR . '/' . $xml_filename, 'r');
		$xml = fread($fh, filesize(VRT_PLUGIN_XML_DIR . '/' . $xml_filename));
		fclose($fh);
		//print "<h3>Getting xml file from cache: $xml_filename</h3>";
		$ret_str = "
		<script language=\"javascript\">AC_FL_RunContent = 0;</script>
<script src=\"".VRT_PLUGIN_URL."/js/AC_RunActiveContent.js\" language=\"javascript\"></script>

		<script language=\"javascript\"> 
	if (AC_FL_RunContent == 0) {
		alert(\"This page requires AC_RunActiveContent.js.\");
	} else {
		AC_FL_RunContent(
			'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0',
			'width', '".$ops['bannerWidth']."',
			'height', '".$ops['bannerHeight']."',
			'src', '".VRT_PLUGIN_URL."/js/wp_vertical',
			'quality', 'high',
			'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
			'align', 'middle',
			'play', 'true',
			'loop', 'true',
			'scale', 'showall',
			'wmode', '".$ops['wmode']."',
			'devicefont', 'false',
			'id', 'xmlswf_vmvrt',
			'bgcolor', '".$ops['backgroundColor']."',
			'name', 'xmlswf_vmvrt',
			'menu', 'true',
			'allowFullScreen', 'true',
			'allowScriptAccess','sameDomain',
			'movie', '".VRT_PLUGIN_URL."/js/wp_vertical',
			'salign', '',
			'flashVars','loadFile=".VRT_PLUGIN_URL."/xml/$xml_filename'
			); //end AC code
	}
</script>
";
//echo VRT_PLUGIN_UPLOADS_URL."<hr>";
//		print $xml;
		return $ret_str;
	}
	return true;
}
function __get_vrt_xml_template()
{
	$xml_tpl = '<?xml version="1.0" encoding="utf-8" ?>
<data>
<settings>
{settings}
</settings>
<imagegallery>
{categories}
</imagegallery>
</data>';
	return $xml_tpl;
}
?>