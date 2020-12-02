/**
 * Attributes
 */

export default

    {
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
			default: 'Add a CTA heading here...'
		},
		descriptionText: {
			type: 'string',
			default: 'Add CTA description here...'
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
			default: 'rgba(255,255,255,0)'
		},
    }
