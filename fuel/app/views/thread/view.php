<h2>Viewing <span class='muted'>#<?php echo $thread->id; ?></span></h2>

<p>
	<strong>Title:</strong>
	<?php echo $thread->title; ?></p>
<p>
	<strong>Body:</strong>
	<?php echo $thread->body; ?></p>

<?php echo Html::anchor('thread/edit/'.$thread->id, 'Edit'); ?> |
<?php echo Html::anchor('thread', 'Back'); ?>