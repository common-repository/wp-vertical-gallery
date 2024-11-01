=== Vertical SlideShow ===

Contributors: wpslideshow.com
Author URI: http://wpslideshow.com/vertical-gallery/
Tags: vertical slideshow, slideshow, slider, image slider, gallery, wp gallery, free slider, free slideshow, free gallery
Requires at least: 3.0
Tested up to: 3.4.1
Stable tag: Trunk

To diplsay the slider, use [vertical] snippet in your content. Vertical slideshow is free wordpress slider addon that allows to create categories and upload images under the categories.

== Description ==

To diplsay the slider, use [vertical] snippet in your content. Vertical slideshow is free wordpress slider addon that allows to create categories and upload images under the categories.


**Features**

* Customizable gallery width and gallery height
* Customizable image height and width
* Image description
* Customizable font sizes and colors
* Customizable auto play time
* Full screen enable/disable
* Thumbnail bar position (left/right)
* Play/Pause, next,previous images 

For working demo : http://wpslideshow.com/vertical-gallery

Installation Video: http://www.youtube.com/watch?feature=player_embedded&v=JdpMLgZVYNM



== Installation ==

1. Install automatically through the "Plugins", "Add New" menu in WordPress, or upload the <code>vertical</code> folder to the <code>/wp-content/plugins/</code> directory. 

2. Click on "Activate Plugin" to Activate the plugin or Activate the plugin by click on `Plugins` menu and click on activate link below plugin name.

3. You can find "Vertical Slideshow" link  on left side menu. Go to album management under Vertical slideshow and create categories and upload images into those catetegories. 

= short codes for content =

* <code>[vertical]</code> - Use this short code in the content / post to display all images under all categories which are not disabled.

* <code>[vertical cats=2,3]</code> - Use this short code in the content / post to display all images under the categories with ID's 2,3.

* <code>[vertical imgs=1,2,3]</code> - Use this short code in the content / post to display images which has ID's 1,2,3.

= short codes for template =

* <code><?php echo do_shortcode('[vertical]');?></code> - Use this short code in the template (php file) to display all images under all categories which are not disabled.

* <code><?php echo do_shortcode('[vertical cats=2,3]');?></code> - Use this short code in the template (php file) to display all images under the categories with ID's 2,3.

* <code><?php echo do_shortcode('[vertical imgs=1,2,3]');?></code> - Use this short code in the template (php file) to display images which has ID's 1,2,3.

= Installation Video =

For working demo : http://wpslideshow.com/vertical-gallery

Installation Video: http://www.youtube.com/watch?feature=player_embedded&v=JdpMLgZVYNM


* Still if you have problems in using this plugin please open a support ticket at http://support.xmlswf.com

== Screenshots ==

1. screenshot-1.jpg - Slideshow front end. 

2. screenshot-2.gif - Add new album / category.

3. screenshot-3.gif - Edit image.

4. screenshot-4.png - bulk upload.

5. screenshot-5.gif - edit album / category.

6. screenshot-6.gif - short code to be placed in the content.


== Changelog ==

= 2.0=

We rebuilt it in a way to support categoris and bulk images. It is not possible to upgrade to new version, you just need to uninstall old one an install new one.

= 2.1=

Where ever you place the short code, there only the slider shows. Previously it use to show on top of content.

=2.2=

Fixed seciruty bugs