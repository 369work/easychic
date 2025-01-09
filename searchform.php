<?php

/**
 * The template for displaying search forms
 *
 * @package WordPress
 * @subpackage EasyChic
 * @since Easychic 1.0
 */
?>

<form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>"
    class="search-form">
    <label class="search-form-label sr-only" for="search-form-input1"><?php esc_html_e('Search', 'easychic') ?></label>
    <div class="search-form-wrap">
        <input class="search-form-input" id="search-form-input1" placeholder="<?php esc_attr_e('Please enter word', 'easychic'); ?>" value="" type="search" name="s" required="">
        <button aria-label="<?php esc_attr_e('Search', 'easychic') ?>" class="search-form-button" type="submit">
            <span class="sr-only"><?php esc_html_e('Search', 'easychic') ?></span>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="24" stroke-width="1.5" stroke="currentColor" class="search-form-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>

            </span>
        </button>
    </div>
</form>