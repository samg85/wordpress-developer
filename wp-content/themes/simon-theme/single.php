<?php

get_header(); ?>

<div id="primary" class="content-area cv container">
	<main id="main" role="main">
		<h1><?php echo $post->post_title; ?></h1>
		<section class="cv-basicinfo col-md-4 float-left">
			<div class="col-md-4 offset-md-4 cv-picture" style="background-image: url(<?php echo get_post_meta( $post->ID, 'cv_cpt_image', true);?>)"> </div>
			<p><strong>Name:</strong> <?php  echo get_post_meta( $post->ID, 'cv_cpt_name', true); ?></p>
			<p><strong>Sex:</strong> <?php  echo get_post_meta( $post->ID, 'cv_cpt_sex', true); ?></p>
			<p><strong>Email:</strong> <?php  echo get_post_meta( $post->ID, 'cv_cpt_email', true); ?></p>
			<p><strong>Birth Date:</strong> <?php  echo get_post_meta( $post->ID, 'cv_cpt_birth', true); ?></p>
			<p><strong>Adress:</strong> <?php  echo get_post_meta( $post->ID, 'cv_cpt_adress', true); ?></p>
			<p><strong>Spoken Languages:</strong></p>
			<?php $lang = get_post_meta( $post->ID, 'cv_cpt_lang', true);
			foreach ($lang as $key=> $value){ ?>
				<span class="skill badge badge-dark lang"><?php  echo $value; ?></span>
			<?php } ?>	
		</section>
		<section class="cv-studies col-md-8 float-left">
			<h3>Studies</h3>
			<?php $studies = get_post_meta( $post->ID, 'cv_cpt_study', true);
			foreach ($studies as $study){ ?>
				<div class="row">
					<p><strong>Place: </strong><?php  echo $study['uname']; ?></p>
					<p><strong>Graduation: </strong><?php echo $study['uculmation']; ?></p>
					<p><strong>Title: </strong><?php  echo $study['udescription']; ?></p>
				</div>
			<?php } ?>
		</section>
		<section class="cv-skills col-md-8 float-left">
			<h4>Skills</h4>
			<?php $skills = get_post_meta( $post->ID, 'sname', true);
			foreach ($skills as $skill){ ?>
				<p class="skill badge badge-dark"><?php  echo $skill; ?></p>
			<?php } ?>
		</section>
		<section class="cv-exp col-md-8 float-left">
			<h4>Experience</h4>
			<?php $exp = get_post_meta( $post->ID, 'cv_cpt_exp', true);
			foreach ($exp as $work){ ?>
				<a class="badge badge-dark" href="<?php echo $work['expurl']?>" target="_blank"><?php echo $work['expname']?></a>
			<?php } ?>
		</section>
		<section class="cv-proj col-md-12">
			<h3>Projects</h3>
			<?php $project = get_post_meta( $post->ID, 'cv_cpt_projects', true);
			foreach ($project as $pro){ ?>
				<a href="<?php echo $pro['purl'] ?>">
					<figure class="card float-left" style="width: 15rem;">
						<img class="card-img-top" src="<?php echo $pro['expimg'] ?>" alt="Trulli" style="width:100%">
						<div class="card-body">
						<h5 class="card-title"><?php echo $pro['pname']; ?></h5>
							<figcaption class="card-text"><?php echo $pro['image_caption']; ?></figcaption>
						</div>
					</figure>
				</a>
			<?php } ?>
		</section>
	</main>

</div><!-- .content-area -->

<?php get_footer(); ?>
