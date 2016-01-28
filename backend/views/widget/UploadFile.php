<?php
    use yii\helpers\Html;
?>
<link rel="stylesheet" href="/css/upload/style.css"/>
<link rel="stylesheet" href="/css/upload/jquery.fileupload.css"/>

<div class="container" id="uploadTopicImg">
    <div class="mdLayer01Body">
        <div class="md01sHead mdLayer01Sstatus" style="border-top: none">
            <span class="left">Tải ảnh lên</span>
        </div>
        <div class="md01sContent upload-topic-image clearfix">
            <ul class="notice">
                <li>Chỉ upload ảnh có dung lượng tối đa 5Mb</li>
                <li><span style="color:#D74545">Nếu tải lên một ảnh vi phạm bản quyền bạn phải chịu trách nhiệm trước pháp luật <br/> các điều khoản liên quan đến bức ảnh</span></li>
            </ul>
            <span class="btn btn-success fileinput-button pull-right">
                <i class="glyphicon glyphicon-plus"></i>
                <span class="btn-btn-add">Add files...</span>
                <input id="fileupload" type="file" name="files[]" multiple>
            </span>
            <div class="clearfix"></div>
            <div id="progress" class="progress">
                <div class="progress-bar progress-bar-success"></div>
            </div>
            <div id="files" class="files clearfix">
                <?php
                for ($i = 1; $i <= 18; $i++) {
                    echo '<p class="holder-img-place">' . $i . '</p>';
                }
                ?>
            </div>
            <div class="upload-img-info">
                <p>
                    <label>Tiêu đề ảnh</label>
                    <input type="text" placeholder="Nhập tiêu đề" name="title" class=""/>
                </p>
                <p style="clear:both;">
                    <label>mô tả ảnh</label>
                    <input type="text" placeholder="Nhập mô tả" name="description" class=""/>
                </p>
                <p style="float:right;clear:both;">
                    <button class="btn-btn-add" onclick="ChangeImage.getInstance().pushImgs($(this))">Tạo chủ đề</button>
                </p>
            </div>
        </div>
    </div>
</div>