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
    }
