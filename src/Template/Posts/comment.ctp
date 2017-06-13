<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Post'), ['action' => 'edit', $post->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Post'), ['action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Posts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="posts view large-9 medium-8 columns content">
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($post->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($post->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($post->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= h($post->user_id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Body') ?></h4>
        <?= $this->Text->autoParagraph(h($post->description)); ?>
    </div>
    
<?php
if(!empty($comment_list))
    {    	
	    foreach($comment_list as $key => $comments)
    	{
    		?>
	    	<div class="row post-section comment" id="comment_<?= $comments->comment_id; ?>">
		        <h5 class="col-md-6 col-sm-6 col-xs-6" style="color:#1798A5;">
		            <b><?= h($comments->users['username']) ?></b>
		        </h5>
		        <p class="col-md-6 col-sm-6 col-xs-6" style='text-align: right;'>
		        	<?= h($comments->created_date);?>
		        </p>
		        <p class="col-md-12 col-sm-12 col-xs-12" id='comment_text_<?=$comments->comment_id?>'>
		            <?= h($comments->comment_text);?>
		        </p>  
		        <?php
		        if($this->request->session()->read('Auth.User.id')==$comments->user_id)
		        {
		        	?>
		        	<div class="col-md-12 col-sm-12 col-xs-12" style='text-align: right;'>
 		        		<?php
		        			echo $this->Html->Link(__("<i class='glyphicon glyphicon-edit'></i>"),
		        				['action'=>'edit',$comments->comment_id],['class'=>'edit_comment_text', 'id'=>$comments->comment_id,
		        				'escape' => false]);
		        			echo "&nbsp;&nbsp;&nbsp;";
		        			echo $this->Html->Link(__("<i class='glyphicon glyphicon-trash'></i>"),
		        				['controller'=>'Comments','action'=>'edit_comment',$comments->comment_id],['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $comments->comment_id)]);
		        		?> 
		        	</div>
		        	<?php
		        }
		        ?>
		        
		    </div>

		    <div class="row editbox" style="display: none;" id="editbox_<?= $comments->comment_id?>">
		    	<h5 class="col-md-6 col-sm-6 col-xs-6" style="color:#1798A5;">
		            <b>Edit Comment</b>
		        </h5>
		    	<?php echo $this->Form->create($comment,['id'=>'edit_form_'.$comments->comment_id]);
		    	//,['url' => ['controller' => 'Comments', 'action' => 'edit',$comments->comment_id,$post->id]]
		    	echo $this->Form->textarea('comment_text', ['id'=>'edit_comment_'.$comments->comment_id,'value'=>$comments->comment_text])  ;           
		    	?>
		    	<?= $this->Form->button(__('Update'),['type'=>'button','id'=>$comments->comment_id,'class'=>'update']) ?>
		    	<?= $this->Form->button(__('Cancel'),['type'=>'button','class'=>'cancel_edit','id'=>$comments->comment_id]) ?> 
		    	<?php echo $this->Form->end();?>
		    </div>
		    <br/>
		    <?php
	    }
		
	}
?>
<?php echo $this->Form->control('previous_id', ['type'=>'hidden','value'=>'','id'=>'previous_id']);?>
<div class="row">
    <?php echo $this->Form->create($comment); ?>
    	<h4>Comment</h4>
    	<?php echo $this->Form->control('comment_text',['label' =>false]); ?>
			<?= $this->Form->button(__('Submit')) ?>
		    <?= $this->Form->end() ?>
    </div>
</div>
<!--------------JQuery Code---------------------->
<script>

$(document).ready(function()
{
	var previous_id = '';
	
	// on Comment Edit Icon Click
	$(".edit_comment_text").on("click", function()
	{
		var comment_id = $(this).attr('id');
		var previous_id = $("#previous_id").val();
		
		if(previous_id!='')
		{
			$("#editbox_"+previous_id).slideUp();
			$("#comment_"+previous_id).slideDown();
		}
		
		$("#comment_"+comment_id).slideUp();
		$("#editbox_"+comment_id).slideDown();
		$("#previous_id").val(comment_id);
		return false;
	});
	// On Comment Cancel button Click
	$(".cancel_edit").on("click", function()
	{
		var comment_id = $(this).attr('id');
		$("#editbox_"+comment_id).slideUp();
		$("#comment_"+comment_id).slideDown();
		
	});
	// On Comment Update button Click
	$(".update").on("click", function()
	{
		var comment_id = $(this).attr('id');
		var url =  "<?=$this->Url->build([ 'controller' => 'Comments', 'action' => 'edit']);?>";
		var form = $("#edit_form_"+comment_id).serialize();
		var url_full = url+'/'+ comment_id;

		$.ajax(
		{
			type:'POST',
			data : form,
			dataType : 'JSON',
			url : url_full,

			beforeSend:function()
			{},
			complete:function()
			{},
			success : function(response)
			{	
				if(response.status==true)
				{
					<?php //$this->Flash->success(__("The comment has been updated."));?>
					$("#comment_text_"+comment_id).html(response.comment_text);
				}
				else
				{
					<?php //$this->Flash->error(__('The comment could not be saved. Please, try again.'));?>
				}
				$("#editbox_"+comment_id).slideUp();
				$("#comment_"+comment_id).slideDown();
				$("#previous_id").val('');
			}
		});
		return false;
	});
});
</script>
