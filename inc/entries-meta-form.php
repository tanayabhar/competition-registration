<div class="entries_box">
    <style scoped>
        .entries_box{
            display: grid;
            grid-template-columns: max-content 1fr;
            grid-row-gap: 10px;
            grid-column-gap: 20px;
        }
        .entries_field{
            display: contents;
        }
    </style>
    <?php wp_nonce_field( 'entry_meta_nonce_action', 'entry_meta_nonce' ); ?>
    <p class="meta-options entries_field">
        <label for="e_first_name">First Naame</label>
        <input id="e_first_name" type="text" name="e_first_name" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'e_first_name', true ) ); ?>">
    </p>
    <p class="meta-options entries_field">
        <label for="e_last_name">Last Name</label>
        <input id="e_last_name" type="text" name="e_last_name" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'e_last_name', true ) ); ?>">
    </p>
    <p class="meta-options entries_field">
        <label for="e_email">Email</label>
        <input id="e_email" type="email" name="e_email" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'e_email', true ) ); ?>">
    </p>
    <p class="meta-options entries_field">
        <label for="e_phone">Phone</label>
        <input id="e_phone" type="text" name="e_phone" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'e_phone', true ) ); ?>">
    </p>
    <p class="meta-options entries_field">
        <label for="e_description">Description</label>
        <textarea id="e_description" name="e_description"><?php echo esc_attr( get_post_meta( get_the_ID(), 'e_description', true ) ); ?></textarea>
    </p>
    <p class="meta-options entries_field">
        <label for="e_competition_id">Competition ID</label>
        <input id="e_competition_id" type="text" name="e_competition_id" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'e_competition_id', true ) ); ?>">
    </p>
</div>