/**
 * WordPress dependencies
 */
const { __ } = wp.i18n;

/**
 * Block constants
 */
export const name                = 'cgb/call-to-action';
export const className           = 'block-cta';
export const title               = __( 'Call to Action', '@@pkg.textdomain' );
export const icon                = 'admin-generic';
export const category            = 'design';
export const keywords            = ['call to action', 'link', 'cta'];
export const ALLOWED_MEDIA_TYPES = ['image', 'svg'];
export const attributes          = {};