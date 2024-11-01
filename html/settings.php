<?php
global $wpdb, $gvrt;
$ops = get_option('vrt_settings', array());
//$ops = array_merge($vrt_settings, $ops);
?>
<div class="wrap">
	<h2><?php _e('Create XML File'); ?></h2>
	<form action="" method="post">
		<input type="hidden" name="task" value="save_vrt_settings" />
		<table>
				<tr>
			<td title="<?php _e('Width of object.'); ?>"><?php _e('Gallery Width (px)'); ?></td>
			<td><input type="text" name="settings[bannerWidth]"  value="<?php print @$ops['bannerWidth']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Height of object '); ?>"><?php _e('Gallery Height (px)'); ?></td>
			<td><input type="text" name="settings[bannerHeight]"  value="<?php print @$ops['bannerHeight']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Flash object background color. For example: #CCCCCC.'); ?>"><?php _e('Flash object background color'); ?></td>
			<td><input type="text" name="settings[backgroundColor]" class="color {hash:true,caps:false}" value="<?php print @$ops['backgroundColor']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Select the wmode of flash'); ?>"><?php _e('wmode'); ?></td>
			<td>
				<select name="settings[wmode]">
					<option value="opaque" <?php print (@$ops['wmode'] == 'opaque') ? 'selected' : ''; ?>><?php _e('opaque'); ?></option>
					<option value="transparent" <?php print (@$ops['wmode'] == 'transparent') ? 'selected' : ''; ?>><?php _e('transparent'); ?></option>
					<option value="window" <?php print (@$ops['wmode'] == 'window') ? 'selected' : ''; ?>><?php _e('window'); ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td title="<?php _e('Delay time for the slideshow'); ?>"><?php _e('Delay time'); ?></td>
			<td><input type="text" name="settings[delay]"  value="<?php print @$ops['delay']; ?>" /></td>
		</tr>   
		<tr>
			<td title="<?php _e('Background color for the slideshow'); ?>"><?php _e('BG Gradient color 1'); ?></td>
			<td><input type="text" name="settings[slideshow_bg_color]" class="color {hash:false,caps:false}" value="<?php print @$ops['slideshow_bg_color']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Background gradient color 2'); ?>"><?php _e('BG Gradient color 2'); ?></td>
			<td><input type="text" name="settings[bg_gradient_color_2]" class="color {hash:false,caps:false}" value="<?php print @$ops['bg_gradient_color_2']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Description bar background color'); ?>"><?php _e('Description BG color'); ?></td>
			<td><input type="text" name="settings[titlebar_bg_color]" class="color {hash:false,caps:false}" value="<?php print @$ops['titlebar_bg_color']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Image description background alpha'); ?>"><?php _e('Description alpha'); ?></td>
			<td>
				<select name="settings[descriptionBackgroundAlpha]">
					<option value="0" <?php print (@$ops['descriptionBackgroundAlpha'] == '0') ? 'selected' : ''; ?>><?php _e('0'); ?></option>
					<option value="0.1" <?php print (@$ops['descriptionBackgroundAlpha'] == '0.1') ? 'selected' : ''; ?>><?php _e('0.1'); ?></option>
					<option value="0.2" <?php print (@$ops['descriptionBackgroundAlpha'] == '0.2') ? 'selected' : ''; ?>><?php _e('0.2'); ?></option>
					<option value="0.3" <?php print (@$ops['descriptionBackgroundAlpha'] == '0.3') ? 'selected' : ''; ?>><?php _e('0.3'); ?></option>
					<option value="0.4" <?php print (@$ops['descriptionBackgroundAlpha'] == '0.4') ? 'selected' : ''; ?>><?php _e('0.4'); ?></option>
					<option value="0.5" <?php print (@$ops['descriptionBackgroundAlpha'] == '0.5') ? 'selected' : ''; ?>><?php _e('0.5'); ?></option>
					<option value="0.6" <?php print (@$ops['descriptionBackgroundAlpha'] == '0.6') ? 'selected' : ''; ?>><?php _e('0.6'); ?></option>
					<option value="0.7" <?php print (@$ops['descriptionBackgroundAlpha'] == '0.7') ? 'selected' : ''; ?>><?php _e('0.7'); ?></option>
					<option value="0.8" <?php print (@$ops['descriptionBackgroundAlpha'] == '0.8') ? 'selected' : ''; ?>><?php _e('0.8'); ?></option>
					<option value="0.9" <?php print (@$ops['descriptionBackgroundAlpha'] == '0.9') ? 'selected' : ''; ?>><?php _e('0.9'); ?></option>
					<option value="1" <?php print (@$ops['descriptionBackgroundAlpha'] == '1') ? 'selected' : ''; ?>><?php _e('1'); ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td title="<?php _e('Description font color'); ?>"><?php _e('Description color'); ?></td>
			<td><input type="text" name="settings[fontcolor]" class="color {hash:true,caps:false}" value="<?php print @$ops['fontcolor']; ?>" /></td>
		</tr>  
		<tr>
			<td title="<?php _e('Image descripiton font Size'); ?>"><?php _e('Descripiton font size'); ?></td>
			<td><input type="text" name="settings[fontsize]"  value="<?php print @$ops['fontsize']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Thumbnail width (try to keep it same as the thumbnail image width)'); ?>"><?php _e('Thumbnail width'); ?></td>
			<td><input type="text" name="settings[thumbnail_width]"  value="<?php print @$ops['thumbnail_width']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Thumbnail height (try to keep it same as the thumbnail image height)'); ?>"><?php _e('Thumbnail height'); ?></td>
			<td><input type="text" name="settings[thumbnail_height]"  value="<?php print @$ops['thumbnail_height']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Spacing between the thumbnail images'); ?>"><?php _e('Thumbnail spacing'); ?></td>
			<td><input type="text" name="settings[thumbnail_spacing]"  value="<?php print @$ops['thumbnail_spacing']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Thumbnail background color'); ?>"><?php _e('Thumbnail backgrount color'); ?></td>
			<td><input type="text" name="settings[thumbnail_bg_color]" class="color {hash:false,caps:false}" value="<?php print @$ops['thumbnail_bg_color']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Thumbnail  bar position - left or right'); ?>"><?php _e('Thumbnail bar position'); ?></td>
			<td>
				<input type="radio" name="settings[thumbnail_bar_position]" value="left" <?php print (@$ops['thumbnail_bar_position'] == 'left') ? 'checked' : ''; ?>><span><?php _e('Left'); ?></span>
				<input type="radio" name="settings[thumbnail_bar_position]" value="right" <?php print (@$ops['thumbnail_bar_position'] == 'right') ? 'checked' : ''; ?>><span><?php _e('Right'); ?></span>	
			</td>
		</tr>
		<tr>
			<td title="<?php _e('Tooltip font size'); ?>"><?php _e('Tooltip font size'); ?></td>
			<td><input type="text" name="settings[tooltip_font_size]"  value="<?php print @$ops['tooltip_font_size']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Tooltip transparency'); ?>"><?php _e('Tooltip alpha'); ?></td>
			<td>
				<select name="settings[tooltipAlpha]">
					<option value="0" <?php print (@$ops['tooltipAlpha'] == '0') ? 'selected' : ''; ?>><?php _e('0'); ?></option>
					<option value="0.1" <?php print (@$ops['tooltipAlpha'] == '0.1') ? 'selected' : ''; ?>><?php _e('0.1'); ?></option>
					<option value="0.2" <?php print (@$ops['tooltipAlpha'] == '0.2') ? 'selected' : ''; ?>><?php _e('0.2'); ?></option>
					<option value="0.3" <?php print (@$ops['tooltipAlpha'] == '0.3') ? 'selected' : ''; ?>><?php _e('0.3'); ?></option>
					<option value="0.4" <?php print (@$ops['tooltipAlpha'] == '0.4') ? 'selected' : ''; ?>><?php _e('0.4'); ?></option>
					<option value="0.5" <?php print (@$ops['tooltipAlpha'] == '0.5') ? 'selected' : ''; ?>><?php _e('0.5'); ?></option>
					<option value="0.6" <?php print (@$ops['tooltipAlpha'] == '0.6') ? 'selected' : ''; ?>><?php _e('0.6'); ?></option>
					<option value="0.7" <?php print (@$ops['tooltipAlpha'] == '0.7') ? 'selected' : ''; ?>><?php _e('0.7'); ?></option>
					<option value="0.8" <?php print (@$ops['tooltipAlpha'] == '0.8') ? 'selected' : ''; ?>><?php _e('0.8'); ?></option>
					<option value="0.9" <?php print (@$ops['tooltipAlpha'] == '0.9') ? 'selected' : ''; ?>><?php _e('0.9'); ?></option>
					<option value="1" <?php print (@$ops['tooltipAlpha'] == '1') ? 'selected' : ''; ?>><?php _e('1'); ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td title="<?php _e('Tooltip font color'); ?>"><?php _e('Tooltip font color'); ?></td>
			<td><input type="text" name="settings[tooltip_font_color]" class="color {hash:true,caps:false}" value="<?php print @$ops['tooltip_font_color']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Tooltip background color'); ?>"><?php _e('Tooltip backgrount color'); ?></td>
			<td><input type="text" name="settings[tooltip_bg_color]" class="color {hash:false,caps:false}" value="<?php print @$ops['tooltip_bg_color']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Enable/Disable full screen'); ?>"><?php _e('Full Screen'); ?></td>
			<td>
				<input type="radio" name="settings[fullscreen]" value="on" <?php print (@$ops['fullscreen'] == 'on') ? 'checked' : ''; ?>><span><?php _e('Enable'); ?></span>
				<input type="radio" name="settings[fullscreen]" value="off" <?php print (@$ops['fullscreen'] == 'off') ? 'checked' : ''; ?>><span><?php _e('Disable'); ?></span>
			</td>
		</tr>	
		<tr>
			<td title="<?php _e('Background gradient color'); ?>"><?php _e('BG gradient color'); ?></td>
			<td><input type="text" name="settings[bg_gradient_color_1]" class="color {hash:false,caps:false}" value="<?php print @$ops['bg_gradient_color_1']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Background gradient angle'); ?>"><?php _e('BG gradient angle'); ?></td>
			<td><input type="text" name="settings[bg_gradient_angle]"  value="<?php print @$ops['bg_gradient_angle']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Gradient fill type'); ?>"><?php _e(' Gradient fill type'); ?></td>
			<td>
				<input type="radio" name="settings[gradient_filltype]" value="radial" <?php print (@$ops['gradient_filltype'] == 'radial') ? 'checked' : ''; ?>><span><?php _e('radial'); ?></span>
				<input type="radio" name="settings[gradient_filltype]" value="linear" <?php print (@$ops['gradient_filltype'] == 'linear') ? 'checked' : ''; ?>><span><?php _e('linear'); ?></span>	
			</td>
		</tr>
		<tr>
			<td title="<?php _e('Gradient enable'); ?>"><?php _e('Gradient enable'); ?></td>
			<td>
				<input type="radio" name="settings[gradient_enable]" value="1" <?php print (@$ops['gradient_enable'] == '1') ? 'checked' : ''; ?>><span><?php _e('yes'); ?></span>
				<input type="radio" name="settings[gradient_enable]" value="0" <?php print (@$ops['gradient_enable'] == '0') ? 'checked' : ''; ?>><span><?php _e('no'); ?></span>
			</td>
		</tr>	
		<tr>
			<td title="<?php _e('Active Thumb Color'); ?>"><?php _e('Active Thumb Color'); ?></td>
			<td><input type="text" name="settings[thumb_highlight_color]" class="color {hash:false,caps:false}" value="<?php print @$ops['thumb_highlight_color']; ?>" /></td>
		</tr>	
		<tr>
			<td title="<?php _e('Thumbnail highlight marker alpha'); ?>"><?php _e('Thumb marker alpha'); ?></td>
			<td>
				<select name="settings[thumb_marker_alpha]">
					<option value="0" <?php print (@$ops['thumb_marker_alpha'] == '0') ? 'selected' : ''; ?>><?php _e('0'); ?></option>
					<option value="0.1" <?php print (@$ops['thumb_marker_alpha'] == '0.1') ? 'selected' : ''; ?>><?php _e('0.1'); ?></option>
					<option value="0.2" <?php print (@$ops['thumb_marker_alpha'] == '0.2') ? 'selected' : ''; ?>><?php _e('0.2'); ?></option>
					<option value="0.3" <?php print (@$ops['thumb_marker_alpha'] == '0.3') ? 'selected' : ''; ?>><?php _e('0.3'); ?></option>
					<option value="0.4" <?php print (@$ops['thumb_marker_alpha'] == '0.4') ? 'selected' : ''; ?>><?php _e('0.4'); ?></option>
					<option value="0.5" <?php print (@$ops['thumb_marker_alpha'] == '0.5') ? 'selected' : ''; ?>><?php _e('0.5'); ?></option>
					<option value="0.6" <?php print (@$ops['thumb_marker_alpha'] == '0.6') ? 'selected' : ''; ?>><?php _e('0.6'); ?></option>
					<option value="0.7" <?php print (@$ops['thumb_marker_alpha'] == '0.7') ? 'selected' : ''; ?>><?php _e('0.7'); ?></option>
					<option value="0.8" <?php print (@$ops['thumb_marker_alpha'] == '0.8') ? 'selected' : ''; ?>><?php _e('0.8'); ?></option>
					<option value="0.9" <?php print (@$ops['thumb_marker_alpha'] == '0.9') ? 'selected' : ''; ?>><?php _e('0.9'); ?></option>
					<option value="1" <?php print (@$ops['thumb_marker_alpha'] == '1') ? 'selected' : ''; ?>><?php _e('1'); ?></option>
				</select>
			</td>
		</tr>	
		<tr>
			<td title="<?php _e('Thumbnail highlight marker thickness'); ?>"><?php _e('Thumb marker thickness'); ?></td>
			<td>
				<select name="settings[marker_thickness]">
					<option value="0" <?php print (@$ops['marker_thickness'] == '0') ? 'selected' : ''; ?>><?php _e('0'); ?></option>
					<option value="1" <?php print (@$ops['marker_thickness'] == '1') ? 'selected' : ''; ?>><?php _e('1'); ?></option>
					<option value="2" <?php print (@$ops['marker_thickness'] == '2') ? 'selected' : ''; ?>><?php _e('2'); ?></option>
					<option value="3" <?php print (@$ops['marker_thickness'] == '3') ? 'selected' : ''; ?>><?php _e('3'); ?></option>
					<option value="4" <?php print (@$ops['marker_thickness'] == '4') ? 'selected' : ''; ?>><?php _e('4'); ?></option>
					<option value="5" <?php print (@$ops['marker_thickness'] == '5') ? 'selected' : ''; ?>><?php _e('5'); ?></option>
					<option value="6" <?php print (@$ops['marker_thickness'] == '6') ? 'selected' : ''; ?>><?php _e('6'); ?></option>
					<option value="7" <?php print (@$ops['marker_thickness'] == '7') ? 'selected' : ''; ?>><?php _e('7'); ?></option>
					<option value="8" <?php print (@$ops['marker_thickness'] == '8') ? 'selected' : ''; ?>><?php _e('8'); ?></option>
					<option value="9" <?php print (@$ops['marker_thickness'] == '9') ? 'selected' : ''; ?>><?php _e('9'); ?></option>
					<option value="10" <?php print (@$ops['marker_thickness'] == '10') ? 'selected' : ''; ?>><?php _e('10'); ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td title="<?php _e('Thumb highlight marker type. Choose box or line.'); ?>"><?php _e('Thumb marker type'); ?></td>
			<td>
				<input type="radio" name="settings[marker_type]" value="line" <?php print (@$ops['marker_type'] == 'line') ? 'checked' : ''; ?>><span><?php _e('line'); ?></span>
				<input type="radio" name="settings[marker_type]" value="box" <?php print (@$ops['marker_type'] == 'box') ? 'checked' : ''; ?>><span><?php _e('box'); ?></span>
			</td>
		</tr>	
		<tr>
			<td title="<?php _e('Set thumb scrolling speed in milli seconds.'); ?>"><?php _e('Thumb Scroll Speed'); ?></td>
			<td><input type="text" name="settings[thumb_scroll_speed]"  value="<?php print @$ops['thumb_scroll_speed']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('1 = noScale, 0 = Scale (for scaling/not scaling the images)'); ?>"><?php _e('Image Scale'); ?></td>
			<td>
				<input type="radio" name="settings[image_Scale]" value="0" <?php print (@$ops['image_Scale'] == '0') ? 'checked' : ''; ?>><span><?php _e('No'); ?></span>
				<input type="radio" name="settings[image_Scale]" value="1" <?php print (@$ops['image_Scale'] == '1') ? 'checked' : ''; ?>><span><?php _e('Yes'); ?></span>
			</td>
		</tr>
		<tr>
			<td title="<?php _e('Scale thumbs if they are bigger'); ?>"><?php _e('Thumbnail scale'); ?></td>
			<td>
				<input type="radio" name="settings[thumbnail_Scale]" value="0" <?php print (@$ops['thumbnail_Scale'] == '0') ? 'checked' : ''; ?>><span><?php _e('No'); ?></span>
				<input type="radio" name="settings[thumbnail_Scale]" value="1" <?php print (@$ops['thumbnail_Scale'] == '1') ? 'checked' : ''; ?>><span><?php _e('Yes'); ?></span>
			</td>
		</tr>
		<tr>
			<td title="<?php _e('Show/Hide Image Titles On Thumbnails'); ?>"><?php _e('Show Image Titles'); ?></td>
			<td>
				<input type="radio" name="settings[showimg_title]" value="yes" <?php print (@$ops['showimg_title'] == 'yes') ? 'checked' : ''; ?>><span><?php _e('Yes'); ?></span>
				<input type="radio" name="settings[showimg_title]" value="no" <?php print (@$ops['showimg_title'] == 'no') ? 'checked' : ''; ?>><span><?php _e('No'); ?></span>
			</td>
		</tr>
		<tr>
			<td title="<?php _e('Show/Hide Description'); ?>"><?php _e('Show Description'); ?></td>
			<td>
				<input type="radio" name="settings[show_desc]" value="yes" <?php print (@$ops['show_desc'] == 'yes') ? 'checked' : ''; ?>><span><?php _e('Yes'); ?></span>
				<input type="radio" name="settings[show_desc]" value="no" <?php print (@$ops['show_desc'] == 'no') ? 'checked' : ''; ?>><span><?php _e('No'); ?></span>
			</td>
		</tr>
		<tr>
			<td title="<?php _e('Image links enable / disable'); ?>"><?php _e('Image Links'); ?></td>
			<td>
				<input type="radio" name="settings[imglink_enable]" value="0" <?php print (@$ops['imglink_enable'] == '0') ? 'checked' : ''; ?>><span><?php _e('Disable'); ?></span>
				<input type="radio" name="settings[imglink_enable]" value="1" <?php print (@$ops['imglink_enable'] == '1') ? 'checked' : ''; ?>><span><?php _e('Enable'); ?></span>
			</td>
		</tr>
		<tr>
			<td title="<?php _e('Where do you load the target url when user clicks on the link'); ?>"><?php _e('Target Link'); ?></td>
			<td>
				<select name="settings[target]">
					<option value="_blank" <?php print (@$ops['target'] == '_blank') ? 'selected' : ''; ?>><?php _e('New Window'); ?></option>
					<option value="_self" <?php print (@$ops['target'] == '_self') ? 'selected' : ''; ?>><?php _e('Same Window'); ?></option>
				</select>
			</td>
		</tr>
		</table>
	<p><button type="submit" class="button-primary"><?php _e('Save Config'); ?></button></p>
	</form>
</div>