
const { RichText, URLInputButton } = wp.blockEditor;

const ButtonWithLink = (props) => {

    return (
        <div>
            <RichText
                className="btn btn--primary"
                value={props.text}
                placeholder="Place your button text here!"
                onChange={props.onButtonTextChange}
            />
            <URLInputButton
                url={props.url}
                onChange={props.onURLChange}
            />
        </div>
    )
}

export default ButtonWithLink;