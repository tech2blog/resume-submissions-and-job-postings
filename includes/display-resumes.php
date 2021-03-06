<?php 
global $wpdb;
?>

<div id="resumeDisplay">
	<?php
    // Display all the current resume submissions 
    $submissionsQuery = $wpdb->get_results( 'SELECT * FROM ' . SUBTABLE . ' ' . $condition . ' ORDER BY pubDate DESC LIMIT ' . $limit );
    ?>
                
    <ul>
    <?php
    foreach ( $submissionsQuery as $submission ){
		// Export to PDF
		$pdfLink = @exportSubToPDF( $submission->id );
		?>
		<li><p><b><a href="<?php echo WP_CONTENT_URL . '/uploads/rsjp/pdfs/' . $pdfLink; ?>" target="_blank"><?php echo $submission->fname; ?> <?php echo $submission->lname; ?></a></b></p></li>
		<?php
	}
	?>
	</ul>
</div>