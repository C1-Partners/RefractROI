const { Component } = wp.element;
const { InnerBlocks } = wp.blockEditor;

import { className } from './settings';

class Save extends Component {

    

    render() {

        let attributes = this.props.attributes;

        return (

            <section className={ className } style={{ backgroundColor: attributes.backgroundColor }}>
                <picture>
                    <source media="(min-width: 768px)" srcSet={attributes.coverImage.url} />
                    <img src={attributes.coverImage.url} />
                </picture>
                <div className="cta-content">
                    <h2>{attributes.titleText}</h2>
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