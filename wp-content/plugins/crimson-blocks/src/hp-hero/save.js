const { Component } = wp.element

class Save extends Component {

    

    render() {

        let attributes = this.props.attributes;

        console.log(attributes);
        return (

            <section className="block-hp-hero">
                <picture>
                    <source media="(min-width: 768px)" srcSet={attributes.coverImage.url} />
                    <img src={attributes.coverImage.url} />
                </picture>
                <div className="hp-hero-content">
                    <h1>{attributes.titleText}</h1>
                    <p>{attributes.descriptionText}</p>
                    <div>
                        
                        <a href={attributes.ctaButton1.url} className="test-1">{attributes.ctaButton1.text}</a>
                    </div>
                    <div>
                        <p className="test-2">{attributes.ctaButton2.text}</p>
                    </div>
                </div>     
            </section> 
        )
    } 
}

export default Save