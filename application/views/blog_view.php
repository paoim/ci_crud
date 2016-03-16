<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Blog</title>
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }
	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	
	label {
		display: block;
	}
	
	fieldset {
		border: 1px solid #ccc;
	}
	
	div, h3 {
		margin: 0px;
		padding: 0px;
	}
	
	div.list-blog {
		padding: 0 5px 5px 5px;
	}
	
	div.list-blog:nth-child(odd) {
		background: #ffffcc;
	}
	
	div.list-blog:nth-child(even) {
		background: #fffff0;
		box-shadow: 0 1px 0 #ccccff;
		-moz-box-shadow: 0 1px 0 #ccccff;
		-webkit-box-shadow: 0 1px 0 #ccccff;
	}
	
	div.list-blog:not(:last-child) {
		border-bottom: 1px solid #ccccff;
		box-shadow: 0 1px 0 #ccccff;
		-moz-box-shadow: 0 1px 0 #ccccff;
		-webkit-box-shadow: 0 1px 0 #ccccff;
	}
	
	div.list-blog:hover {
		background: #ccccff;
	}
	
	.input-w {
		width: 400px;
	}
	
	input[type=submit], a {
		border: none;
		margin-right: 1px;
		padding: 6px;
		text-decoration: none;
		font-size: 12px;
		border-radius: 4px;
		-moz-border-radius: 4px;
		-webkit-border-radius: 4px;
		background: #ffffe0;
		color: black;
		box-shadow: 0 1px 0 #ccccff;
		-moz-box-shadow: 0 1px 0 #ccccff;
		-webkit-box-shadow: 0 1px 0 #ccccff;
	}
	
	input[type=submit]:hover, a:hover {
		background: #ffffcc;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Welcome to Blog!</h1>
	
	<div id="body">
		<fieldset>
			<legend><?php echo $title; ?></legend>
			<?php echo form_open('blog/' .$action)?>
				<p>
					<label for="title">Title</label>
					<input type="text" name="title" id="title" class="input-w" value="<?php if (isset($blog)): echo $blog->title; else: echo ''; endif; ?>" />
				</p>
				<p>
					<label for="content">Content</label>
					<textarea rows="6" name="content" id="content" class="input-w"><?php if (isset($blog)): echo $blog->content; else: echo ''; endif; ?></textarea>
				</p>
				<p>
					<input type="submit" value="Submit" />
					<?php if (isset($blog))
						echo anchor("blog/index", 'Create New Blog');
					?>
					
				</p>
			<?php echo form_close()?>
		</fieldset>
		<br>
		
		<fieldset>
			<legend>List of blogs</legend>
			<div>
				<?php if (isset($blogs)): foreach ($blogs as $blog): ?>
					<div class="list-blog">
						<h3><?php echo $blog->title; ?></h3>
						<div><?php echo $blog->content; ?></div>
						<div>
							<?php
								echo anchor("blog/index/{$blog->id}", 'Edit');
								echo anchor("blog/delete/{$blog->id}", 'Delete');
							?>
						</div>
					</div>
				<?php endforeach; else: ?>
					<h3>No record</h3>
				<?php endif;?>
			</div>
		</fieldset>
		
	</div>
	
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>