<?php 

/** 
 * CTA block part
 */

// Set defaults for args passed from get_template_part
$args = wp_parse_args(
    $args,
    [
        'block_prefix'  => '',
        'link'          => '',
        'link_style'    => 'btn',
        'cta_text'      => '',
    ]
);

$utils = new Utils();
?>

<div class="<?php echo ($args['block_prefix']) ? esc_html($args['block_prefix']) : 'block'; ?>__cta">
<?php if($args['cta_text']): ?>
    <p class="h2 <?php echo ($args['block_prefix']) ? esc_html($args['block_prefix']) : 'block'; ?>__cta-text">
        <?php echo esc_html($args['cta_text']); ?>
    </p>
<?php endif; ?>
<?php if($args['link']):
    $link = $args['link']; 
    $link_style = $args['link_style'];
?>
    <div class="btn-row">
        <a class="<?php echo ($link_style); ?>" 
            role="link"  
            href="<?php echo esc_url( $link['url'] ); ?>" 
            target="<?php echo esc_attr( $link['target'] ); ?>">
            <?php echo esc_html( $link['title'] ); ?>
            <?php if ($link_style === 'arrow'): 
                echo $utils->inline_icon('up-right-goldenrod.svg');
            endif; ?> 
        </a> 
    </div>
<?php endif; ?>
</div> 

