<h2>Viewing <span class='muted'>#<?php echo $thread->id; ?></span></h2>

<p>
	<strong>Title:</strong>
	<?php echo $thread->title; ?></p>
<p>
	<strong>Body:</strong>
	<?php echo $thread->body; ?></p>
<p>
	<h3>Comments</h3>
	<?php foreach($thread->comments as $index => $comment ) { ?>
		<p><?php echo $comment->body ?></p>
	<?php } ?>

</p>

<?php echo Html::anchor('thread/edit/'.$thread->id, 'Edit'); ?> |
<?php echo Html::anchor('thread', 'Back'); ?>
