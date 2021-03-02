!function(e){function t(r){if(n[r])return n[r].exports;var o=n[r]={i:r,l:!1,exports:{}};return e[r].call(o.exports,o,o.exports,t),o.l=!0,o.exports}var n={};t.m=e,t.c=n,t.d=function(e,n,r){t.o(e,n)||Object.defineProperty(e,n,{configurable:!1,enumerable:!0,get:r})},t.n=function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(n,"a",n),n},t.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},t.p="",t(t.s=2)}([function(e,t,n){"use strict";n.d(t,"g",function(){return r}),n.d(t,"d",function(){return o}),n.d(t,"h",function(){return a}),n.d(t,"e",function(){return l}),n.d(t,"c",function(){return c}),n.d(t,"f",function(){return i}),n.d(t,"a",function(){return u}),n.d(t,"b",function(){return s});var __=wp.i18n.__,r="cgb/call-to-action",o="block-cta",a=__("Call to Action","@@pkg.textdomain"),l="admin-generic",c="design",i=["call to action","link","cta"],u=["image","svg"],s={}},function(e,t,n){"use strict";n.d(t,"e",function(){return r}),n.d(t,"f",function(){return o}),n.d(t,"c",function(){return a}),n.d(t,"b",function(){return l}),n.d(t,"d",function(){return c}),n.d(t,"a",function(){return i});var __=wp.i18n.__,r="cgb/hp-hero",o=__("Home Page Hero","@@pkg.textdomain"),a="admin-generic",l="crimson",c=["homepage","hero","v2"],i=["image","svg"]},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});n(3),n(11),n(13),n(19)},function(e,t,n){"use strict";var r=n(4),o=(n.n(r),n(5)),a=(n.n(o),n(6)),l=n(7),c=n(9),i=n(10);(0,wp.blocks.registerBlockType)(i.d,{title:i.e,icon:i.b,keywords:i.c,category:i.a,attributes:a.a,edit:l.a,save:c.a})},function(e,t){},function(e,t){},function(e,t,n){"use strict";t.a={buttonText:{type:"string"},buttonUrl:{url:"string"},backgroundColor:{type:"string"}}},function(e,t,n){"use strict";function r(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}function o(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function a(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!==typeof t&&"function"!==typeof t?e:t}function l(e,t){if("function"!==typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}var c=n(8),i=function(){function e(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}return function(t,n,r){return n&&e(t.prototype,n),r&&e(t,r),t}}(),u=wp.element.Component,s=wp.blockEditor.InspectorControls,p=wp.components.SelectControl,m=function(e){function t(){return o(this,t),a(this,(t.__proto__||Object.getPrototypeOf(t)).apply(this,arguments))}return l(t,e),i(t,[{key:"render",value:function(){function e(e,t){o(r({},e,t))}var t=this.props,n=t.className,o=t.setAttributes,a=this.props.attributes,l=a.buttonText,i=a.buttonUrl;return[wp.element.createElement(s,null,wp.element.createElement("div",{style:{padding:"1em"}},wp.element.createElement(p,{label:"Button Color",options:[{label:"None",value:"none"},{label:"Light gray",value:"btn-light-gray"},{label:"Dark gray",value:"btn-dark-gray"},{label:"Red",value:"btn-red"}],onChange:function(e){return o({backgroundColor:e})}}))),wp.element.createElement("div",{className:n},wp.element.createElement(c.a,{text:l,url:i,onButtonTextChange:function(t){return e("buttonText",t)},onURLChange:function(t){return e("buttonUrl",t)}}))]}}]),t}(u);t.a=m},function(e,t,n){"use strict";var r=wp.blockEditor,o=r.RichText,a=r.URLInputButton,l=function(e){return wp.element.createElement("div",null,wp.element.createElement(o,{className:"btn btn--primary",value:e.text,placeholder:"Place your button text here!",onChange:e.onButtonTextChange}),wp.element.createElement(a,{url:e.url,onChange:e.onURLChange}))};t.a=l},function(e,t,n){"use strict";function r(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function o(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!==typeof t&&"function"!==typeof t?e:t}function a(e,t){if("function"!==typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}var l=function(){function e(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}return function(t,n,r){return n&&e(t.prototype,n),r&&e(t,r),t}}(),c=wp.element.Component,i=function(e){function t(){return r(this,t),o(this,(t.__proto__||Object.getPrototypeOf(t)).apply(this,arguments))}return a(t,e),l(t,[{key:"render",value:function(){var e=this.props.attributes,t=e.buttonText,n=e.buttonUrl,r=e.backgroundColor;return wp.element.createElement("div",null,wp.element.createElement("a",{href:n,className:"btn btn-primary "+r},t))}}]),t}(c);t.a=i},function(e,t,n){"use strict";n.d(t,"d",function(){return r}),n.d(t,"e",function(){return o}),n.d(t,"b",function(){return a}),n.d(t,"a",function(){return l}),n.d(t,"c",function(){return c});var __=wp.i18n.__,r="cgb/button-link",o=__("Button with Link","@@pkg.textdomain"),a="admin-generic",l="design",c=["button","link","cta"]},function(e,t,n){"use strict";var r=n(12),__=wp.i18n.__,o=wp.blocks.registerBlockType,a=wp.editor,l=a.InnerBlocks,c=a.InspectorControls,i=a.MediaUpload,u=wp.components,s=u.PanelBody,p=u.TextControl,m=u.ColorPicker;o("cgb/wrapper-block",{title:__("Wrapper"),description:__("A block for containing other blocks"),icon:"editor-code",category:"formatting",attributes:{blockId:{type:"string",default:null},backgroundImage:{type:"string",default:null},backgroundImageStyle:{type:"string",default:null},backgroundColor:{type:"string",default:"rgba(255,255,255,0)"}},keywords:[__("container"),__("wrapper"),__("section")],edit:function(e){var t=e.setAttributes;return[wp.element.createElement(c,null,wp.element.createElement(s,null,wp.element.createElement(i,{label:"Background Image",onSelect:function(e){t({backgroundImage:e.sizes.full.url}),t({backgroundImageStyle:"url("+e.sizes.full.url+")"})},type:"image",value:e.attributes.backgroundImage,render:function(t){var n=t.open;return Object(r.a)(n,e)}}),wp.element.createElement(m,{label:"Background Color",color:e.attributes.backgroundColor,onChangeComplete:function(t){t?e.setAttributes({backgroundColor:t.hex}):e.setAttributes({backgroundColor:null})}}),wp.element.createElement(p,{label:"Block ID",help:__("A unique HTML ID for this block. Make sure to use all lower case and dashes instead of spaces"),placeholder:"my-id",value:e.attributes.blockId,onChange:function(e){t(e?{blockId:e}:{blockId:null})}}))),wp.element.createElement("div",{className:"block-wrap"},wp.element.createElement("div",{className:"block-title"},"Wrapper"),wp.element.createElement("div",{className:e.className,id:e.attributes.blockId,style:{backgroundImage:e.attributes.backgroundImageStyle}},wp.element.createElement("div",{className:"wrapper-inner"},wp.element.createElement(l,null))))]},save:function(e){return wp.element.createElement("div",{className:e.className,id:e.attributes.blockId,style:{backgroundColor:e.attributes.backgroundColor,backgroundImage:e.attributes.backgroundImageStyle}},wp.element.createElement(l.Content,null))}})},function(e,t,n){"use strict";function r(e,t){return t.attributes.backgroundImage?wp.element.createElement("div",{className:"image-container"},wp.element.createElement("img",{src:t.attributes.backgroundImage,onClick:e,className:"image"}),wp.element.createElement(o,{onClick:function(){t.setAttributes({backgroundImage:null}),t.setAttributes({backgroundImageStyle:null})},isLink:!0,isDestructive:!0,style:{marginTop:"15px",marginBottom:"15px"}},"Remove Image")):wp.element.createElement("div",{className:"button-container"},wp.element.createElement(o,{onClick:e,isPrimary:!0,style:{width:"100%",justifyContent:"center",marginTop:"15px",marginBottom:"15px"}},"Select an Image"))}n.d(t,"a",function(){return r});var o=wp.components.Button},function(e,t,n){"use strict";var r=n(14),o=(n.n(r),n(15)),a=(n.n(o),n(16)),l=n(17),c=n(18),i=n(1),u=wp.blocks.registerBlockType;wp.blockEditor.InnerBlocks;u(i.e,{title:i.f,icon:i.c,keywords:i.d,category:i.b,attributes:a.a,edit:l.a,save:c.a})},function(e,t){},function(e,t){},function(e,t,n){"use strict";t.a={addTopMargin:{type:"boolean",default:!0},addBottomMargin:{type:"boolean",default:!0},align:{type:"string",default:"full"},titleText:{type:"string",default:"Add a heading here..."},descriptionText:{type:"string",default:"Add a description here..."},coverImage:{type:"src",default:{id:"",url:""}},backgroundColor:{type:"string",default:"none"}}},function(e,t,n){"use strict";function r(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function o(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!==typeof t&&"function"!==typeof t?e:t}function a(e,t){if("function"!==typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}var l=n(1),c=function(){function e(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}return function(t,n,r){return n&&e(t.prototype,n),r&&e(t,r),t}}(),__=wp.i18n.__,i=wp.element,u=i.Component,s=i.Fragment,p=wp.blockEditor,m=p.MediaUpload,d=p.RichText,f=p.InspectorControls,b=p.InnerBlocks,g=wp.components,w=(g.PanelBody,g.Button),y=(g.TextControl,g.SelectControl),h=function(e){function t(e){e.attributes;r(this,t);var n=o(this,(t.__proto__||Object.getPrototypeOf(t)).apply(this,arguments));return n.state={coverImage:n.props.attributes.coverImage},n.updateBackgroundImage=n.updateBackgroundImage.bind(n),n}return a(t,e),c(t,[{key:"updateBackgroundImage",value:function(e){var t=this.props.setAttributes,n={id:e.id,url:e.url};this.setState(function(e,t){return Object.assign({},e,{coverImage:n})}),t({coverImage:n})}},{key:"render",value:function(){var e=this.props,t=e.attributes,n=t.titleText,r=t.descriptionText,o=t.backgroundColor,a=e.setAttributes,c=this.state.coverImage;return wp.element.createElement(s,null,wp.element.createElement(f,null,wp.element.createElement(y,{label:"Background",value:o,options:[{label:"None",value:"none"},{label:"Light gray",value:"light-gray"}],onChange:function(e){return a({backgroundColor:e})}})),wp.element.createElement("section",{"data-block":l.e,className:"test"},wp.element.createElement("div",{className:"block-hp-hero-wrapper"},wp.element.createElement("div",{className:"block-hp-hero-content"},wp.element.createElement(d,{tagName:"h1",value:n,placeholder:__("Add title","@@pkg.textdomain"),onChange:function(e){return a({titleText:e})},className:"block-hp-hero-content-title"}),wp.element.createElement(d,{value:r,placeholder:__("Add description...","@@pkg.textdomain"),onChange:function(e){return a({descriptionText:e})},className:"block-hp-hero-description"}),wp.element.createElement("div",{className:"hero-content-buttons"},wp.element.createElement(b,null))),wp.element.createElement("img",{src:c.url}),wp.element.createElement("div",{className:"block-hp-hero-cover"},wp.element.createElement(m,{onSelect:this.updateBackgroundImage,allowedTypes:l.a,value:c.id,render:function(e){var t=e.open;return wp.element.createElement(w,{"data-control":"edit-button","data-type":"background","data-posi":"1",label:__(c.id?"Upload Background":"Change Background"),icon:"format-image",onClick:t})}})))))}}]),t}(u);t.a=h},function(e,t,n){"use strict";function r(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function o(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!==typeof t&&"function"!==typeof t?e:t}function a(e,t){if("function"!==typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}var l=function(){function e(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}return function(t,n,r){return n&&e(t.prototype,n),r&&e(t,r),t}}(),c=wp.element.Component,i=wp.blockEditor.InnerBlocks,u=function(e){function t(){return r(this,t),o(this,(t.__proto__||Object.getPrototypeOf(t)).apply(this,arguments))}return a(t,e),l(t,[{key:"render",value:function(){var e=this.props.attributes;return wp.element.createElement("section",{className:"block-hp-hero"},wp.element.createElement("picture",null,wp.element.createElement("source",{media:"(min-width: 768px)",srcSet:e.coverImage.url}),wp.element.createElement("img",{src:e.coverImage.url,width:"500",height:"950"})),wp.element.createElement("div",{className:"hp-hero-content"},wp.element.createElement("h1",{className:"hero-title"},e.titleText),wp.element.createElement("p",{className:"hero-subtitle"},e.descriptionText),wp.element.createElement("div",{className:"cta-buttons"},wp.element.createElement(i.Content,null))))}}]),t}(c);t.a=u},function(e,t,n){"use strict";var r=n(20),o=(n.n(r),n(21)),a=(n.n(o),n(22)),l=n(23),c=n(24),i=n(0);(0,wp.blocks.registerBlockType)(i.g,{title:i.h,icon:i.e,keywords:i.f,category:i.c,attributes:a.a,edit:l.a,save:c.a})},function(e,t){},function(e,t){},function(e,t,n){"use strict";t.a={addTopMargin:{type:"boolean",default:!0},addBottomMargin:{type:"boolean",default:!0},align:{type:"string",default:"full"},textColor:{type:"string"},customTextColor:{type:"string"},titleText:{type:"string",default:"Add a CTA heading here..."},descriptionText:{type:"string",default:"Add CTA description here..."},coverImage:{type:"src",default:{id:"",url:""}},backgroundColor:{type:"string",default:"rgba(255,255,255,0)"}}},function(e,t,n){"use strict";function r(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function o(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!==typeof t&&"function"!==typeof t?e:t}function a(e,t){if("function"!==typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}var l=n(0),c=function(){function e(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}return function(t,n,r){return n&&e(t.prototype,n),r&&e(t,r),t}}(),__=wp.i18n.__,i=wp.element,u=i.Component,s=i.Fragment,p=wp.blockEditor,m=p.MediaUpload,d=p.RichText,f=p.InspectorControls,b=p.InnerBlocks,g=(p.withColors,wp.components),w=g.PanelBody,y=g.Button,h=g.ColorPicker,k=function(e){function t(e){e.attributes;r(this,t);var n=o(this,(t.__proto__||Object.getPrototypeOf(t)).apply(this,arguments));return n.state={coverImage:n.props.attributes.coverImage},n.updateBackgroundImage=n.updateBackgroundImage.bind(n),n}return a(t,e),c(t,[{key:"updateBackgroundImage",value:function(e){var t=this.props.setAttributes,n={id:e.id,url:e.url};this.setState(function(e,t){return Object.assign({},e,{coverImage:n})}),t({coverImage:n})}},{key:"render",value:function(){var e=this.props,t=e.attributes,n=t.titleText,r=t.descriptionText,o=(t.backgroundColor,e.setAttributes),a=this.state.coverImage;return wp.element.createElement(s,null,wp.element.createElement(f,null,wp.element.createElement(w,null,wp.element.createElement(h,{label:"Background Color",color:l.b.backgroundColor,onChangeComplete:function(e){o(e?{backgroundColor:e.hex}:{backgroundColor:null})}}))),wp.element.createElement("section",{"data-block":l.g,className:"test"},wp.element.createElement("div",{className:"block-cta-wrapper"},wp.element.createElement("div",{className:"block-cta-content"},wp.element.createElement(d,{tagName:"h2",value:n,placeholder:__("Add title","@@pkg.textdomain"),onChange:function(e){return o({titleText:e})},className:"block-hp-cta-content-title"}),wp.element.createElement(d,{value:r,placeholder:__("Add description...","@@pkg.textdomain"),onChange:function(e){return o({descriptionText:e})},className:"block-cta-description"}),wp.element.createElement("div",{className:"cta-content-buttons"},wp.element.createElement(b,null))),wp.element.createElement("img",{src:a.url}),wp.element.createElement("div",{className:"block-cta-cover"},wp.element.createElement(m,{onSelect:this.updateBackgroundImage,allowedTypes:l.a,value:a.id,render:function(e){var t=e.open;return wp.element.createElement(y,{"data-control":"edit-button","data-type":"background","data-posi":"1",label:__(a.id?"Upload Background":"Change Background"),icon:"format-image",onClick:t})}})))))}}]),t}(u);t.a=k},function(e,t,n){"use strict";function r(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function o(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!==typeof t&&"function"!==typeof t?e:t}function a(e,t){if("function"!==typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}var l=n(0),c=function(){function e(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}return function(t,n,r){return n&&e(t.prototype,n),r&&e(t,r),t}}(),i=wp.element.Component,u=wp.blockEditor.InnerBlocks,s=function(e){function t(){return r(this,t),o(this,(t.__proto__||Object.getPrototypeOf(t)).apply(this,arguments))}return a(t,e),c(t,[{key:"render",value:function(){var e=this.props.attributes;return wp.element.createElement("section",{className:l.d,style:{backgroundColor:e.backgroundColor}},wp.element.createElement("picture",null,wp.element.createElement("source",{media:"(min-width: 768px)",srcSet:e.coverImage.url}),wp.element.createElement("img",{src:e.coverImage.url})),wp.element.createElement("div",{className:"cta-content"},wp.element.createElement("h2",null,e.titleText),wp.element.createElement("p",null,e.descriptionText),wp.element.createElement("div",{className:"cta-buttons"},wp.element.createElement(u.Content,null))))}}]),t}(i);t.a=s}]);