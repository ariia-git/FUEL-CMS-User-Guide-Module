<?php if (!empty($helper)) : ?>

<h1><?=$helper?></h1>
<?php if (isset($comments[1]) AND $comments[1]->tags('package')) : 
$comments[1]->add_filter($user_guide_links_func);
?>
<p><?=$comments[1]->description(array('long'))?></p>
<?php endif; ?>

<h2>Function Reference [<a href="#" class="func_toggle">+</a>]</h2>
<?php 
foreach($helpers as $function => $function_obj) :
	$comment = $function_obj->comment;
	$comment_params = $comment->tags('param', 'type');
	$parameters = $function_obj->params();
	$comment->add_filter($user_guide_links_func);
	$example = $comment->example();
	$description = $comment->description(array('periods', 'one_line', 'markdown'));

?>

<?=$this->fuel->user_guide->block('function', array('function' => $function_obj)) ?> 

<div class="func">
<?=$description?>

<?=user_guide_block('return', array('return' => $comment_return)) ?>

<?=user_guide_block('params', array('params' => $parameters, 'comment_params' => $comment_params)) ?>

<?=user_guide_block('example', array('example' => $example)) ?>

</div>


<?php endforeach; ?>

<?php endif; ?>