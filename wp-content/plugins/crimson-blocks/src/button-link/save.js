const { Component } = wp.element

class Save extends Component { 

    render() {  
     
        const { buttonText, buttonUrl, backgroundColor } = this.props.attributes;

        return (
            <div>
                <a href={buttonUrl} className={`btn btn-primary ${backgroundColor}`}>
                    {buttonText}
                </a>
            </div>
        );
    }
    
}

export default Save