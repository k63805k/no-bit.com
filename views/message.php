<div class=" bootstrap snippet">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="portlet portlet-default">
                <div id="chat" class="panel-collapse collapse in">
                    <div>
                    <div class="mass portlet-body chat-widget" style="overflow-y: auto; width: auto; height: 300px;">
                        <?php foreach($this->msg as $result){?>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <?php
					  if(!empty($result['avatar']))
							$image = $result['avatar'];
					  else
							$image = 'images.png';
                                        ?>
                                        <img class="media-object img-circle" src="/public/images/<?=$image; ?>" width="30px" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><?php echo $result['fname']?>
                                            <span class="small pull-right"><?php echo $result['date'] ?></span>
                                        </h4>
                                        <p><?php echo $result['body']?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <?php $last=$result['id']; } ?>
                    </div>
                    <div class="portlet-footer">
                        <form role="form">
                            <div class="form-group">
                                <textarea class="send_text form-control" name="text" placeholder="Enter message..."></textarea>
                            </div>
                            <div class="form-group">
                                <button type="button" name="send" class="send btn btn-default pull-right">Send</button>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
</div>
    <script>
        var last=<?php echo $last; ?>;
    </script>