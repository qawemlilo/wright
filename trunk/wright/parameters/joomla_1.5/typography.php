<?php // $Id$
defined('_JEXEC') or die('Restricted access');

class JElementTypography extends JElement
{
	var	$_name = 'Typography';

	function fetchElement($name, $value, &$node, $control_name)
	{
		$doc = JFactory::getDocument();
		$template = $_GET['cid'][0];
		$doc->addScript(str_replace('/administrator/', '/', JURI::base()).'templates/'.$template.'/wright/parameters/assets/typography/typography.js');

		$class = ( $node->attributes('class') ? 'class="'.$node->attributes('class').'"' : 'class="inputbox"' );

		$stacks = array(	'Default' => 'Template default',
							'Arial' => 'sans-serif',
							'Baskerville' => 'serif',
							'Cambria' => 'serif',
							'Century Gothic' => 'sans-serif',
							'Consolas' => 'monospace',
							'Copperplate Light'  => 'serif',
							'Courier New' => 'monospace',
							'Franklin Gothic' => 'sans-serif',
							'Futura' => 'sans-serif',
							'Garamond' => 'serif',
							'Geneva' => 'sans-serif',
							'Georgia' => 'serif',
							'Gill Sans' => 'sans-serif',
							'Helvetica' => 'sans-serif',
							'Impact' => 'sans-serif',
							'Lucida Sans' => 'sans-serif',
							'Palatino' => 'serif',
							'Tahoma' => 'sans-serif',
							'Times' => 'serif',
							'Trebuchet MS' => 'sans-serif',
							'Verdana' => 'sans-serif',
							'Google Fonts' => 'various'
				);
		
		$options = array ();
		foreach ($stacks as $stack => $style)
		{
			$val	= strtolower(str_replace(' ', '', $stack));
			$text	= $stack . ' - ' . ucfirst($style);
			$options[] = JHTML::_('select.option', $val, JText::_($text));
		}

		return JHTML::_('select.genericlist',  $options, ''.$control_name.'['.$name.']', $class, 'value', 'text', $value, $control_name.$name);
	}
}