/**
 * WordPress
 */
const { __ } = wp.i18n
const { Component, Fragment } = wp.element
const { MediaUpload, RichText, InspectorControls, InnerBlocks } = wp.blockEditor
const { PanelBody, Button, SelectControl, ColorPicker } = wp.components


/**
 * Config
 */
import { name, ALLOWED_MEDIA_TYPES, attributes } from './settings'

/**
 * Block edit function
 */
class Edit extends Component {
  constructor({ attributes }) {
    super(...arguments)

    this.state = {
      coverImage: this.props.attributes.coverImage,
    }

    this.updateBackgroundImage = this.updateBackgroundImage.bind(this)
 
  }

  /**
   * Update Background Image
   */
  updateBackgroundImage(media) {
    const { setAttributes } = this.props

    const mediaObject = {
      id: media.id,
      url: media.url,
    }

    this.setState((state, props) => ({
      ...state,
      coverImage: mediaObject,
    }))
    setAttributes({ coverImage: mediaObject })

  }

  /**
   * Render
   */
  render() {
    const { attributes: { titleText, descriptionText, backgroundColor }, setAttributes } = this.props
    const { coverImage } = this.state

    return (
      <Fragment>
        {/**
         * Sidebar Controls
         */}
        <InspectorControls>
            <PanelBody>
                <ColorPicker
                    label='Background Color'
                    color={ attributes.backgroundColor }
                    onChangeComplete={(changes) => {
                    !changes ? setAttributes( {backgroundColor: null} ) : setAttributes( {backgroundColor: changes.hex} );
                    }}
                />
            </PanelBody>
        </InspectorControls>
        {/**
         * Markup
         */}
        <section data-block={name} className="test">
          <div className="block-cta-wrapper">
            <div className="block-cta-content">
              <RichText
                tagName="h1"
                value={titleText}
                placeholder={__('Add title', '@@pkg.textdomain')}
                onChange={value => setAttributes({ titleText: value })}
                className="block-hp-cta-content-title"
              />
              <RichText
                value={descriptionText}
                placeholder={__('Add description...', '@@pkg.textdomain')}
                onChange={value => setAttributes({ descriptionText: value })}
                className="block-cta-description"
              />
              <div className="cta-content-buttons">
                <InnerBlocks />
              </div>
            </div>  
            <img src={coverImage.url} />
            <div className="block-cta-cover">
              <MediaUpload
                onSelect={this.updateBackgroundImage}
                allowedTypes={ALLOWED_MEDIA_TYPES}
                value={coverImage.id}
                render={({ open }) => (
                  <Button
                    data-control="edit-button"
                    data-type="background"
                    data-posi="1"
                    label={
                      !coverImage.id
                        ? __('Change Background')
                        : __('Upload Background')
                    }
                    icon="format-image"
                    onClick={open}
                  />
                )}
              />
            </div>
          </div>
        </section>
      </Fragment>
    )
  }
}

export default Edit
