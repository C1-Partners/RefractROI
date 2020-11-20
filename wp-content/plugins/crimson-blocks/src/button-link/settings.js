/**
 * WordPress dependencies
 */
const { __ } = wp.i18n;

/**
 * Block constants
 */
export const name                = 'cgb/button-link';
export const title               = __( 'Button with Link', '@@pkg.textdomain' );
export const icon                = 'admin-generic';
export const category            = 'design';
export const keywords            = ['button', 'link', 'cta'];
export const ALLOWED_MEDIA_TYPES = ['image', 'svg'];
export const attributes          = {};