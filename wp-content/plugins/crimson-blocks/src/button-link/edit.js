const { Component } = wp.element
const { InspectorControls } = wp.blockEditor;

import ButtonWithLink from '../components/buttonlink.js';

class Edit extends Component {
    
    render() {

        const { className, setAttributes } = this.props;
        const { buttonText, buttonUrl } = this.props.attributes;

        function updateAttribute(key, value) {
            setAttributes({
                [key]: value,
            });
        }

        return [
            <InspectorControls>
                <div style={{padding: '1em 0'}}>
                    Options
                </div>
            </InspectorControls>,
            <div className={className}>
                <ButtonWithLink
                    text={buttonText}
                    url={buttonUrl}
                    onButtonTextChange={val => updateAttribute('buttonText', val)}
                    onURLChange={val => updateAttribute('buttonUrl', val)}
                />
            </div>,
        ]; 
    }  
}

export default Edit