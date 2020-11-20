const { Component } = wp.element

import ButtonWithLink from '../components/buttonlink.js';

class Save extends Component { 

    render() {  
     
        const { buttonText, buttonUrl } = this.props.attributes;

        return (
            <div>
                <a href={buttonUrl} class="btn btn--primary">
                    {buttonText}
                </a>
            </div>
        );
    }
    
}

export default Save