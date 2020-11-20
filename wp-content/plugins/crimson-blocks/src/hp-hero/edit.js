/**
 * WordPress
 */
const { __ } = wp.i18n
const { Component, Fragment } = wp.element
const { MediaUpload, RichText, InspectorControls, InnerBlocks } = wp.blockEditor
const { PanelBody, Button, TextControl, SelectControl } = wp.components


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
          <SelectControl
            label="Background"
            value={backgroundColor}
            options={[
              { label: 'None', value: 'none' },
              { label: 'Light gray', value: 'light-gray' },
            ]}
            onChange={value => setAttributes({ backgroundColor: value })}
          />
        </InspectorControls>
        {/**
         * Markup
         */}
        <section data-block={name} className="test">
          <div className="block-hp-hero-wrapper">
            <div className="block-hp-hero-content">
              <RichText
                tagName="h1"
                value={titleText}
                placeholder={__('Add title', '@@pkg.textdomain')}
                onChange={value => setAttributes({ titleText: value })}
                className="block-hp-hero-content-title"
              />
              <RichText
                value={descriptionText}
                placeholder={__('Add description...', '@@pkg.textdomain')}
                onChange={value => setAttributes({ descriptionText: value })}
                className="block-hp-hero-description"
              />
              <div className="hero-content-buttons">
                <InnerBlocks />
              </div>
            </div>  
            <img src={coverImage.url} />
            <div className="block-hp-hero-cover">
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
