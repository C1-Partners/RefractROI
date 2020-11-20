/**
 * WordPress dependencies
 */
const { __ } = wp.i18n;

/**
 * Block constants
 */
export const name                = 'cgb/hp-hero';
export const title               = __( 'Home Page Hero', '@@pkg.textdomain' );
export const icon                = 'admin-generic';
export const category            = 'crimson';
export const keywords            = ['homepage', 'hero', 'v2'];
export const ALLOWED_MEDIA_TYPES = ['image', 'svg'];
export const attributes          = {};
