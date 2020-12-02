const { Component } = wp.element
const { InnerBlocks } = wp.blockEditor;

class Save extends Component {

    render() {

        let attributes = this.props.attributes;

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
        )
    } 
}

export default Save