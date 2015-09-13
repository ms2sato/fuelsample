<h2>Editing <span class='muted'>Thread</span></h2>
<br>

<?php echo render('thread/_form'); ?>
<p>
	<?php echo Html::anchor('thread/view/'.$thread->id, 'View'); ?> |
	<?php echo Html::anchor('thread', 'Back'); ?></p>
