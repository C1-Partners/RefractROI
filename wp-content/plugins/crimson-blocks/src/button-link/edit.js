const { Component } = wp.element
const { InspectorControls } = wp.blockEditor;
const { SelectControl } = wp.components

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
                <div style={{padding: '1em'}}>
                    <SelectControl
                        label="Button Color"
                        options={[
                        { label: 'None', value: 'none' },
                        { label: 'Light gray', value: 'btn-light-gray' },
                        { label: 'Dark gray', value: 'btn-dark-gray' },
                        { label: 'Red', value: 'btn-red' },
                        ]}
                        onChange={value => setAttributes({ backgroundColor: value })}
                    />
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