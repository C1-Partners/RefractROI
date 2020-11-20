/**
 * WordPress dependencies
 */
const { registerBlockType } = wp.blocks;
const { InnerBlocks } = wp.blockEditor;
/**
 * Internal dependencies
 */
import './styles/style.scss';
import './styles/editor.scss';
import Edit from './edit';
import Save from './save';
import { name, title, icon, category, keywords } from './settings';

/**
 * Register
 */
registerBlockType( name, {
	title: title,
	icon: icon,
	keywords: keywords,
	category: category,
	attributes: {
		addTopMargin: {
			type: 'boolean',
			default: true
		},
		addBottomMargin: {
			type: 'boolean',
			default: true
		},
		align: {
			type: 'string',
			default: 'full'
		},
		/**
		* Content
		*/
		titleText: {
			type: 'string',
			default: 'Add a heading here...'
		},
		descriptionText: {
			type: 'string',
			default: 'Add a description here...'
		},
		coverImage: {
			type: 'src',
			default: {
				id: '',
				url: '',
			},
		},
		backgroundColor: {
			type: 'string',
			default: 'none'
		},
	},
	

	/**
	 * Edit
	 */
	edit: Edit,

	/**
	 * Save
	 */
	save({ attributes }) {
		return (

            <section className="block-hp-hero">
                <picture>
                    <source media="(min-width: 768px)" srcSet={attributes.coverImage.url} />
                    <img src={attributes.coverImage.url} />
                </picture>
                <div className="hp-hero-content">
                    <h1>{attributes.titleText}</h1>
                    <p>{attributes.descriptionText}</p>
                    <div className="cta-buttons">
						<InnerBlocks.Content />
                    </div>
                </div>     
            </section> 
        );
	}
	
} );

