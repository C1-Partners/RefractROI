const { Component } = wp.element
const { InnerBlocks } = wp.blockEditor;

class Save extends Component {

    render() {

        let attributes = this.props.attributes;

        return (

            <section className="block-hp-hero">
                <picture>
                    <source media="(min-width: 768px)" srcSet={attributes.coverImage.url} />
                    <img src={attributes.coverImage.url} width="500" height="950" />
                </picture>
                <div className="hp-hero-content">
                    <h1 className="hero-title">{attributes.titleText}</h1>
                    <p className="hero-subtitle">{attributes.descriptionText}</p>
                    <div className="cta-buttons">
						<InnerBlocks.Content />
                    </div>
                </div>     
            </section>  
        )
    } 
}

export default Save