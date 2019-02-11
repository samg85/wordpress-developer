<?php

add_action ( 'init', 'cv_ctp');

function cv_ctp() {

    $labels = array(
        'name'               => _x( 'Curriculum', 'post type general name', 'simon-theme' ),
        'singular_name'      => _x( 'Curriculum', 'post type singular name', 'simon-theme' ),
        'menu_name'          => _x( 'Curriculums', 'admin menu', 'simon-theme' ),
        'name_admin_bar'     => _x( 'Curriculum', 'add new on admin bar', 'simon-theme' ),
        'add_new'            => _x( 'Add Curriculum', 'Form', 'simon-theme' ),
        'add_new_item'       => __( 'Add New Curriculum', 'simon-theme' ),
        'new_item'           => __( 'New Curriculum', 'simon-theme'),
        'edit_item'          => __( 'Edit Curriculum', 'simon-theme' ),
        'view_item'          => __( 'View Curriculum', 'simon-theme' ),
        'all_items'          => __( 'All Curriculums', 'simon-theme' ),
        'not_found'          => __( 'No Curriculums found.', 'simon-theme' ),
        'not_found_in_trash' => __( 'No Curriculums found in Trash.', 'simon-theme' )
    );

    $args = array(
        'labels'             => $labels,
                'description'        => __( 'Add candidates curriculum', 'simon-theme' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'cv' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => true,
        'menu_position'      => null,
        'supports'           => array( 'title' )
    );

    register_post_type( 'cv', $args );

    flush_rewrite_rules();

}

add_action( 'cmb2_admin_init', 'cmb2_cv_metaboxes' );



function cmb2_cv_metaboxes() {
    

    $prefix = 'cv_cpt';

    $cv_cmb = new_cmb2_box( array(
            'id'            => $prefix . '_cv_data',
            'title'         => __( 'Curriculum Form', 'simon-theme' ),
            'object_types'  => array( 'cv', ), // Post type
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true, // Show field names on the left
            'repeatable'    => true,
        ) );

        $cv_cmb->add_field( array(
            'name' => 'Full Name',
            'desc' => '',
            'id'   =>  $prefix . '_name',
            'type' => 'text',
        ) );

        $cv_cmb->add_field( array(
            'name' => 'CV Image',
            'id'   => $prefix .'_image',
            'type' => 'file',
        ) );

        $cv_cmb->add_field( array(
            'name' => 'Birth Date',
            'id'   => $prefix.'_birth',
            'type' => 'text_date'
        ) );

        $cv_cmb->add_field( array(
            'name'    => 'Sex',
            'id'      => $prefix.'_sex',
            'type'    => 'radio_inline',
            'options' => array(
                'Male' => __( 'Male', 'cmb2' ),
                'Female'   => __( 'Female', 'cmb2' )
            ),
            'default' => 'standard',
        ) );

        $cv_cmb->add_field( array(
            'name' => 'Email',
            'id'   => $prefix.'_email',
            'type' => 'text_email',
        ) );

        $cv_cmb->add_field( array(
            'name' => 'Adress',
            'desc' => '',
            'id'   =>  $prefix . '_adress',
            'type' => 'text',
        ) );

        $cv_cmb->add_field( array(
            'name'           => 'Languages',
            'desc'           => 'Select what Lenguages you speak',
            'id'             => $prefix . '_lang',
            'type'    => 'multicheck_inline',
            'select_all_button' => false, 
            'options' => array(
                'english'    => 'English',
                'spanish'    => 'Spanish',
                'french'     => 'French',
                'german'     => 'German',
            ),
        ) );

        $study_field_id = $cv_cmb->add_field( array(
            'id'          => $prefix . '_study',
            'type'        => 'group',
            'description' => __( 'Enter Your Studies', 'cmb2' ),
            // 'repeatable'  => false, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'       => __( 'Study', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
                'add_button'        => __( 'Add Another Study', 'cmb2' ),
                'remove_button'     => __( 'Remove Study', 'cmb2' ),
                'sortable'          => true,
                'closed'            => true, // true to have the groups closed by default
                'remove_confirm'    => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
            ),
        ) );
        
        // Id's for group's fields only need to be unique for the group. Prefix is not needed.
        $cv_cmb->add_group_field( $study_field_id, array(
            'name' => 'Institute Name',
            'id'   => 'uname',
            'type' => 'text',
            // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
        ) );

        $cv_cmb->add_group_field( $study_field_id, array(
            'name' => 'Culmination Date',
            'id'   => 'uculmation',
            'type' => 'text_date'
        ) );
        
        $cv_cmb->add_group_field( $study_field_id, array(
            'name' => 'Study Description',
            'description' => 'Write a short description for this entry',
            'id'   => 'udescription',
            'type' => 'textarea_small',
        ) );
        
        // Id's for group's fields only need to be unique for the group. Prefix is not needed.
        $cv_cmb->add_field( array(
            'name' => 'Skills',
            'id'   => 'sname',
            'type' => 'text',
            'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
            'options'     => array(
                'add_button'        => __( 'Add Another Skill', 'cmb2' ),
                'remove_button'     => __( 'Remove Skill', 'cmb2' ),
                'remove_confirm'    => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
            ),
        ) );

        $experience_field_id = $cv_cmb->add_field( array(
            'id'          => $prefix . '_exp',
            'type'        => 'group',
            'description' => __( 'Enter Your Work Experience', 'cmb2' ),
            // 'repeatable'  => false, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'       => __( 'Entry {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
                'add_button'        => __( 'Add More', 'cmb2' ),
                'remove_button'     => __( 'Remove', 'cmb2' ),
                'sortable'          => true,
                'closed'            => true, // true to have the groups closed by default
                'remove_confirm'    => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
            ),
        ) );
        
        $cv_cmb->add_group_field( $experience_field_id , array(
            'name' => 'Company Name',
            'id'   => 'expname',
            'type' => 'text',
        ) );

        $cv_cmb->add_group_field($experience_field_id, array(
            'name' => __( 'Company URL', 'cmb2' ),
            'id'   => 'expurl',
            'type' => 'text_url',
            'protocols' => array( 'http', 'https' ), // Array of allowed protocols
        ) );

        $projects_field_id = $cv_cmb->add_field( array(
            'id'          => $prefix . '_projects',
            'type'        => 'group',
            'description' => __( 'Enter Your Most Relevant Projects', 'cmb2' ),
            // 'repeatable'  => false, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'       => __( 'Project {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
                'add_button'        => __( 'Add More', 'cmb2' ),
                'remove_button'     => __( 'Remove', 'cmb2' ),
                'sortable'          => true,
                'closed'            => true, // true to have the groups closed by default
                'remove_confirm'    => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
            ),
        ) );

        $cv_cmb->add_group_field( $projects_field_id , array(
            'name' => 'Project Name',
            'id'   => 'pname',
            'type' => 'text',
        ) );

        $cv_cmb->add_group_field($projects_field_id, array(
            'name' => 'project Image',
            'id'   => 'expimg',
            'type' => 'file',
        ) );

        $cv_cmb->add_group_field($projects_field_id, array(
            'name' => __( 'Project URL', 'cmb2' ),
            'id'   => 'purl',
            'type' => 'text_url',
            'protocols' => array( 'http', 'https' ),
        ) );

        $cv_cmb->add_group_field($projects_field_id, array(
            'name' => 'Image Caption',
            'id'   => 'image_caption',
            'type' => 'text',
        ) );

        function update_date_picker_defaults( $l10n ) {

            $l10n['defaults']['date_picker']['yearRange'] = '1950:+0';
        
            return $l10n;
        }
        add_filter( 'cmb2_localized_data', 'update_date_picker_defaults' );


}