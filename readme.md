# Pico Typogrify Plugin

The typogrify plugin for [Pico](http://pico.dev7studios.com) prettifies text, prevents widows, and provides CSS hooks to style some special cases.

Here is [a demonstration](http://static.mintchaos.com/projects/typogrify/) of the original django plugin this is based on.

## Installation

1. Copy the pico-typogrify folder into the plugins folder of your Pico site.
2. Add the `typogrify` filter to any text in your site's theme.
3. Set configuration variables in your site's config.php if the defaults are not suitable.

## Setting up your theme

This plugin adds one new Twig filter. You can use it like this:

	{{ content | typogrify }}

or like this:
		
	{% filter typogrify %}
		<p>Some text here</p>	
	{% endfilter %}

## Configuration

You can configure the following options in your site's config.php:

*typogrify_amp*  
Wraps ampersands in html with `<span class="amp">` so they can be styled with CSS.  
**Default value: true**

*typogrify_widont*  
Replaces the space between the last two words in a string with `&nbsp;`. Works in these block tags `(h1-h6, p, li)`.  
**Default value: true**

*typogrify_SmartyPants*  
Translates plain ASCII punctuation characters into “smart” typographic punctuation HTML entities.  
**Default value: true**

*typogrify_caps*  
Wraps multiple capital letters in `<span class="caps">` so they can be styled with CSS.  
**Default value: true**

*typogrify_initial_quotes*  
Wraps initial quotes in `class="dquo"` for double quotes or `class="quo"` for single quotes. Works in these block tags `(h1-h6, p, li)`  
**Default value: true**

*typogrify_do_guillemets*  
Apply quote span tags to guillemets as well.  
**Default value: false**

*typogrify_dash*  
Puts a `&thinsp;` before and after an `&ndash;` or `&mdash;`  
**Default value: true**

These values are set in your site's config.php using the following format:

	$config['typogrify_amp'] = true;
	$config['typogrify_widont'] = false;

## Credits
- Typogrify was a Python project by Christian Metts, ported to PHP by Hamish Macpherson
- SmartyPants was a Perl project by John Gruber, ported to PHP by Michel Fortin
