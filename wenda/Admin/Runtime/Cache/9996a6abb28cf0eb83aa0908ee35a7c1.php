<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="__PUBLIC__/css/public.css" />
	<style>
		.open {
			display: block;
			width: 16px;
			height: 16px;
			line-height: 16px;
			text-align: center;
			border: 1px solid #670768;
			font-weight: bold;
			cursor: pointer;
		}
	</style>
	<script type="text/javascript" src='__PUBLIC__/js/jquery-1.7.2.min.js'></script>
	<script type="text/javascript">
		$(function(){
			//pid不是0的全部先隐藏
			$('tr[pid!=0]').hide();
			//点击+号展开，再次点击收缩
			$('.open').toggle(function(){
				var id=$(this).parents('tr').attr('id');
				$(this).html('-');//+号变成-号
				$('tr[pid='+ id +']').show();
			},function(){
				var id=$(this).parents('tr').attr('id');
				$(this).html('+');
				$('tr[pid='+ id +']').hide();
			});
			//删除提示
			$('.del').click(function(){
				return confirm('确定删除吗?');
			});
		});
	</script>
</head>
<body>
	<table class="table">
		<tr pid='0'>
			<th>分类展开</th>
			<th>ID</th>
			<th>分类名称</th>
			<th>操作</th>
		</tr>
		<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><!--每一个循环项中保存id以及pid数值-->
			<tr id='<?php echo ($v["id"]); ?>' pid='<?php echo ($v["pid"]); ?>'>
				<td width='5%' align='center'><span class='open'>+</span></td>
				<td  width='8%' align='center'><?php echo ($v["id"]); ?></td>
				<td><?php echo str_repeat('&nbsp;&nbsp;', $v['level']); if($v["level"] > 0): ?>|<?php endif; echo ($v["html"]); echo ($v["name"]); ?></td>
				<td width='28%'>
					<a href="<?php echo U('addChild', array('pid' => $v['id']));?>" class='bt2'>添加子分类</a>
					<a href="<?php echo U('edit', array('id' => $v['id']));?>" class='bt2'>修改</a>
					<a href="<?php echo U('del', array('id' => $v['id']));?>" class='bt1 del'>删除</a>
				</td>
			</tr><?php endforeach; endif; ?>
	</table>
</body>
</html>