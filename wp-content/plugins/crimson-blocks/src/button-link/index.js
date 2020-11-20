/**
 * WordPress dependencies
 */
const { registerBlockType } = wp.blocks;

/**
 * Internal dependencies
 */
import './styles/style.scss';
import './styles/editor.scss';
import attributes from './attributes';
import Edit from './edit';
import Save from './save';
import { name, title, icon, category, keywords } from './settings';

/**
 * Register our Block
 */
registerBlockType( name, {
	title: title,
	icon: icon,
	keywords: keywords,
	category: category,
	attributes: attributes,
	
	/**
	 * Edit
	 */
	edit: Edit,

	/**
	 * Save
	 */
	save: Save,
	
} );

