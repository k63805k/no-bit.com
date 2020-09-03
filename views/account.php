<html>
    <head>
        <title>Karen</title>
        <meta charset='utf8'>
        <link rel="stylesheet" href="<?=$config['base_url'];?>public/css/bootstrap.css"/>
        <link rel="stylesheet" href="<?=$config['base_url'];?>public/css/font-awesome.css"/>
        <link rel="stylesheet" href="<?=$config['base_url'];?>public/css/style.css" />
        <script src="<?=$config['base_url'];?>public/js/jquery.js"></script>
        <script src="<?=$config['base_url'];?>public/js/bootstrap.js"></script>
        <script src="<?=$config['base_url'];?>public/js/init.js"></script>
    </head>
    <body>
<div class="panel panel-default ">
		  <div class="panel-heading"><?php echo $this->fname." ".$this->lname; ?></div>
		  <div class="panel-body">
			<div class="row">
			  <div class="col-sm-4" style="border-right:2px solid silver">
                              <?php
					  if(!empty($this->avatar))
							$image = $this->avatar;
					  else
							$image = 'images.png';
                                ?>
                              <img src='/public/images/<?=$image;?> 'class="img" width="100px"/>
				<form action="/account/upload" method="post"  enctype="multipart/form-data">
					<input type="file" name="file">
					<button type="submit" name="upload" class="btn btn-success upload">Upload Image</button>
					<span class="error"><?=$this->err;?></span>
				</form>
			 
			  </div>
			  <div class="col-sm-8">
                            <form action="/account/logout" method="post" class="signout">
                                <button type="submit" name="logout" class="btn btn-success logout">Log Out</button>
                            </form>
			  </div>
			</div>
		  </div>
		</div>
        
            <div class="container">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Photo</th>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Email</th>
                </tr>
              </thead>
              <tbody>
                  <?php foreach ($this->friends as $key => $value) {?>
                <tr>
                    <?php
                                if(!empty($value['avatar']))
                                              $image = $value['avatar'];
                                else
                                              $image = 'images.png';
                      ?>
                   <td><a href="/message/chat/<?=$value['id'];?>"><img src="/public/images/<?=$image;?>" width="50px"></a></td>
                  <td><a href="/message/chat/<?=$value['id'];?>"><?=$value['fname'];?></a></td>
                  <td><a href="/message/chat/<?=$value['id'];?>"><?=$value['lname'];?></a></td>
                  <td><a href="/message/chat/<?=$value['id'];?>"><?=$value['email'];?></a></td>
                </tr>
                      <?php }?>
              </tbody>
            </table>
          </div>

        
    </body>
</html>